<?php
session_start();
require_once __DIR__ . "/../core/Database.php";

$db = Database::connect();
$action = $_GET['action'] ?? null;

/* DELETE  */
if ($action === 'delete' && isset($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php?page=tasks");
    exit;
}

/*  CREATE  */
if (isset($_POST['add'])) {
    $stmt = $db->prepare(
        "INSERT INTO tasks (title, status, priority, sprint_id, user_id)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['status'],
        $_POST['priority'],
        $_POST['sprint_id'],
        $_POST['user_id']
    ]);
}

/* UPDATE  */
if (isset($_POST['update'])) {
    $stmt = $db->prepare(
        "UPDATE tasks SET title=?, status=?, priority=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['status'],
        $_POST['priority'],
        $_POST['id']
    ]);
}

/* GET ONE FOR EDIT  */
$editTask = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT * FROM tasks WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $editTask = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* read all */
$tasks = $db->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>

<h2>Tasks</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Task title"
           value="<?= $editTask['title'] ?? '' ?>" required>

    <input type="text" name="status" placeholder="Status"
           value="<?= $editTask['status'] ?? '' ?>" required>

    <input type="text" name="priority" placeholder="Priority"
           value="<?= $editTask['priority'] ?? '' ?>" required>

    <input type="number" name="sprint_id" placeholder="Sprint ID"
           value="<?= $editTask['sprint_id'] ?? '' ?>" required>

    <input type="number" name="user_id" placeholder="User ID"
           value="<?= $editTask['user_id'] ?? '' ?>" required>

    <?php if ($editTask): ?>
        <input type="hidden" name="id" value="<?= $editTask['id'] ?>">
        <button name="update">Update</button>
    <?php else: ?>
        <button name="add">Add</button>
    <?php endif; ?>
</form>

<hr>

<table border="1" cellpadding="6">
<tr>
    <th>Title</th>
    <th>Status</th>
    <th>Priority</th>
    <th>Actions</th>
</tr>

<?php foreach ($tasks as $t): ?>
<tr>
    <td><?= $t['title'] ?></td>
    <td><?= $t['status'] ?></td>
    <td><?= $t['priority'] ?></td>
    <td>
        <a href="index.php?page=tasks&action=edit&id=<?= $t['id'] ?>">✏️</a>
        <a href="index.php?page=tasks&action=delete&id=<?= $t['id'] ?>">🗑️</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
