<?php
require_once __DIR__ . "/../repositories/ProjectRepository.php";

if ($_SESSION['role'] !== 'manager') {
    header("Location: index.php?page=dashboard");
    exit;
}

$id = $_GET['id'];

$repo = new ProjectRepository();
$repo->delete($id);

header("Location: index.php?page=projects");
exit;
