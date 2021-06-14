<?php
/*
*Interface de l'application
*/

include "dispatcher.php";

$dispatcher = new Dispatcher();
$dispatcher->disptach();
/*
*Include de la page demandée
*Suivant la categorie séléctionnée dans le menu, 
*le controller correspondant est ajouté ("include")
*/

