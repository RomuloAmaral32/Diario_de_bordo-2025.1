
// --------------------- BOTÃO "VER MAIS" -------------------------------------

/* A ideia aqui é que ao clicar no botão, os exemplos de posts escondidos vão aparecer e 
o section da visualização dos posts vai crescer para suportar a nova quantidade de posts.
Pensei em fazer dessa forma por enquanto já que ainda não estamos mexendo com banco de dados 
ainda.
*/
document.getElementById('verMais').addEventListener('click', function() {
    var sectionPost = document.querySelector('.boxPosts');
    var postEscondido = document.querySelector('.posts_grid_escondido');
    
    if (postEscondido.style.display === 'none' || postEscondido.style.display === '') {
        postEscondido.style.display = 'grid';
        
        sectionPost.style.height = 'auto';
    }
});

// -------------------------------------------------------------------------------

// --------------------------- CARROSSEL -----------------------------------------

const carrossel = document.querySelector(".carrossel");
const esquerda = document.getElementById("esquerda"); // botão seta esquerda
const direita = document.getElementById("direita");   // botão seta direita
const bolinhas = document.querySelectorAll(".bolinha");

const primeiraImagem = carrossel.querySelector(".imagem").offsetWidth;
let isDragging = false;

const tamanhoSlide = 3;
const totalImagens = carrossel.querySelectorAll(".imagem").length;
const totalPaginas = Math.ceil(totalImagens / tamanhoSlide);
let paginaAtual = 0;

function atualizarIndicadores() {
    bolinhas.forEach((bolinha, index) => {
        bolinha.classList.toggle("ativa", index === paginaAtual);
    });
}


esquerda.addEventListener("click", () => {
    if (paginaAtual > 0) {
        paginaAtual--;
        carrossel.scrollBy({
            left: -carrossel.offsetWidth,
            behavior: "smooth"
        });
        atualizarIndicadores();
    }
});

direita.addEventListener("click", () => {
    if (paginaAtual < totalPaginas - 1) {
        paginaAtual++;
        carrossel.scrollBy({
            left: carrossel.offsetWidth,
            behavior: "smooth"
        });
        atualizarIndicadores();
    }
});

bolinhas.forEach((bolinha, index) => {
    bolinha.addEventListener("click", () => {
        paginaAtual = index;
        carrossel.scrollTo({
            left: index * carrossel.offsetWidth,
            behavior: "smooth"
        });
        atualizarIndicadores();
    });
});
