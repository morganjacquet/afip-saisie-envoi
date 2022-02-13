<?php

function post_redirect($url) {
    if (empty($url)) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
    }
    
    $_SESSION['post_data'] = $_POST;
    header('Location: ' . $url);
}