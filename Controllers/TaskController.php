<?php

require_once '../Models/Task.php';

class TaskController extends Controller
{
    private $model;

    function __construct() {
        $this->model = new Task();
    }

    public function index() {
        $tasks = $this->model->getAllTask();
        
        $this->render('index', ['tasks' => $tasks]);
    }
}