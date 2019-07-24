<?php
function raw_header($header) {
    $header = str_replace("\r", "", $header);
    $split = explode("\n\n", $header, 2);
    $head = $split[0];
    $body = (count($split) > 1 ? $split[1] : "");
    foreach (explode("\n", $head) as $h) {
        header($h);
    }
    $oldbody = ob_get_clean();
    echo $body . $oldbody;
    ob_start();
}
