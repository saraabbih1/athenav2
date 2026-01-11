<?php
require_once __DIR__ . "/../repositories/ProjectRepository.php";


if ($_SESSION['role'] !== 'manager') {
    header("Location: index.php?page=dashboard");
    exit;
}


$id = $_GET['id'];
$repo = new ProjectRepository();
$project = $repo->getById($id);
?>

<form method="POST" action="index.php?page=project_update">
    <input type="hidden" name="id" value="<?= $project['id'] ?>">

    <input type="text" name="title" value="<?= $project['title'] ?>" class="border p-2">
    <textarea name="description" class="border p-2"><?= $project['description'] ?></textarea>

    <button>Update</button>
</form>
