<?php
declare(strict_types=1);

namespace B13\ProcessedFileRename\EventListener;

/*
 * This file is part of TYPO3 CMS-extension "processed file rename" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\Event\AfterFileRenamedEvent;
use TYPO3\CMS\Core\Resource\ProcessedFile;
use TYPO3\CMS\Core\Resource\ProcessedFileRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DeleteProcessedFilesAfterRename
{
    public function __invoke(AfterFileRenamedEvent $event): void
    {
        foreach (GeneralUtility::makeInstance(ProcessedFileRepository::class)->findAllByOriginalFile($event->getFile()) as $processedFile) {
            if ($processedFile->exists()) {
                $processedFile->delete(true);
            }
            $this->removeFromRepository($processedFile);
        }
    }

    // see TYPO3\CMS\Core\Resource\Processing\FileDeletionAspect
    private function removeFromRepository(ProcessedFile $fileObject)
    {
        GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('sys_file_processedfile')
            ->delete(
                'sys_file_processedfile',
                [
                    'uid' => (int)$fileObject->getUid(),
                ]
            );
    }
}
