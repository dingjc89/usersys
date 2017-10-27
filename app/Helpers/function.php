<?php
if (!function_exists("ee")) {
    function ee() {
        echo "<pre>";
        $args = func_get_args();
        foreach ($args as $arg) {
            print_r($arg);
        }
        echo "</pre>";
        exit;
    }
}

if (!function_exists("dd")) {
    function dd() {
        echo "<pre>";
        $args = func_get_args();
        foreach ($args as $arg) {
            print_r($arg);
        }
        echo "</pre>";
    }
}