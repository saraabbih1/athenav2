<?php
session_start();
require_once __DIR__ . "/../core/Database.php";

$db = Database::connect();
$action = $_GET['action'] ?? null;

/* DELETE  */
if ($action === 'delete' && isset($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM sprints WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php?page=sprints");
    exit;
}

/*  CREATE  */
if (isset($_POST['add'])) {
    $stmt = $db->prepare(
        "INSERT INTO sprints (name, start_date, end_date, project_id)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['project_id']
    ]);
}

/*  UPDATE  */
if (isset($_POST['update'])) {
    $stmt = $db->prepare(
        "UPDATE sprints SET name=?, start_date=?, end_date=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['id']
    ]);
}

/*  GET ONE FOR EDIT  */
$editSprint = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT * FROM sprints WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $editSprint = $stmt->fetch(PDO::FETCH_ASSOC);
}

$sprints = $db->query("SELECT * FROM sprints")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sprints</title>
</head>
<body>

<h2>Sprints</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Sprint name"
           value="<?= $editSprint['name'] ?? '' ?>" required>

    <input type="date" name="start_date"
           value="<?= $editSprint['start_date'] ?? '' ?>" required>

    <input type="date" name="end_date"
           value="<?= $editSprint['end_date'] ?? '' ?>" required>

    <input type="number" name="project_id"
           placeholder="Project ID"
           value="<?= $editSprint['project_id'] ?? '' ?>" required>

    <?php if ($editSprint): ?>
        <input type="hidden" name="id" value="<?= $editSprint['id'] ?>">
        <button name="update">Update</button>
    <?php else: ?>
        <button name="add">Add</button>
    <?php endif; ?>
</form>

<hr>


<table border="1" cellpadding="6">
<tr>
    <th>Name</th>
    <th>Start</th>
    <th>End</th>
    <th>Actions</th>
</tr>

<?php foreach ($sprints as $s): ?>
<tr>
    <td><?= $s['name'] ?></td>
    <td><?= $s['start_date'] ?></td>
    <td><?= $s['end_date'] ?></td>
    <td>
        <a href="index.php?page=sprints&action=edit&id=<?= $s['id'] ?>">✏️</a>
        <a href="index.php?page=sprints&action=delete&id=<?= $s['id'] ?>">🗑️</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
