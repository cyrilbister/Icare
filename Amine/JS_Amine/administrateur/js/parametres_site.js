//On encart correspond à la vérification pour une partie de la page


// ------------------------ LOGO ------------------------------

var logo = document.getElementById('file');                     //Dans la variable logo on stocke le nouveau logo à utiliser pour renommer le site


function verif_champs_logo(){
    console.log(logo.value);
    if (logo.value == ""){
        window.alert("Veuiller upload votre logo avant de valider");
        location.reload();
    }else{
        window.alert("Vous avez renseigné un nouveau logo pour votre site");
    }
}


//La fonction suivante permet d'afficher une preview du logo quand il est upload
function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }



//------------------------ NOM DU SITE -------------------------

var nom_site = document.getElementById('nom_site');             //Dans la variable nom_site on stocke le nom du site à utiliser pour renommer le site


function verif_champs_site(){
    if (nom_site.value == ""){
        window.alert("Veuillez renseigner un nom pour votre site");
        location.reload();
    }else{
        window.alert("Vous avez renommé votre site : " + nom_site.value);
    }
}



//------------------- ADRESSE DE L'AUTO-ECOLE ------------------

var num_rue = document.getElementById('num_rue');
var nom_rue = document.getElementById('nom_rue');
var ville = document.getElementById('ville');
var code_postal = document.getElementById('code_postal');


function verif_champs_adresse(){
    if (num_rue.value == "" || nom_rue.value == "" || ville.value == "" || code_postal.value == ""){
        window.alert("Veuillez remplir tous les champs requis !");
        location.reload();
    }else{
        window.alert("Votre auto-école est située au " + num_rue.value +" "+nom_rue.value+", "+ville.value+", "+code_postal.value);
    }
}