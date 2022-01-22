

function showPinPlus(){
    const x = document.getElementById("addPinForm");
    console.log(x.style.display);
    if(x.style.display === ""){
        x.style.display = "unset";
    }
    else if(x.style.display === "unset"){
        x.style.display = "";
    }
}