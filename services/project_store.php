<?php
require_once __DIR__ . "/../repositories/ProjectRepository.php";
require_once __DIR__ . "/../entities/Project.php";

if ($_SESSION['role'] !== 'manager') {
    header("Location: index.php?page=dashboard");
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];
$managerId = $_SESSION['user_id'];

$project = new Project(
    $title,
    $description,
    $managerId,
    $start,
    $end,
    $active,
);

$repo = new ProjectRepository();
$repo->create($project);

header("Location: index.php?page=projects");
exit;
