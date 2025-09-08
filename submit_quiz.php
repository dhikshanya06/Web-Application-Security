<?php
session_start();

// Define correct answers
$correct = [
    'q1' => '4',
    'q2' => 'Python'
];

$score = 0;
$answers_given = [];

// Capture posted answers and compute score
foreach ($correct as $q => $correct_ans) {
    $given = $_POST[$q] ?? null;
    $answers_given[$q] = $given;
    if ($given !== null && $given === $correct_ans) $score++;
}

// Store in session
$_SESSION['quiz'] = [
    'score' => $score,
    'answers' => $answers_given,
    'max' => count($correct)
];

// Redirect to results
header("Location: results.php");
exit;
