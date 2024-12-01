<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Quiz Results</h1>
        <p>Total Questions: <?= $_SESSION['num_questions'] ?></p>
        <p>Correct Answers: <?= $_SESSION['correct'] ?></p>
        <p>Wrong Answers: <?= $_SESSION['wrong'] ?></p>
        <a href="index.php">Play Again</a>
    </div>
</body>
</html>
