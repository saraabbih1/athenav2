<?php
require_once __DIR__ . '/../../athenav2/repositories/SprintRepository.php';

$sprintRepo = new SprintRepository();
$sprints = $sprintRepo->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sprints</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Liste des sprints</h2>
        <a href="./index.php?page=projects"
           class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">
            ← Projects
        </a>
    </div>

    <?php if (empty($sprints)): ?>
        <div class="bg-white p-6 rounded shadow text-gray-600">
            Aucun sprint trouvé
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($sprints as $sprint): ?>
                <div class="bg-white rounded-lg shadow p-5 hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">
                        <?= htmlspecialchars($sprint['name']); ?>
                    </h3>

                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Début :</span> <?= $sprint['start_date']; ?>
                    </p>
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Fin :</span> <?= $sprint['end_date']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>

