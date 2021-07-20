$(document).ready(function () {
    $("#add").on("click", addClient);
    $(".del").click(function (e) { 
        e.preventDefault();
        var dataResult = JSON.parse(dataResult);
        // console.log("ok");
        // var id = $(this).attr('data-href');
        // console.log(id);
        $.ajax({
            type: "POST",
            url: "traitement.php",
            dataType: "json",
            data: {type:3, id: $(this).val()},
            success: function (dataResult) {
                console.log(dataResult);
                
            }
        });
    });
});

function addClient(){
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var email = $("#email").val();

    $.ajax({
        type: "POST",
        url: "traitement.php",
        data: {nom, prenom, email},
        dataType: "json",
        success: function (response) {
            $("#reponse")
                .hide()
                .html("<span class='success'>Client ajouté avec succès !</span>")
                .fadeIn(1000);
            $("input").val('');
            $("#clients").append("<tr><td>" + nom + "</td><td>" + prenom + "</td><td>" + email + "</td>");
        }, error: function (){
            $("#reponse")
                .html("<span class='error'>Une erreur s'est produite</span>");
        }
    });
    
function delClient(){
    console.log("ok");
}
    // var id = $("a").val();
    // var nom = $("#nom").val();
    // var prenom = $("#prenom").val();
    // var email = $("#email").val();

    // console.log(id);

    // $.ajax({
    //     type: "POST",
    //     url: "traitement.php",
    //     data: {nom, prenom, email},
    //     dataType: "json",
    //     success: function (response) {
    //         $("#reponse")
    //             .hide()
    //             .html("<span class='success'>Client ajouté avec succès !</span>")
    //             .fadeIn(1000);
    //         $("input").val('');
    //         $("#clients").append("<tr><td>" + nom + "</td><td>" + prenom + "</td><td>" + email + "</td>");
    //     }, error: function (){
    //         $("#reponse")
    //             .html("<span class='error'>Une erreur s'est produite</span>");
    //     }
    // });
}

// document.getElementById("add").addEventListener("click", addClient);

// var xhr = new XMLHttpRequest();

// function addClient(){
//     if(document.getElementById("myForm").checkValidity()){
//         var nom = document.getElementById("nom").value;
//         var prenom = document.getElementById("prenom").value;
//         var email = document.getElementById("email").value;

//         xhr.open("POST", "traitement.php");
//         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         xhr.send("nom=" + nom + "&prenom=" + prenom + "&email=" + email);
//         xhr.responseType = "json";
//         xhr.onreadystatechange = function() {
//             traitement(nom, prenom, email);
//         }

//     }else{
//         alert("Veuillez vérifier les champs");
//     }
// }

// function traitement(n, p, e){
//     if(xhr.readyState == 4 && xhr.status == 200){
//         if(xhr.response){
//             reponse = "<span class='success'>Client ajouté avec succès</span>";
//             document.getElementById("nom").value = "";
//             document.getElementById("prenom").value = "";
//             document.getElementById("email").value = "";

//             document.getElementById("clients").innerHTML += "<tr><td>" + n +"</td><td>" + p + "</td><td>" + e + "</td></tr>";
        
//         }else{
//             reponse = "<span class='error'>Une erreur s'est produite</span>";
//         }
//         document.getElementById("reponse").innerHTML = reponse;
//     }
// }