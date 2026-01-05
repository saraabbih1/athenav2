<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../entities/Project.php";

class ProjectRepository
{
    private $db;

    public function __construct()
    {
        $this->db = $GLOBALS['pdo'];
    }

    // créer projet
    public function create(Project $project)
    {
        $sql = "INSERT INTO projects (name, description, start_date, end_date)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $project->getName(),
            $project->getDescription(),
           $project->getManagerId(),
        $project->isActive(),
        $project->getCreatedAt()
        ]);
        $id = (int) $this->db->lastInsertId();
        $project->setId($id);
        return $project;                                                                                                                                                                                                       
    }
    

    // afficher tous les projets
    public function getAll()
    {
        $sql = "SELECT * FROM projects";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
