<?php
class Task
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function addOne($newData)
    {
        $query = "INSERT INTO tasks (title, description,status,user_id, project_id, priority)
        VALUES (:title, :description,:status,:user_id, :project_id, :priority)";

        $this->conn->query($query);
        $this->conn->bind(':title', $newData['title']);
        $this->conn->bind(':description', $newData['description']);
        $this->conn->bind(':status', $newData['status']);
        $this->conn->bind(':user_id', $_SESSION['user_id']);
        $this->conn->bind(':project_id', $_SESSION['project_id']);
        $this->conn->bind(':priority', $newData['priority']);

        $this->conn->execute();
    }

    public function getBacklog($projectId)
    {
        $query = "SELECT distinct * from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 0 ORDER BY created_at ASC";

        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        $this->conn->execute();

        return $this->conn->resultSet();
    }
    public function getTodo($projectId)
    {
        $query = "SELECT distinct * from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 1 ORDER BY created_at ASC";

        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        $this->conn->execute();

        return $this->conn->resultSet();
    }
    public function getDoing($projectId)
    {
        $query = "SELECT distinct * from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 2 ORDER BY created_at ASC";

        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        $this->conn->execute();

        return $this->conn->resultSet();
    }
    public function getDone($projectId)
    {
        $query = "SELECT distinct * from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 3 ORDER BY created_at ASC";

        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        $this->conn->execute();

        return $this->conn->resultSet();
    }


    public function getBacklogStats($projectId){
        $query = "SELECT count(*) as count from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 0";
        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        return $this->conn->single();

    }
    public function getTodoStats($projectId){
        $query = "SELECT count(*) as count from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 1";
        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        return $this->conn->single();

    }
    public function getDoingStats($projectId){
        $query = "SELECT count(*) as count from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 2";
        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        return $this->conn->single();

    }
    public function getDoneStats($projectId){
        $query = "SELECT count(*) as count from tasks where project_id = :projectId AND user_id = :userId AND deleted = 0 AND archived = 0 AND status = 3";
        $this->conn->query($query);

        $this->conn->bind(':projectId', $projectId);
        $this->conn->bind(':userId', $_SESSION['user_id']);

        return $this->conn->single();

    }

    
    public function modifyTask($taskId, $newData)
    {
        $query = "UPDATE tasks 
            SET title = :title, 
            description = :description, 
            status = :status, 
            priority = :priority 
            WHERE id = :task_id";

        $this->conn->query($query);
        $this->conn->bind(':title', $newData['title']);
        $this->conn->bind(':description', $newData['description']);
        $this->conn->bind(':status', $newData['status']);
        $this->conn->bind(':priority', $newData['priority']);
        $this->conn->bind(':task_id', $taskId);

        $this->conn->execute();
    }

    public function modifyStatus($taskId, $newStatus){
        $query = "UPDATE tasks 
            SET status = :status
            WHERE id = :task_id";

        $this->conn->query($query);

        $this->conn->bind(':task_id', $taskId);
        $this->conn->bind(':status', $newStatus);

        $this->conn->execute();
    }

    public function modifyPriority($taskId, $newPriority){
        $query = "UPDATE tasks 
            SET priority = :priority
            WHERE id = :task_id";

        $this->conn->query($query);

        $this->conn->bind(':task_id', $taskId);
        $this->conn->bind(':priority', $newPriority);

        $this->conn->execute();
    }

    public function deleteTask($taskId){
        $query = "UPDATE tasks 
            SET deleted = 1
            WHERE id = :task_id";
        $this->conn->query($query);
        $this->conn->bind(':task_id', $taskId, PDO::PARAM_INT);
        $this->conn->execute();

    }
    public function archiveTask($taskId){
        $query = "UPDATE tasks 
            SET archived = 1
            WHERE id = :task_id";
        $this->conn->query($query);
        $this->conn->bind(':task_id', $taskId, PDO::PARAM_INT);
        $this->conn->execute();

    }

    public function getSearchResults($searchTerm)
    {
        $this->conn->query("SELECT * FROM tasks WHERE title LIKE :searchTerm");
        $this->conn->bind(':searchTerm', $searchTerm . '%', PDO::PARAM_STR);
        $this->conn->execute();

        $results = $this->conn->single(PDO::FETCH_ASSOC);
        return $results;

    }

    public function getTaskDataById($taskId){
        $this->conn->query("SELECT * FROM tasks WHERE id = :id");
        $this->conn->bind(':id', $taskId, PDO::PARAM_INT);
        $this->conn->execute();
        return $this->conn->single();
    }

}
