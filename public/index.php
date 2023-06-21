<?php

require '../Database/Connection.php';
require '../router/Route.php';
require '../router/Dispatcher.php';
require '../Controllers/Controller.php';

session_start();

$dispatcher = new Dispatcher();
$dispatcher->dispatch();