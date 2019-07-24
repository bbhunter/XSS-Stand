<?php
function xss_easy_escape($text) {
    $blackTags = [
        'script',
        'img'
    ];
    foreach ($blackTags as $tag) {
        $text = preg_replace('/<\/?' . $tag . '/i', '', $text);
    }
    return $text;
}

function xss_medium_escape($text) {
    $h4x0r = 'Nonono. Areu h4x0r. Reset session.';
    $blackTags = [
        'script',
        'img',
        '.* (.*on.*)+>'
    ];
    $blackSimbs = [
        '[', ']', '(', ')'
    ];
    foreach ($blackTags as $tag) {
        if (preg_match('/<\/?' . $tag . '/i', $text) !== 0)
            return $h4x0r;
    }
    if (preg_match('/[' . preg_quote(implode('', $blackSimbs)) . ']/i', $text) !== 0)
        return $h4x0r;
    return $text;
}

function xss_hard_escape($text) { // <video><source onerror=alert(1)>
    $text = strip_tags($text, '<p><div><b><i><br><video><source>');
    return $text;
}
