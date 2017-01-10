#!/usr/bin/php
<?php
    $count = 0;
    foreach ($argv as $key) {
        if ($count != 0)
            print("$key\n");
        $count++;
    }
?>