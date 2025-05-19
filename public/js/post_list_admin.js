const filtro = document.getElementById('filtro')

//------------------ Modal View Post ------------------------
function abrirModalViewPost(idview_post){
    document.getElementById(idview_post).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalViewPost(idview_post){
    document.getElementById(idview_post).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Create New Post ------------------------

function abrirModalCreateUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalCreateUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Edit Post ------------------------

function abrirModalEditPost(idedit_post){
    document.getElementById(idedit_post).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalEditPost(idedit_post){
    document.getElementById(idedit_post).style.display = "none";
    filtro.style.display = "none";
}

//------------------------------------------------------------

//------------------ Modal Delete Post ------------------------

function abrirModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "flex";
    filtro.style.display = "block";
}

function fecharModalDeleteUser(idmodal_delete_box){
    document.getElementById(idmodal_delete_box).style.display = "none";
    filtro.style.display = "none";
}