<?php
include(__DIR__ . '/header.php');

foreach ($context as $path => $info)
    echo '<a href="' . htmlspecialchars($path, ENT_QUOTES) . '">' . htmlspecialchars($info['name']) . '</a>';

include(__DIR__ . '/footer.php');
?>
