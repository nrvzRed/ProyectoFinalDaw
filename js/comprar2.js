/*document.addEventListener("DOMContentLoaded", function(){

    var showBtn = document.getElementById("showBtn");
    var hideBtn = document.getElementById("hideBtn");
    
    // Create a collapse instance, toggles the collapse element on invocation
    var myCollapse = new bootstrap.Collapse(document.getElementById("myCollapse"));
  	var myCollapse2 = new bootstrap.Collapse(document.getElementById("myCollapse2"));
      
    
    
    // Show collapse element on button click
    showBtn.addEventListener("click", function(){
        myCollapse2.show();
      	myCollapse.hide();
        
    });
    
    // Hide collapse element on button click
    hideBtn.addEventListener("click", function(){
        myCollapse.show();
        myCollapse2.hide();
        
    });
});*/

function abr(x){
    var myCollapse = new bootstrap.Collapse(document.getElementById("myCollapse"));
  	var myCollapse2 = new bootstrap.Collapse(document.getElementById("myCollapse2"));
    console.log(x);
     if(x==1){
      $('.collapse').collapse()
        myCollapse.show();
        myCollapse2.hide(); 
     }else{
        myCollapse.hide();
        //myCollapse2.show(); 
     }
    
}

