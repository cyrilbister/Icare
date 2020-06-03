var check = document.getElementsByClassName('checkbox');
var inputs = document.getElementsByClassName('question_reponse');
var check1 = check[0];
var check2 = check[1];
var input1 = inputs[0];
var input2= inputs[1];

function verif_checkbox(){

    check1.addEventListener('click', function () {

        if (check1.checked == true){

           input1.style.display = "none";
        }
        else if(check1.checked == false){
            input1.style.display = "block";
        }

    })

    check2.addEventListener('click', function () {

        if (check2.checked == true){

            input2.style.visibility = "hidden";
        }
        else if(check1.checked == false){
            input2.style.visibility = "visible";
        }

    })


}

verif_checkbox();