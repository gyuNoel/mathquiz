<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['level'] = $_POST['level'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['num_questions'] = $_POST['num_questions'];
    $_SESSION['max_diff'] = $_POST['max_diff'];
    $_SESSION['custom_min'] = $_POST['custom_min'] ?? 1;
    $_SESSION['custom_max'] = $_POST['custom_max'] ?? 10;
    $_SESSION['current_question'] = 0;
    $_SESSION['correct'] = 0;
    $_SESSION['wrong'] = 0;

    header("Location: quiz.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <h1>Simple Mathematics Game</h1>
    <form action="" method="POST">
        <h2>Settings</h2>
        <label>Level:</label>
        <div>
            <input type="radio" name="level" value="1" required>Level 1 (1-10)<br>
            <input type="radio" name="level" value="2" required>Level 2 (11-100)<br>
            <input type="radio" name="level" value="custom" required>Custom Level<br>
            <input type="number" name="custom_min" placeholder="Min" min="1">
            <input type="number" name="custom_max" placeholder="Max" min="1"><br>
        </div>
        <label>Operator</label>
        <div>
            <input type="radio" name="operator" value="+" required> Addition<br>
            <input type="radio" name="operator" value="-"> Subtraction<br>
            <input type="radio" name="operator" value="*"> Multiplication<br>
        </div>
        <label>Number of Questions:</label>
        <input type="number" name="num_questions" min="1" required><br>
        <label>Max Difference of Choices from the correct answer:</label>
        <input type="number" name="max_diff" min="1" required><br>
        <button type="submit">Start Quiz</button>
    </form>

    </div>
</body>

</html>