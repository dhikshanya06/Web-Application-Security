<?php
session_start();
// Initialize tasks array if not set
if (!isset($_SESSION['tasks'])) $_SESSION['tasks'] = [];
// Add a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $task = trim($_POST['task'] ?? '');
        if ($task !== '') {
            // simple sanitization
            $_SESSION['tasks'][] = $task;
        }
        header("Location: todo_session.php");
        exit;
    }
    // Delete a task (index via POST)
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $idx = isset($_POST['index']) ? (int)$_POST['index'] : -1;
        if ($idx >= 0 && isset($_SESSION['tasks'][$idx])) {
            array_splice($_SESSION['tasks'], $idx, 1); // remove item
        }
        header("Location: todo_session.php");
        exit;
    }
    // Clear all
    if (isset($_POST['action']) && $_POST['action'] === 'clear') {
        $_SESSION['tasks'] = [];
        header("Location: todo_session.php");
        exit;
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Session ToDo List</title></head>
<body>
<h2>My Tasks (stored in session)</h2>

<form method="post">
    <input type="hidden" name="action" value="add">
    <input type="text" name="task" placeholder="New task" required>
    <input type="submit" value="Add Task">
</form>

<?php if (!empty($_SESSION['tasks'])): ?>
    <ul>
    <?php foreach ($_SESSION['tasks'] as $i => $t): ?>
        <li>
            <?php echo htmlspecialchars($t); ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="index" value="<?php echo $i; ?>">
                <button type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
    </ul>
    <form method="post">
        <input type="hidden" name="action" value="clear">
        <button type="submit">Clear all</button>
    </form>
<?php else: ?>
    <p>No tasks yet.</p>
<?php endif; ?>
</body>
</html>
