var mail = document.getElementById('mail');

function verif_champs_mail(){
    if (mail.value == ""){
        window.alert("Veuillez renseigner une adresse mail");
        location.reload();
    }else if(mail.value.includes('@') && mail.value.includes('.com') || mail.value.includes('.fr') || mail.value.includes('.org')){
        window.alert("Une clé sera envoyée sous peu à l'adresse mail saisie");
    }else{
        window.alert("Veuillez renseigner une adresse mail correcte");
        location.reload();
    }
}