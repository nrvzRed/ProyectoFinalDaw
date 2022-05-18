let siete = 0;
let ocho = 0;
let nueve = 0;
let n=0;   let n2=0;    let n3=0;
function validate(val){
    v1 = document.getElementById("nombre_us");
    v2 = document.getElementById("username");
    v3 = document.getElementById("bday");
    v4 = document.getElementById("email");
    v5 = document.getElementById("pwd");
    v6 = document.getElementById("pwd2");
    v7 = document.getElementById("phone");
    v8 = document.getElementById("card");
    v9 = document.getElementById("zip");
   
    
    flag1 = false;
    flag2 = false;
    flag3 = false;
    flag4 = false;
    
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
    
    if(val == 7 || val == 0){

        let st = v7.value.toString();
        let dgt = st.length;

        if(dgt > n){
            siete++;
                 
        }else{
            siete--;
        }
        n=dgt;
        if(siete==10){
            v7.style.borderColor = "green";
            flag7 = true;
   
        }else {
            v7.style.borderColor = "red";
            flag7 = false;  
        }
        
        
    }

    if(val == 8 || val == 0){
        let st = v8.value.toString();
        let dgt = st.length;

        if(dgt > n2){
            ocho++;
                 
        }else{
            ocho--;
        }
        n2=dgt;
        console.log(ocho)
        if(ocho==19){
            v8.style.borderColor = "green";
            flag8 = true;
   
        }else {
            v8.style.borderColor = "red";
            flag8 = false;  
        }
        
    }

    if(val >= 9 || val == 0){
        let st = v9.value.toString();
        let dgt = st.length;

        if(dgt > n3){
            nueve++;
                 
        }else{
            nueve--;
        }
        n3=dgt;
        console.log(nueve)
        if(nueve==5){
            v9.style.borderColor = "green";
            flag9 = true;
   
        }else {
            v9.style.borderColor = "red";
            flag9 = false;  
        }
    }
    
    flag = flag1 && flag2 && flag3 && flag4  && flag7 && flag8 && flag9;

    if(flag){
        document.getElementById("aceptar").disabled = false;
    }
    
    return flag;
}


function validar(){
    
    btn = document.getElementById("aceptar");
    

    v5 = document.getElementById("pwd1");
    v6 = document.getElementById("pwd2");

    pwd1 = v5.value;
    pwd2 = v6.value;

    if(pwd1!=pwd2){
        v5.style.borderColor = "red";
        v6.style.borderColor = "red";
        btn.disabled = true;
    }else{
        v5.style.borderColor = "green";
        v6.style.borderColor = "green";
        btn.disabled = false;
        
    }
}


function btn1(){
    flag = validate(0);
    if(flag){
        document.getElementById("aceptar").disabled = false;
    }else{
        document.getElementById("aceptar").disabled = true;
    }
    console.log(flag);
}
