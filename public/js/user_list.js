const filtro = document.getElementById('filtro')

function abrirModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "none";
    filtro.style.display = "none";
}