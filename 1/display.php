<?php
    include 'connect.php';
    if($db){
        $query = "SELECT * FROM clients";
        $prep = $db->prepare($query);
        $result = $prep->execute();
        if($result){
            $resultat = $prep->fetchAll(PDO::FETCH_ASSOC);
            $output = "";
            foreach($resultat as $row){
                $output .= "<tr>";
                $output .= "<td>" . $row['nom'] . "</td>";
                $output .= "<td>" . $row['prenom'] . "</td>";
                $output .= "<td>" . $row['email'] . "</td>";
                $output .= "<td><a class='del' href='index.php?delete=".$row['id']."' data-href='".$row['id']."'><i class='fas fa-trash-alt text-danger'></i></a></td>";
                $output .= "<td><a class='ed' href='index.php?edit=".$row['id']."'><i class='fas fa-pencil-alt text-success'></i></a></td>";
                $output .= "</tr>";
            }
            echo $output;
        }else{
            echo "Erreur de connexion à la BDD";
        }
    }