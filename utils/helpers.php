<?php
function redirect($url) {
    if (!headers_sent()) {
        header('Location: '.$url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        exit;
    }
}