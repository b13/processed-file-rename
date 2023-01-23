# Processed File Rename

## What does this extension do?

This extension extends renaming of files within the fileadmin.
If a file that was renamed has processed versions of it those are deleted and need to be reprocessed, using the new file name.

## Why?

For SEO (and accessibility) reasons file names should have unique, descriptive and clear names.

If a file was uploaded with a suboptimal name all processed versions of it use this name as well.
Since the processed versions of files are what visitor on the page actually get served this can be problematic.

Renaming such a file does not rename/delete its related processed versions as of January 2023.

This extension steps in to give editors control of the names of files that are actually served in the frontend.
This allows SEO and accessibility recommendations/rules to be adhered without the need to delete *all* processed files.

## How?

This extension registers an event listener to the event `TYPO3\CMS\Core\Resource\Event\AfterFileRenamedEvent`.
All processed versions of the original file are fetched, deleted and removed from the table `sys_file_processedfile`.
