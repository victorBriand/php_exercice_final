<?php

/*
*Création d'une classe Model
*/

class CategoryModel {

/*
*Attributs $connection et $requete
*Ils permettent de se connecter à la BDD et de faire des requetes
*/

    private $connection;
    private $requete;

    public function __construct() 
    {

/*
*Connexion à la BDD
*/

    // define('SERVER','sqlprive-pc2372-001.privatesql.ha.ovh.net:3306');
    // define('USER','cefiidev1090');
    // define('PASSWORD','i3UpU4z5');
    // define('BASE','cefiidev1090');
        define('SERVER','localhost');
        define('USER','root');
        define('PASSWORD','');
        define('BASE','php3');

/**
* instanciation d'un nouvel objet PDO
* connexion au serveur et test
*/
        try
        {
            $this->connection = new PDO("mysql:host=".SERVER.";dbname=".BASE, USER, PASSWORD);
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
/*
* forcer l'encodage de PDO
*/
            $this->connection->exec("SET CHARACTER SET utf8");
    }

    public function getList() 
    {
        $this->requete="SELECT * FROM category";
        $list = null;

        try
        {
        // exécution de la requête
            $resultat = $this->connection->query($this->requete);

            if ($resultat) 
            {
                $list = $resultat->fetchAll(PDO::FETCH_NUM);
            }
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
        return $list;
    }

    public function add($parmForm) 
    {
/*
*Fonction d'ajout d'élément
*/
        // $sql = $this->connection->prepare('INSERT INTO category (Nom, commentaire) VALUES (:nom, :com)');
        // $sql->bindParam(':nom', $parmForm['parm1']);
        // $sql->bindParam(':com', $parmForm['parm2']);
        $sql = 'INSERT INTO category VALUES (NULL, :parm1, :parm2)';
        $this->requete = $this->connection->prepare($sql);
        $this->requete->bindParam(':parm1', $parmForm['parm1']);
        $this->requete->bindParam(':parm2', $parmForm['parm2']);
        $this->executeTryCatch();
    }
        
    public function update($parmForm) 
    {
        
/*
*Fonction de mise à jour d'élément
*/
        $this->requete = 'UPDATE category SET Nom=:parm1, commentaire=:parm2 WHERE id=:parm0';
        $this->requete = $this->connection->prepare($this->requete);
        $this->requete->bindParam(':parm0', $parmForm['parm0']);
        $this->requete->bindParam(':parm1', $parmForm['parm1']);
        $this->requete->bindParam(':parm2', $parmForm['parm2']);
        $this->executeTryCatch();
    }
    
    public function delete($parmForm) 
    {

/*
*Fonction de suppression d'élément
*/
        $this->requete = 'DELETE FROM category WHERE id=:parm0';
        $this->requete = $this->connection->prepare($this->requete);
        $this->requete->bindParam(':parm0', $parmForm['parm0']);
        $this->executeTryCatch();
    }

    private function executeTryCatch() 
    {

/*
*Fonction d'execution et de test de la requête
*/

        try
        {
            $this->requete->execute();
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
        // Ferme le curseur, permettant à la requête d'être de nouveau exécutée
        $this->requete->closeCursor();
    }
}