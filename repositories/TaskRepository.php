<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../entities/Task.php";

class TaskRepository
{
    private $db;

    public function __construct()
    {
        $this->db = $GLOBALS['pdo'];
    }

    // créer task
    public function create(Task $task)
    {
        $sql = "INSERT INTO tasks (sprint_id, title, status, assigned_to)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $task->getSprintId(),
            $task->getTitle(),
            $task->getStatus(),
            $task->getAssignedTo()
        ]);
         $id = (int) $this->db->lastInsertId();
        $task->setId($id);
        
        return $task; 
    }

    // tasks d'un sprint
    public function getBySprint($sprintId)
    {
        $sql = "SELECT * FROM tasks WHERE sprint_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$sprintId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     // afficher tous les tasks
    public function getAll()
    {
        $sql = "SELECT * FROM tasks";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
