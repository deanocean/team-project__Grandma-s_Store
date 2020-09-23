window.addEventListener('load', function(){
    storeLight = document.querySelectorAll('.store-light');
    var i = 1;
    setInterval(function(){
        if(storeLight[31].style.backgroundColor == 'rgb(255, 170, 0)'){
            storeLight[(i-1)%32].style.backgroundColor = 'rgb(255, 255, 255)';
            storeLight[(i-1)%32].style.boxShadow = '3px 3px 2px 2px rgba(0,0,0,.3)';
            i++;
        }else{
            storeLight[(i-1)%32].style.backgroundColor = 'rgb(255, 170, 0)';

            storeLight[(i-1)%32].style.boxShadow = '0px 0px 25px 12px rgba(255,170,0,0.4)';
            i++;
        }
        if(i == 33){
            i = 1;
        }
    },100);
});