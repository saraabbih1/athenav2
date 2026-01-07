<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>

<div class="dashboard">

    <h2>Dashboard</h2>

    <p>
        Bienvenue <br>
        <strong>Role :</strong> <?= $_SESSION['role']; ?>
    </p>

    <hr>

    <ul>
        <li><a href="index.php?page=projects">Projects</a></li>
        <li><a href="index.php?page=sprints">Sprints</a></li>
        <li><a href="index.php?page=tasks">Tasks</a></li>
    </ul>

    <hr>

    <div class="logout">
        <a href="index.php?page=logout">Logout</a>
    </div>

</div>

</body>
</html>
