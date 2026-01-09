<?php
require_once __DIR__.'/../repositories/TaskRepository.php';

$taskRepo = new TaskRepository();
$tasks = $taskRepo->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800"> Liste des tâches</h2>
        <a href="./index.php?page=sprints"
           class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">
            ← Sprints
        </a>
    </div>

    <?php if (empty($tasks)): ?>
        <div class="bg-white p-6 rounded shadow text-gray-600">
            Aucune tâche trouvée
        </div>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="px-4 py-3">Titre</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-slate-800">
                                <?= htmlspecialchars($task['title']); ?>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs
                                    <?= $task['status'] === 'done'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-yellow-100 text-yellow-700'; ?>">
                                    <?= htmlspecialchars($task['status']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</body>
</html>
