const inputFile = document.querySelector('#imagem_post');
const pictureImage = document.querySelector('.img_post');
const pictureImageTxt = "Escolha uma imagem";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener('change', function(e){
    const inputTarget = e.target;
    console.log(inputTarget);
    const file = inputTarget.files[0];

    if(file){
        const reader = new FileReader();
        reader.addEventListener('load', function(e){
            const readerTarget = e.target;

            const img = document.createElement('img');
            img.src = readerTarget.result;
            img.classList.add('image_post');

            pictureImage.innerHTML = '';

            pictureImage.appendChild(img);
        });
        reader.readAsDataURL(file);
    } else {
        pictureImage.innerHTML = pictureImageTxt;
    }

    console.log(file)
});