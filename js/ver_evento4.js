function total(precio){
    totalP = document.getElementById("total");
    nb = document.getElementById("nb");
    n = parseInt(nb.value);
    console.log(n);
    if(n<11 && n>0){
        x = n*precio;
       
    }else if(n == NaN){
        x='No válido';
    } else{
        x='No válido';
    }
    totalP.innerHTML=x;

}

function total2(precio){
    totalP = document.getElementById("total2");
    nb = document.getElementById("nb");
    n = parseInt(nb.value);
    console.log(n);
    if(n<11 && n>0){
        x = n*precio;
       
    }else if(n == NaN){
        x='No válido';
    } else{
        x='No válido';
    }
    totalP.innerHTML=x;

}