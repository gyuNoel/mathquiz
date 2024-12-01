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

$min = ($level === '1') ? 1 : (($level === '2') ? 11 : $custom_min);
$max = ($level === '1') ? 10 : (($level === '2') ? 100 : $custom_max);

$num1 = rand($min, $max);
$num2 = rand($min, $max);

switch ($operator) {
    case '+': $answer = $num1 + $num2; break;
    case '-': $answer = $num1 - $num2; break;
    case '*': $answer = $num1 * $num2; break;
}

$choices = [$answer];
while (count($choices) < 4) {
    $diff = rand(1, $max_diff);
    $new_choice = $answer + (rand(0, 1) ? $diff : -$diff);
    if (!in_array($new_choice, $choices)) {
        $choices[] = $new_choice;
    }
}
shuffle($choices);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Question <?= $_SESSION['current_question'] + 1 ?>/<?= $num_questions ?></h1>
        <form method="POST" action="">
            <p><?= $num1 . " " . $operator . " " . $num2 ?> = ?</p>
            <?php foreach ($choices as $choice): ?>
                <div>
                    <input type="radio" name="user_answer" value="<?= $choice ?>" required> <?= $choice ?><br>
                </div>
            <?php endforeach; ?>
            <input type="hidden" name="correct_answer" value="<?= $answer ?>">
            <button type="submit">Submit Answer</button>
        </form>
        <p>Score: <?= $_SESSION['correct'] ?> Correct, <?= $_SESSION['wrong'] ?> Wrong</p>
    </div>
</body>
</html>
