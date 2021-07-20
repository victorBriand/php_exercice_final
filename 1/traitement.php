<?php
    include 'connect.php';
    if($db){
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])){
            $req = $db->prepare("INSERT INTO clients (nom, prenom, email) VALUES (:nom, :prenom, :email)");
            $req->bindParam(':nom', $_POST['nom']);
            $req->bindParam(':prenom', $_POST['prenom']);
            $req->bindParam(':email', $_POST['email']);
            $resultat = $req->execute();

            echo json_encode($resultat);
        }

        if(isset($_GET['edit'])){
            $req = $db->prepare("UPDATE clients SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");
            $req->bindParam(':id', $id);
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':email', $email);
            $resultat = $req->execute();

            echo json_encode($resultat);
        }

        if(isset($_GET['edit'])){
            $req = $db->prepare("UPDATE clients SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");
            $req->bindParam(':id', $id);
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':email', $email);
            $resultat = $req->execute();

            echo json_encode($resultat);
        }

        if(isset($_GET['delete'])){
            $req = $db->prepare("DELETE FROM clients WHERE id=:id");
            $req->bindParam(':id', $id);
            $resultat = $req->execute();
        }
    }