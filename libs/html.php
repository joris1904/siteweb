<?php

function html($options = []){

    $type = isset($options['type']) ? $options['type'] : null;

    $path = isset($options['path']) ? $options['path'] : 'assets';

    if ($type == 'css') {

        $css = glob(ROOT. $path . '/'.$type.'/*.css');

        $css = str_replace(ROOT, '', $css);
        foreach ($css as $key => $value) {
            echo "<link rel='stylesheet' type='text/css' href='".WEBROOT."$value'>";
        }
    } else if ($type == 'js') {
        $css = glob(ROOT. $path . '/'.$type.'/*.js');

        $css = str_replace(ROOT, '', $css);
        foreach ($css as $key => $value) {
            echo "<script type='text/javascript' src='".WEBROOT."$value'></script>";
        }
    } else if ($type = 'html') {

        $file = ROOT.'partials/' .$options['partials']. '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
}

function addClass ($page) {
    return (isset($_GET['page']) && $_GET['page'] === $page) ? "active" : null;
}