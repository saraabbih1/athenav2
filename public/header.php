<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /athenav2/views/login.php");
    exit;
}
?>

<header>
    <nav>
        <ul class="nav-menu">
            <li><a href="/athenav2/views/dashboard.php">Dashboard</a></li>
            <li><a href="/athenav2/views/project.php">Projects</a></li>
            <li><a href="/athenav2/views/sprints.php">sprints</a></li>
            <li><a href="/athenav2/views/tasks.php">tasks</a></li>
            <li><a href="/athenav2/views/logout.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>
