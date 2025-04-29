document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const menuButton = document.getElementById('menu');
    const items = document.querySelectorAll('.item');
    
    menuButton.addEventListener('click', () => {
        sidebar.classList.toggle('fechada');

        const menuIcon = menuButton.querySelector('img');
        if (sidebar.classList.contains('fechada')) {
            menuIcon.src = '/public/assets/sidebar/MenuIcon.png';
        } else {
            menuIcon.src = '/public/assets/sidebar/FecharIcon.png';
        }
    });

    items.forEach(item => {
        item.addEventListener('click', () => {
            items.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });
});

