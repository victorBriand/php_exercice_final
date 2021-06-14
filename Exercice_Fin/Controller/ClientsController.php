<?php

/*
*Include du View et du Model correspondant
*/

include ('./View/ClientsView.php');
include ('./Model/ClientsModel.php');

/*
*Création d'une classe Controller
*/

class ClientsController
{
    private $view;
    private $model;

    public function __construct() {

/*
*Appel des classes View et Model
*/

        $this->view = new ClientsView();
        $this->model = new ClientsModel();
    }
    
    public function listAction() {
        $list = $this->model->getList();
        $this->view->displayList($list);
    }
}