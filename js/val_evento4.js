function validate(val){
    v1 = document.getElementById("nombre_ev");
    v2 = document.getElementById("fecha_ev");
    v3 = document.getElementById("hora_ev");
    v4 = document.getElementById("categoria_ev");
    v5 = document.getElementById("spot_ev");
    v6 = document.getElementById("descrip_ev");
    v7 = document.getElementById("precio_ev");
    v8 = document.getElementById("aforo_ev");
    v9 = document.getElementById("poster_ev");
   
    
    flag1 = false;
    flag2 = false;
    flag3 = false;
    flag4 = false;
    flag5 = false;
    flag6 = false;
    flag7 = false;
    flag8 = false;
    flag9 = false;

    if(val >= 1 || val == 0){
        if(v1.value == ""){
            v1.style.borderColor = "red";
            flag1 = false;
        }else{
            v1.style.borderColor = "green";
            flag1 = true;
        }
    }

    if(val >= 2 || val == 0){

        if(v2.value == ""){
            v2.style.borderColor = "red";
            flag2 = false;
        }else{
            v2.style.borderColor = "green";
            flag2 = true;
        }
    }

    if(val >= 3 || val == 0){

        if(v3.value == ""){
            v3.style.borderColor = "red";
            flag3 = false;
        }else{
            v3.style.borderColor = "green";
            flag3 = true;
        }
    }

    if(val >= 4 || val == 0){
        if(v4.value == ""){
            v4.style.borderColor = "red";
            flag4 = false;
        }else{
            v4.style.borderColor = "green";
            flag4 = true;
        }
    }

    if(val >= 5 || val == 0){
        if(v5.value == ""){
            v5.style.borderColor = "red";
            flag5 = false;
        }else{
            v5.style.borderColor = "green";
            flag5 = true;
        }
    }

    if(val >= 6 || val == 0){
        if(v6.value == ""){
            v6.style.borderColor = "red";
            flag6 = false;
        }else{
            v6.style.borderColor = "green";
            flag6 = true;
        }
    }

    if(val >= 7 || val == 0){
        if(v7.value == ""){
            v7.style.borderColor = "red";
            flag7 = false;
        }else{
            v7.style.borderColor = "green";
            flag7 = true;
        }
    }

    if(val >= 8 || val == 0){
        if(v8.value == ""){
            v8.style.borderColor = "red";
            flag8 = false;
        }else{
            v8.style.borderColor = "green";
            flag8 = true;
        }
    }

    if(val >= 9 || val == 0){
        if(v9.value == ""){
            v9.style.borderColor = "red";
            flag9 = false;
        }else{
            v9.style.borderColor = "green";
            flag9 = true;
        }
    }
    
    flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8 && flag9;

    if(flag){
        document.getElementById("aceptar").disabled = false;
    }
    
    return flag;
}

function totalJS(val){
    console.log("hola");
}