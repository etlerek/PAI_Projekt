function show(id){
    const x = document.getElementById(id);
    if(x.style.display === "" || x.style.display === "none"){
        x.style.display = "flex";
    }
    else if(x.style.display === "flex"){
        x.style.display = "none";
    }
}
