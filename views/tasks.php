<?php
require_once '../repositories/TaskRepository.php';

$taskRepo = new TaskRepository();
$tasks = $taskRepo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>

<h2>Liste des tâches</h2>

<?php if (empty($tasks)): ?>
    <p>Aucune tâche trouvée</p>
<?php else: ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Titre</th>
            <th>Status</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['title']; ?></td>
                <td><?= $task['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<a href="index.php?page=sprints">← Sprints</a>

</body>
</html>
