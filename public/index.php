<?php

require '../Database/Connection.php';
require '../router/Route.php';
require '../router/Dispatcher.php';
require '../Controllers/Controller.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();