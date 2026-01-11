<?php
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
if (!isset($_SESSION["user_id"]) && $page !== 'login') {
    header("location: index.php?page=login");
    exit;
}

// router
switch ($page) {

    case 'login':
        require_once 'views/login.php';
        break;

    case 'projects':
        require_once 'views/projects.php';
        break;

    case 'sprints':
        require_once 'views/sprints.php';
        break;

    case 'tasks':
        require_once 'views/tasks.php';
        break;

    case 'dashboard':
        require_once 'views/dashboard.php';
        break;

    case 'project_create':
        require_once 'views/project_create.php';
        break;

    case 'project_edit':
        require_once 'views/project_edit.php';
        break;

    case 'project_delete':
        require_once 'services/project_delete.php';
        break;
    case 'project_store':
        require_once 'services/project_store.php';
        break;

    case 'project_create':
        require_once 'views/project_create.php';
        break;


    case 'logout':
        session_destroy();
        header("Location: index.php?page=login");
        exit;

    default:
        echo "Page n'exist pas";
}
