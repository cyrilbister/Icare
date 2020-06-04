var question = document.getElementById('question');
var reponse = document.getElementById('reponse');
var ajouter = document.getElementById('ajouter');


function verif_champs(){
    if (question.value == "" || reponse.value == ""){
        window.alert("Les champs n'ont pas été rempli correctement !");
    }else{
        window.alert("Vous avez ajouté un élément à la FAQ");
    }
}