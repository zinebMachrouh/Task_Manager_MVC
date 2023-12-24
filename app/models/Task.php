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
        $query = "INSERT INTO tasks (title, description,status, project_id, priority)
        VALUES (:title, :description,:status, :project_id, :priority)";

        $this->conn->query($query);
        $this->conn->bind(':title', $newData['title']);
        $this->conn->bind(':description', $newData['description']);
        $this->conn->bind(':status', $newData['status']);
        $this->conn->bind(':project_id', $newData['project_id']);
        $this->conn->bind(':priority', $newData['priority']);

        $this->conn->execute();
    }
}
