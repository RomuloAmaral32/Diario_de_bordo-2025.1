const filtro = document.getElementById('filtro')

//------------------ Modal View User ------------------------
function abrirModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalViewUser(idview_user){
    document.getElementById(idview_user).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Create New User ------------------------

function abrirModalCreateUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalCreateUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Edit User ------------------------

function abrirModalEditUser(idmodal_edit_user){
    document.getElementById(idmodal_edit_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalEditUser(idmodal_edit_user){
    document.getElementById(idmodal_edit_user).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Delete User ------------------------

function abrirModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "none";
    filtro.style.display = "none";
}