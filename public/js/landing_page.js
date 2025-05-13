//------------------------- Botão "Ver Mais" -----------------------
/* A ideia aqui é que ao clicar no botão, os exemplos de posts escondidos vão aparecer e 
o section da visualização dos posts vai crescer para suportar a nova quantidade de posts.
Pensei em fazer dessa forma por enquanto já que ainda não estamos mexendo com banco de dados 
ainda.
*/

document.getElementById('verMais').addEventListener('click', function () {
  const sectionPost = document.querySelector('.boxPosts');
  const postEscondido = document.querySelector('.posts_grid_escondido');

  if (postEscondido.style.display === 'none' || postEscondido.style.display === '') {
      postEscondido.style.display = 'grid';
      sectionPost.style.height = 'auto';
      this.textContent = "Ver menos";
  } else {
      postEscondido.style.display = 'none';
      this.textContent = "Ver mais";
  }
});

//-----------------------------------------------------------------------

//-----------------------------Carrossel---------------------------------
/*Para passar para as próximas imagens, o usuário deve ou clicar nas setas ou clicar em uma
das bolinhas logo abaixo do carrossel. Tentei implementar a função de arrastar com o mouse,
mas estava dando diversos problemas
*/

const carrossel = document.querySelector('.carrossel');
const imagens = document.querySelectorAll('.carrossel .imagem');
const indicadoresContainer = document.querySelector('.indicadores');
const setaEsquerda = document.querySelector('.setaEsquerda');
const setaDireita = document.querySelector('.setaDireita');

let imagensPorPagina = 3;
let totalPaginas = 0;
let paginaAtual = 0;

function atualizarConfiguracaoCarrossel() {
  const larguraCarrossel = carrossel.offsetWidth;
  const larguraImagem = imagens[0].getBoundingClientRect().width;

  
  if (!larguraImagem || isNaN(larguraImagem) || larguraImagem <= 0) return;


  imagensPorPagina = Math.max(1, Math.floor(larguraCarrossel / larguraImagem));

  
  totalPaginas = Math.ceil(imagens.length / imagensPorPagina);

  criarIndicadores();
  atualizarIndicadores();
}

function criarIndicadores() {
  indicadoresContainer.innerHTML = '';
  for (let i = 0; i < totalPaginas; i++) {
    const bolinha = document.createElement('div');
    bolinha.classList.add('bolinha');
    if (i === 0) bolinha.classList.add('ativa');
    bolinha.addEventListener('click', () => {
      paginaAtual = i;
      carrossel.scrollLeft = carrossel.offsetWidth * i;
      atualizarIndicadores();
    });
    indicadoresContainer.appendChild(bolinha);
  }
}

function atualizarIndicadores() {
  const bolinhas = document.querySelectorAll('.bolinha');
  bolinhas.forEach((b, i) => {
    if (i === paginaAtual) {
      b.classList.add('ativa');
    } else {
      b.classList.remove('ativa');
    }
  });
}

function moverParaEsquerda() {
  paginaAtual--;
  if (paginaAtual < 0) {
    paginaAtual = totalPaginas - 1;
  }
  const novaPosicao = Math.min(paginaAtual * carrossel.offsetWidth, carrossel.scrollWidth - carrossel.offsetWidth);
  carrossel.scrollTo({ left: novaPosicao, behavior: 'smooth' });
  atualizarIndicadores();
}

function moverParaDireita() {
  paginaAtual++;
  if (paginaAtual >= totalPaginas) {
    paginaAtual = 0;
  }
  const novaPosicao = Math.min(paginaAtual * carrossel.offsetWidth, carrossel.scrollWidth - carrossel.offsetWidth);
  carrossel.scrollTo({ left: novaPosicao, behavior: 'smooth' });
  atualizarIndicadores();
}

setaEsquerda.addEventListener('click', moverParaEsquerda);
setaDireita.addEventListener('click', moverParaDireita);

window.addEventListener('resize', atualizarConfiguracaoCarrossel);
window.addEventListener('load', atualizarConfiguracaoCarrossel);


//-----------------------------------------------------------------