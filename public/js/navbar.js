document.addEventListener('DOMContentLoaded', () =>{
    const logo = document.querySelector('.logo');
    let clickCount = 0;

    logo.addEventListener('click', () => {
        clickCount++;
        if(clickCount === 7){
            window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ', '_blank');
            clickCount = 0;
        }
    });
});