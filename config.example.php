<?php

$config = [
    // phonebook
    'phonebook' => [
        'id'        => 0,                                              // only "0" can store quickdial and vanity numbers
        'name'      => 'Telefonbuch',
        'imagepath' => 'file:///var/InternerSpeicher/[YOURUSBSTICK]/FRITZ/fonpix/', // mandatory if you use the -i option
    ],

    // file (optional: is considered with the run and download command)
    'local'  => [
        // 'C:/Users/[user]/Downloads/my_local_contact_file.vcf',  // uncomment if you want to use it
/* add as many as you need
        'C:/..'
*/
    ],

    // or server (is considered with the run and download command)
    'server' => [
        [
            'url' => 'https://...',
            'user' => '',
            'password' => '',
            'http' => [           // http client options are directly passed to Guzzle http client
                // 'verify' => false, // uncomment to disable certificate check
                // 'auth' => 'digest', // uncomment for digest auth
            ]
        ],
/* add as many as you need
        [
            'url' => 'https://...',
            'user' => '',
            'password' => '',
        ],
*/
    ],

    // or fritzbox
    'fritzbox' => [
        'url' => 'http://fritz.box',
        'user' => '',
        'password' => '',
        'fonpix'   => '/[YOURUSBSTICK]/FRITZ/fonpix',   // the storage on your usb stick for uploading images
        'fritzfons' => [            // uncomment to upload quickdial image as background to designated FRITZ!Fon
            // '613',               // internal number must be in the range '610' to '615' (maximum of DECT devices)
        ],
        'http' => [                 // http client options are directly passed to Guzzle http client
            // 'verify' => false,   // uncomment to disable certificate check
        ],
        'plainFTP' => false,        // set true to use FTP instead of FTPS e.g. on Windows
    ],

    'filters' => [
        'include' => [                                          // if empty include all by default
            /*
            'categories' => [],
            'groups' => [],
            */
        ],

        'exclude' => [
            /*
            'categories' => [],
            'groups' => [],
            */
        ],
    ],

    'conversions' => [
        'vip' => [
            'category' => [
                'vip1'
            ],
            'group' => [
                'PERS'
            ],
        ],
        /**
         * 'realName' conversions are processed consecutively. Order decides!
         */
        'realName' => [
            '{lastname}, {prefix} {nickname}',
            '{lastname}, {prefix} {firstname}',
            '{lastname}, {nickname}',
            '{lastname}, {firstname}',
            '{organization}',
            '{fullname}'
        ],
        /**
         * 'phoneTypes':
         * The order of the target values (first occurrence) determines the sorting of the telephone numbers
         */
        'phoneTypes' => [
            'WORK' => 'work',
            'HOME' => 'home',
            'CELL' => 'mobile',
            'FAX' => 'fax_work' // NOTE: actual mapping is ignored but order counts, so fac is put last
        ],
        'emailTypes' => [
            'WORK' => 'work',
            'HOME' => 'home'
        ],
        /**
         * 'phoneReplaceCharacters' conversions are processed consecutively. Order decides!
         */
        'phoneReplaceCharacters' => [
            '+49' => '',  // router is usually operated in 'DE; '0049' could also be part of a phone number
            '('   => '',
            ')'   => '',
            '/'   => '',
            '-'   => ''
        ]
    ]
];
