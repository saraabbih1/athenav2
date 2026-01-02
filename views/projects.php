<?php
session_start();

require_once __DIR__ . "/../repositories/ProjectRepository.php";

$projectRepo = new ProjectRepository();
$projects = $projectRepo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Projets</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

<h2>Liste des projets</h2>

<a href="../public/index.php"><- Retour</a>

<ul>
<?php foreach ($projects as $project): ?>
    <li>
        <strong><?= $project['name']; ?></strong><br>
        <?= $project['description']; ?>
    </li>
<?php endforeach; ?>
</ul>

</body>
</html>
