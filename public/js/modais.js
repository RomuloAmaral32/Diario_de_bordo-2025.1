const filtro = document.getElementById('filtro')
function mostrarFiltro() {
    const filtro = document.getElementById('filtro');
    filtro.style.display = 'block';
}

function fecharFiltro() {
    const filtro = document.getElementById('filtro');
    filtro.style.display = 'none';
}


//------------------ Modal View User ------------------------
function abrirModalViewUser(idmodal_view_user){
    document.getElementById(idmodal_view_user).style.display = "flex";
    mostrarFiltro();
}


function fecharModalViewUser(idmodal_view_user){
    document.getElementById(idmodal_view_user).style.display = "none";
    fecharFiltro();
}

//------------------------------------------------------------

//------------------ Modal Create User ------------------------
function abrirModalNewUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "flex";
    mostrarFiltro();
}


function fecharModalNewUser(idmodal_new_user){
    document.getElementById(idmodal_new_user).style.display = "none";
    fecharFiltro();
}


//------------------------------------------------------------
