<?php session_start(); ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Simple Quiz</title></head>
<body>
<h2>Quick Quiz</h2>
<form method="post" action="submit_quiz.php">
  <fieldset>
    <legend>1. What is 2 + 2?</legend>
    <label><input type="radio" name="q1" value="3" required> 3</label><br>
    <label><input type="radio" name="q1" value="4"> 4</label><br>
    <label><input type="radio" name="q1" value="5"> 5</label>
  </fieldset>

  <fieldset>
    <legend>2. Which is a programming language?</legend>
    <label><input type="radio" name="q2" value="Banana" required> Banana</label><br>
    <label><input type="radio" name="q2" value="Python"> Python</label><br>
    <label><input type="radio" name="q2" value="Chair"> Chair</label>
  </fieldset>

  <br>
  <input type="submit" value="Submit Quiz">
</form>
</body>
</html>
