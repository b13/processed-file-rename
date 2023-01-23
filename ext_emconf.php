<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Rename processed files',
    'description' => 'Renames processed files when renaming original file',
    'category' => 'backend',
    'version' => '0.1.0',
    'state' => 'stable',
    'author' => 'Johannes Schlier, b13 GmbH',
    'author_email' => 'typo3@b13.com',
    'author_company' => 'b13 GmbH, Stuttgart',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.99.99',
        ],
    ],
];
