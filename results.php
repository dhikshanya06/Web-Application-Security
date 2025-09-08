<?php
session_start();
if (!isset($_SESSION['quiz'])) {
    header("Location: quiz.php");
    exit;
}
$quiz = $_SESSION['quiz'];
$score = $quiz['score'];
$max = $quiz['max'];
$answers = $quiz['answers'];

// Optional: destroy quiz session data if you don't want repeated view
// unset($_SESSION['quiz']);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Quiz Results</title></head>
<body>
<h2>Your Score: <?php echo $score . " / " . $max; ?></h2>

<h3>Review</h3>
<ol>
  <li>2 + 2 = <strong><?php echo htmlspecialchars($answers['q1'] ?? 'No answer'); ?></strong>
      <?php if (($answers['q1'] ?? '') === '4') echo " ✓"; else echo " ✗ (correct: 4)"; ?>
  </li>

  <li>Programming language = <strong><?php echo htmlspecialchars($answers['q2'] ?? 'No answer'); ?></strong>
      <?php if (($answers['q2'] ?? '') === 'Python') echo " ✓"; else echo " ✗ (correct: Python)"; ?>
  </li>
</ol>

<p><a href="quiz.php">Take again</a></p>
</body>
</html>
