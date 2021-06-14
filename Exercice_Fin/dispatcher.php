<?php
include "./Controller/CategoryController.php";
include "./Controller/ClientsController.php";
include "./Controller/ProspectsController.php";

class Dispatcher
{
    public function disptach()
    {
        $controller = (isset($_GET['controller']))?$_GET['controller']:"Category";
        $controller = $controller."Controller";

        $action = (isset($_GET['action']))?$_GET['action']:"list";
        $action = $action."Action";

        $my_controller = new $controller();
        $my_controller->$action();
    }
}