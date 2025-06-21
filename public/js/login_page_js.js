function mostrarSenha(){
    var inputPass = document.getElementById('senha')
    // var btnShowPass =  document.getElementById('btn-senha')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        // btnShowPass.classList.replace('eye_icon',)
    }
}