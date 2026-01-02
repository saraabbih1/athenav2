<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Scrum Project Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Scrum Project Management System</h1>

<?php if (isset($_SESSION['user'])): ?>
    
    <p>Bienvenue <?= $_SESSION['user']->getName(); ?></p>
    <p>Rôle : <?= $_SESSION['user']->getRole(); ?></p>

    <ul>
        <li><a href="../views/projects.php">Projets</a></li>
        <li><a href="../views/sprints.php">Sprints</a></li>
        <li><a href="../views/tasks.php">Tâches</a></li>
        <li><a href="../views/logout.php">Logout</a></li>
    </ul>

<?php else: ?>

    <p>Vous n'êtes pas connecté</p>
    <a href="../views/login.php">Login</a>

<?php endif; ?>

</body>
</html>
