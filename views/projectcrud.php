<?php
session_start();
require_once __DIR__ . "/../core/Database.php";

$db = Database::connect();
$action = $_GET['action'] ?? null;



/*  CREATE  */
if (isset($_POST['add'])) {
    $stmt = $db->prepare(
        "INSERT INTO projects (name, description, manager_id)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['manager_id']
    ]);
}

/*  UPDATE  */
if (isset($_POST['update'])) {
    $stmt = $db->prepare(
        "UPDATE projects SET name=?, description=?, manager_id=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['manager_id'],
        $_POST['id']
    ]);
}
/* delet */
if ($action === 'delete' && isset($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM projects WHERE id=?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php?page=projects");
    exit;
}
/* get one for edit */
$editProject = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT * FROM projects WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $editProject = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* read all */
$projects = $db->query("SELECT * FROM projects")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
</head>
<body>

<h2>Projects</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Project name"
           value="<?= $editProject['name'] ?? '' ?>" required>

    <textarea name="description" placeholder="Description"><?= $editProject['description'] ?? '' ?></textarea>

    <input type="number" name="manager_id" placeholder="Manager ID"
           value="<?= $editProject['manager_id'] ?? '' ?>" required>

    <?php if ($editProject): ?>
        <input type="hidden" name="id" value="<?= $editProject['id'] ?>">
        <button name="update">Update</button>
    <?php else: ?>
        <button name="add">Add</button>
    <?php endif; ?>
</form>

<hr>

<table border="1" cellpadding="6">
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Manager</th>
    <th>Actions</th>
</tr>

<?php foreach ($projects as $p): ?>
<tr>
    <td><?= $p['name'] ?></td>
    <td><?= $p['description'] ?></td>
    <td><?= $p['manager_id'] ?></td>
    <td>
        <a href="index.php?page=projects&action=edit&id=<?= $p['id'] ?>">modifie</a>
        <a href="index.php?page=projects&action=delete&id=<?= $p['id'] ?>">suprime</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
