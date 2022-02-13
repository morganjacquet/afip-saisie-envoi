<?php
session_start();
session_unset();

$error_count = 0;
$errors = array(
    'required' => array(),
    'type_text' => array(),
    'max_len_25' => array(),
    'code_file' => 0,
);

if (!isset($_POST['lastname']) || empty($_POST['lastname'])) {
    $error_count++;
    array_push($errors['required'], 'lastname');
}

if (!isset($_POST['firstname']) || empty($_POST['firstname'])) {
    $error_count++;
    array_push($errors['required'], 'firstname');
}

if (!isset($_POST['file']) || empty($_POST['file'])) {
    $error_count++;
    array_push($errors['required'], 'file');
}

if (!empty($_POST['lastname']) && !ctype_alpha($_POST['lastname'])) {
    $error_count++;
    array_push($errors['type_text'], 'lastname');
}

if (!empty($_POST['firstname']) && !ctype_alpha($_POST['firstname'])) {
    $error_count++;
    array_push($errors['type_text'], 'firstname');
}

if (!empty($_POST['lastname']) && strlen($_POST['lastname']) > 25) {
    $error_count++;
    array_push($errors['max_len_25'], 'lastname');
}

if (!empty($_POST['firstname']) && strlen($_POST['firstname']) > 25) {
    $error_count++;
    array_push($errors['max_len_25'], 'firstname');
}

if (!empty($_FILES['nom_du_fichier']['error'])) {
    $error_count++;
    array_push($_FILES['nom_du_fichier']['error'], 'code_file');
}

if (!empty($errors) && $error_count > 0) {
    post_redirect(null, $errors);
}

function post_redirect($url = null, $errors = null, $success = null) {
    if (empty($url)) {
        $url = $_SERVER['HTTP_REFERER'];
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }

    $_SESSION['post_data'] = $_POST;
    header('Location: ' . $url);
}

var_dump($error_count, $errors, $_POST, $_SESSION);