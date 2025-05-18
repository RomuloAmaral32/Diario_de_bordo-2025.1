const filtro = document.getElementById('filtro')

function abrirModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "none";
    filtro.style.display = "none";
}

function abrirModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "none";
    filtro.style.display = "none";
}