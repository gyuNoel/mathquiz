<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['current_question'] >= $_SESSION['num_questions']) {
    header("Location: index.php");
    session_destroy();
    exit;
}

$level = $_SESSION['level'];
$operator = $_SESSION['operator'];
$num_questions = $_SESSION['num_questions'];
$max_diff = $_SESSION['max_diff'];
$custom_min = $_SESSION['custom_min'];
$custom_max = $_SESSION['custom_max'];


?>