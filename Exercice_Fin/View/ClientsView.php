<?php

/*
*Création d'une classe View
*/

class ClientsView {
    
/*
*Création d'un attribut $page 
*
*On stocke toute la partie visible par l'utilisateur
*/

    private $page;

    public function __construct() {
    
/*
*Intégration du header et du footer
*/

        $this->page = $this->searchHTML('header');
        $this->page .= $this->searchHTML('nav');
    }

    public function displayHome() 
    {

/*
*Création de la fontion affichant la page d'accueil
*/

        $this->page .= "<h1>Je suis sur la page d'accueil 2</h1>";
        $this->display();
        }

    public function displayList($list) 
    {
    
/*
*Création de la fonction affichant la liste des éléments
*/

        $this->page .= "<h1>Je suis sur la liste 2</h1>";
        $tableau = '<div class="container">'
        . '<table class="table table-striped table-bordered" cellspacing="0">'
        . '<thead>'
        . '<th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code postal</th><th>Ville</th><th>Commentaire</th><th>Modification</th><th>Suppression</th>'
        . '</thead><tbody>';
        foreach($list as $ligne) {
        $tableau .= "<tr><td>$ligne[1]</td>"
        ."<td>$ligne[2]</td>"
        ."<td>$ligne[3]</td>"
        ."<td>$ligne[4]</td>"
        ."<td>$ligne[5]</td>"
        ."<td>$ligne[6]</td>"
        ."<td><a href='index.php?controller=clients&action=update&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]&parm4=$ligne[4]&parm5=$ligne[5]&parm6=$ligne[6]'><i class='fas fa-pencil-alt text-success'></i></a></td>"
        ."<td><a href='index.php?controller=clients&action=delete&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]&parm4=$ligne[4]&parm5=$ligne[5]&parm6=$ligne[6]'><i class='fas fa-trash-alt text-danger'></i></a></td></tr>";
        }
        $tableau .= "</tbody></table><div class='form-group'>
        <a href='index.php?controller=clients&action=add'>Ajouter un élément</a>
        </div></div>";
        $this->page .= $tableau;
        $this->display();
    }

    private function displayForm($paramaters)
    {
/*
*Création de la fonction remplçant les données du formulaire
*/
        $this->page .= $this->searchHTML('formClients');
        $this->page = str_replace("{readonly}", $paramaters["readonly"], $this->page);
        $this->page = str_replace("{parm0}", $paramaters["parm0"], $this->page);
        $this->page = str_replace("{parm1}", $paramaters["parm1"], $this->page);
        $this->page = str_replace("{parm2}", $paramaters["parm2"], $this->page);
        $this->page = str_replace("{parm3}", $paramaters["parm3"], $this->page);
        $this->page = str_replace("{parm4}", $paramaters["parm4"], $this->page);
        $this->page = str_replace("{parm5}", $paramaters["parm5"], $this->page);
        $this->page = str_replace("{parm6}", $paramaters["parm6"], $this->page);
        $this->page = str_replace("{action}", $paramaters["action"], $this->page);
        $this->page = str_replace("{lib_action}", $paramaters["lib_action"], $this->page);
        $this->display();
    }

    public function displayAdd() 
    {

/*
*Création de la fonction d'ajout d'élément dans la BDD
*/
        $this->page .= "<h1>Je suis sur la page d'ajout</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>"",
        "parm1"=>"",
        "parm2"=>"",
        "parm3"=>"",
        "parm4"=>"",
        "parm5"=>"",
        "parm6"=>"",
        "action"=>"add",
        "lib_action"=>"Ajout");
        $this->displayForm($paramaters);
    }

    public function displayUpdate($paramGet) 
    {

/*
*Création de la fonction de mise à jour d'une donnée
*/

        $this->page .= "<h1>Je suis sur la page de modif</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "parm4"=>$paramGet['parm4'],
        "parm5"=>$paramGet['parm5'],
        "parm6"=>$paramGet['parm6'],
        "action"=>"update",
        "lib_action"=>"Modifier");
        $this->displayForm($paramaters);
    }

    public function displayDelete($paramGet) 
    {
/*
*Création de la fonction de suppression d'un élément de la BDD
*/
        $this->page .= "<h1>Je suis sur la page de suppression</h1>";
        $paramaters = array(
        "readonly"=>"readonly",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "parm4"=>$paramGet['parm4'],
        "parm5"=>$paramGet['parm5'],
        "parm6"=>$paramGet['parm6'],
        "action"=>"delete",
        "lib_action"=>"Supprimer");
        $this->displayForm($paramaters);
    }

    public function display() 
    {

/*
*Création de la fonction affichant toute la page ainsi que le footer
*/
        $this->page .= $this->searchHTML('footer');
        echo $this->page;
    }

    private function searchHTML($filename) 
    {

/*
*Création de la fonction qui récupère les fichiers HTML
*/
        $content = file_get_contents('./View/html/'.$filename.'.html');
        return $content;
    }
        
}