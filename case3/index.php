<?php

spl_autoload_register(function ($class_name) {
    $file = $class_name . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    include($file);
});

$beratBadanController = new \controllers\BeratBadanController;

if (isset($_GET['detail']) && isset($_GET['id'])) {
    $beratBadanController->show((int) $_GET['id']);
} else if (isset($_GET['create'])) {
    $beratBadanController->create();
} else if (isset($_POST['store'])) {
    $beratBadanController->store();
} else if (isset($_GET['edit']) && isset($_GET['id'])) {
    $beratBadanController->edit((int) $_GET['id']);
} else if (isset($_POST['update'])) {
    $beratBadanController->update();
} else if (isset($_GET['delete']) && isset($_GET['id'])) {
    $beratBadanController->delete((int) $_GET['id']);
} else {
    $beratBadanController->index();
}