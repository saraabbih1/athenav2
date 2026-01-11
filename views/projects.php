<?php


require_once __DIR__ . "/../repositories/ProjectRepository.php";

$projectRepo = new ProjectRepository();
$projects = $projectRepo->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Liste des projets</h2>
        <a href="./index.php?page=dashboard"
           class="text-sm text-white bg-slate-800 px-4 py-2 rounded hover:bg-slate-700">
            ← Retour Dashboard
        </a>
    </div>
    
    <!-- Projects list -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($projects as $project): ?>
            <div class="bg-white rounded-lg shadow p-5 hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-slate-800 mb-2">
                    <?= htmlspecialchars($project['title']); ?>
                </h3>

                <p class="text-gray-600 text-sm">
                    <?= htmlspecialchars($project['description']); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php?page=project_create"
   class="bg-green-600 text-white px-4 py-2 rounded">
   + Nouveau projet
</a>

    <a href="index.php?page=project_delete&id=<?= $project['id'] ?>"
   class="text-red-500 text-sm"
   onclick="return confirm('Delete project?')">
   Delete
</a>


</body>
</html>
