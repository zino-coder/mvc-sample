<?php

require_once '../Models/Task.php';

class TaskController extends Controller
{
    private $model;

    function __construct() {
        $this->model = new Task();
    }
    public function index() {
        $tasks = 12;

        $this->render('index', ['tasks' => $tasks, 'title' => 'Hello casc bajns']);
    }

    public function create($a, $b, $c) {
        echo "$a, $b, $c";
    }
}