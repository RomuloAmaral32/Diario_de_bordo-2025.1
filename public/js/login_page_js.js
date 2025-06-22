function mostrarSenha(){
    var inputPass = document.getElementById('senha')
    var btnShowPass =  document.getElementById('btn_senha')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        btnShowPass.classList.replace('bi-eye-slash','bi-eye')
    } else {
        inputPass.setAttribute('type', 'password')
        btnShowPass.classList.replace('bi-eye','bi-eye-slash')
    }
}