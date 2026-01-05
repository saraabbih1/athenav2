<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../entities/Sprint.php";

class SprintRepository
{
    private $db;

    public function __construct()
    {
        $this->db = $GLOBALS['pdo'];
    }

    // créer sprint
    public function create(Sprint $sprint)
    {
        $sql = "INSERT INTO sprints (project_id, name, start_date, end_date)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $sprint->getProjectId(),
            $sprint->getName(),
            $sprint->getStartDate(),
            $sprint->getEndDate()
        ]);
         $id = (int) $this->db->lastInsertId();
        $sprint->setId($id);
        return $sprint; 
    }

    // récupérer sprints d'un projet
    public function getByProject($projectId)
    {
        $sql = "SELECT * FROM sprints WHERE project_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$projectId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
