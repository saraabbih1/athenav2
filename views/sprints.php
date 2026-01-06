<?php
require_once '../repositories/SprintRepository.php';

$sprintRepo = new SprintRepository();
$sprints = $sprintRepo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sprints</title>
</head>
<body>

<h2>Liste des sprints</h2>

<?php if (empty($sprints)): ?>
    <p>Aucun sprint trouvé</p>
<?php else: ?>
    <ul>
        <?php foreach ($sprints as $sprint): ?>
            <li>
                <strong><?= $sprint['name']; ?></strong><br>
                Début: <?= $sprint['start_date']; ?> |
                Fin: <?= $sprint['end_date']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="index.php?page=projects">← Projects</a>

</body>
</html>
