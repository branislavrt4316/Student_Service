let loginStat = false;
function prikazi(){
    let izlaz = document.getElementById("promena");
    
    if(loginStat == false){
        izlaz.setAttribute("type", "text");
        loginStat = true;
        alert("jej");

    }else(loginStat == true){
        izlaz.setAttribute("type", "password");
        loginStat = false;
        alert("jgbbgbg");
    }
    
}