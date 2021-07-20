<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
            crossorigin="anonymous">
    <script 
            src="https://kit.fontawesome.com/80e78312f3.js" 
            crossorigin="anonymous">
    </script>
    <!-- jquery cdn -->
    <script 
        src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
        crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</head>
<body>
    <div class="wrapper">
    <h1>Mes clients</h1>
    <form id="myForm">
        <ul>
            <li>
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" required>
            </li>
            <li>
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <button type="button" id="add">Ajouter un client</button>
                <div id="reponse"></div>
            </li>
        </ul>
    </form>
    <table id="clients" class="text-center">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <button id="coucou">coucou</button>
        <?php
            include 'display.php';
        ?>
    </table>
    </div>
    <script src="script.js"></script>
</body>
</html>