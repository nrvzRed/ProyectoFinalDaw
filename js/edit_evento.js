function file1(){
    f = document.getElementById("poster_ev");
    b = document.getElementById("aceptar");

    f.disabled = false;
    b.disabled = true;
}

function file2(){
    f = document.getElementById("poster_ev");
    b = document.getElementById("aceptar");

    f.disabled = true;
    b.disabled = false;
    console.log(f);
}

function file3(){
    f = document.getElementById("poster_ev");
   
    if(f.value == ""){
        f.value = "../imd/"
    }
}
   
