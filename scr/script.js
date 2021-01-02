function changeState() {
    var tipoNavBar = document.getElementById("typeNav");
    var bt = document.getElementById("btn-ic");
    if (tipoNavBar.className === "nav-bar") {
        tipoNavBar.className += " responsive";
        bt.className = "fa fa-times";
    }else {
        tipoNavBar.className = "nav-bar";
        bt.className = "fa fa-bars";

    }
}

