<?php

/*
*Include du View et du Model correspondant
*/

include ('./View/CategoryView.php');
include ('./Model/CategoryModel.php');

/*
*Création d'une classe Controller
*/

class CategoryController
{
    private $view;
    private $model;

    public function __construct() {

/*
*Appel des classes View et Model
*/

        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }

    public function listAction() {
        $list = $this->model->getList();
        $this->view->displayList($list);
    }

    public function addAction() {
        $this->model->add($this->parmForm);
        $this->view->displayAdd();
    }

    public function updateAction() {
        $this->view->displayUpdate($this->paramGet['parm0']);
        
    }

    public function deleteAction() {
        $this->view->displayDelete();
    }
}