document.getElementById('verMais').addEventListener('click', function() {
    var sectionPost = document.querySelector('.boxPosts');
    var postEscondido = document.querySelector('.posts_grid_escondido');
    
    if (postEscondido.style.display === 'none' || postEscondido.style.display === '') {
        postEscondido.style.display = 'grid';
        
        sectionPost.style.height = 'auto';
    }
});
