

function showPinPlus(){
    const x = document.getElementById("addPinForm");
    console.log(x.style.display);
    if(x.style.display === "" || x.style.display === "none"){
        x.style.display = "flex";
    }
    else if(x.style.display === "flex"){
        x.style.display = "none";
    }
}