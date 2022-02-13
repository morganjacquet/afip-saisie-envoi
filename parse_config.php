<?php
session_start();

$result_config = array();

if (file_exists("config.ini")) {
    $result_config = parse_ini_file("config.ini");
}