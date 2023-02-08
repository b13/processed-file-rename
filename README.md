# Processed File Rename

## What does this extension do?

This extension extends the renaming of files within the fileadmin folder. Renaming a file will also trigger recreating all processed file variants of that file, using the new file name as a basis.

## Why?

For SEO (and accessibility) reasons, file names should have unique, descriptive, and clear names.

If a file was uploaded with a suboptimal name, all processed versions of it also use this name. Since the processed versions of files are what visitors on the page get served, this can be problematic.

This extension gives editors control of the names of files served in the frontend. It allows SEO and accessibility recommendations/rules to adhere to without deleting all processed files.

## How?

This extension registers an event listener to the event `TYPO3\CMS\Core\Resource\Event\AfterFileRenamedEvent`.
All processed versions of the original file are fetched, deleted, and removed from the table `sys_file_processedfile`.

## Credits

This extension was created by Johannes Schlier in 2023 for [b13 GmbH, Stuttgart](https://b13.com).

[Find more TYPO3 extensions we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure long-term performance, reliability, and results in all our code.
