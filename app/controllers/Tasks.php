<?php
require 'Users.php';

class Tasks extends Controller
{
    private $userController;
    private $projectModel;
    private $taskModel;

    private $userModel;
    public function __construct()
    {
        $this->userController = new Users();
        $this->projectModel = $this->userController->getProjectModel();
        $this->userModel = $this->userController->getUserModel();
        $this->taskModel = $this->model('Task');
    }

    public function getTask($taskId)
    {
        $taskData = $this->taskModel->getTaskDataById($taskId);
        echo json_encode($taskData);
    }


    public function index($projectId)
    {
        $backlog = $this->taskModel->getBacklog($projectId);
        $todo = $this->taskModel->getTodo($projectId);
        $doing = $this->taskModel->getDoing($projectId);
        $done = $this->taskModel->getDone($projectId);

        $user = $this->userModel->getUser($_SESSION['user_email']);

        $backlogStats = $this->taskModel->getBacklogStats($projectId);
        $todoStats = $this->taskModel->getTodoStats($projectId);
        $doingStats = $this->taskModel->getDoingStats($projectId);
        $doneStats = $this->taskModel->getDoneStats($projectId);

        $data = [
            'backlog' => $backlog,
            'todo' => $todo,
            'doing' => $doing,
            'done' => $done,
            'backlogStats' => $backlogStats,
            'todoStats' => $todoStats,
            'doingStats' => $doingStats,
            'doneStats' => $doneStats,
            'user' => $user

        ];
        $_SESSION['project_id'] = $projectId;

        $this->view('tasks/index', $data);
    }

    public function createTask(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $newData = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'priority' => $_POST['priority'],
            'status' => $_POST['status'],
        ];
        $this->taskModel->addOne($newData);
        redirect('tasks/index/'. $_SESSION['project_id']);
    }

    public function modifyTask($id){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $newData = [
            'title' => $_POST['mtitle'],
            'description' => $_POST['mdescription'],
            'priority' => $_POST['mpriority'],
            'status' => $_POST['mstatus'],
        ];

        $this->taskModel->modifyTask($id, $newData);

        redirect('tasks/index/' . $_SESSION['project_id']);

    }

    public function deleteTask($id){
        $this->taskModel->deleteTask($id);

        redirect('tasks/index/' . $_SESSION['project_id']);

    }

    public function archiveTask($id){
        $this->taskModel->archiveTask($id);

        redirect('tasks/index/' . $_SESSION['project_id']);

    }

    public function searchData($input){
        $results = $this->taskModel->getSearchResults($input);
        echo json_encode($results);
    }
    public function addMultiForm($count) {

        $data = [
            'count' => $count
        ];

        $this->view('tasks/addMulti', $data);

    }

    public function addMulti()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $count = $_POST['count'];
        redirect('tasks/addMultiForm/'.$count);
    }
    public function insertTasks()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $count = isset($_POST['pagination_count']) ? (int)$_POST['pagination_count'] : 1;
            $formIndex = isset($_POST['form_index']) ? (int)$_POST['form_index'] : 0;

            $newData = [
                'title' => $_POST['title_' . $formIndex],
                'description' => $_POST['description_' . $formIndex],
                'priority' => $_POST['priority_' . $formIndex],
                'status' => $_POST['status_' . $formIndex],
            ];

            $this->taskModel->addOne($newData);

            echo json_encode(['success' => true]);
            exit;
        }    }
}
