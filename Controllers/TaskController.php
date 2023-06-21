<?php

require_once '../Models/Task.php';

class TaskController extends Controller
{
    private $model;
    public $statusColor = [
        1 => 'primary',
        2 => 'primary',
        3 => 'success',
        4 => 'success',
        5 => 'danger',
    ];

    function __construct() {
        $this->model = new Task();
    }

    public function index($page = 1) {
        $tasks = $this->model->getAllTask($page);
        $lastPage = $this->model->getLastPage();
        
        return $this->render('index', ['tasks' => $tasks, 'lastPage' => $lastPage, 'page' => $page]);
    }

    public function create() {
        $taskStatus = $this->model->getAllTaskStatus();

        return $this->render('create', ['taskStatus' => $taskStatus]);
    }

    public function store() {
        $task = $this->model->create([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
        ]);

        $_SESSION['success'] = 'Tạo task thành công';

        return header('Location: /task/index');
    }

    public function edit($id) {
        $task = $this->model->getTaskById($id);
        $taskStatus = $this->model->getAllTaskStatus();

        return $this->render('create', ['task' => $task, 'taskStatus' => $taskStatus]);
    }

    public function update($id) {
        $task = $this->model->update([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'id' => $id,
        ]);

        $_SESSION['success'] = 'Sửa task thành công';

        return header('Location: /task/index');
    }

    public function delete($id) {
        $task = $this->model->deleteTaskById($id);

        $_SESSION['success'] = 'Xoá task thành công';

        return header('Location: /task/index');
    }
}