<?php
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

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

    case 'logout':
        require_once 'services/Auth.php';
        $auth = new Auth();
        $auth->logout();
        header("Location: index.php?page=login");
        exit;

    default:
        echo "Page not found";
}
