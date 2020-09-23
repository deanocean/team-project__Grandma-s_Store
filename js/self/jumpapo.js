const clickbox = document.querySelectorAll('.connent');
    //const clickbox2=document.querySelector('#a1_2');
for (let i = 0; i < clickbox.length; i++) {
    clickbox[i].addEventListener('click', jump);
    //clickbox2.addEventListener('click',jump);

    function jump() {
        clickbox[i].removeEventListener('click', jump);
        const jumpapo = document.querySelector('.jumpapo');
        const frontcoin =document.querySelector('.frontcoin');
        jumpapo.style.animation = ' jump .5s linear';

        for(let i=1 ; i<=1 ; i++){
            const number = Math.floor((Math.random()*12)+1);
            console.log(number)
            frontcoin.src=`img/section2/brickimg/${number}.png`;
        }

        frontcoin.style.animation = ' movecoin 1s .3s cubic-bezier(0.55, 0.055, 0.675, 0.19)';

        myPerTimerId = setTimeout(function () {
            jumpapo.style.animation = "";
            frontcoin.style.animation = "";
            clickbox[i].addEventListener('click', jump);
        }, 1500);
    }
}