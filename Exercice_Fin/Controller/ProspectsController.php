<?php

/*
*Include du View et du Model correspondant
*/

include ('./View/ProspectsView.php');
include ('./Model/ProspectsModel.php');

/*
*Création d'une classe Controller
*/

class ProspectsController
{
    private $view;
    private $model;

    public function __construct() {

/*
*Appel des classes View et Model
*/
        $this->view = new ProspectsView();
        $this->model = new ProspectsModel();
    }

/*
*Orientation de l'utilisateur suivant la valeur de ['action']
*/

    public function listAction() {
        $list = $this->model->getList();
        $this->view->displayList($list);
    }
}