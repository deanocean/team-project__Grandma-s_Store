  // const Apo =document.getElementById('Apo');
$('#Apo').mouseover(function(){
    $('.apobox').css({
        // 'display':'block',
        // 'width':'350px',
        'opacity':'1',
        'right':'11%',
    });
    var data = ['唉唷，我都這麼老了，你還摸我!','啊看這麼久是要不要買?','少年欸，這裡有很多好康的東西喔','你有問題要問偶嗎?','要常來看阿婆喔!']
    var number = Math.floor((Math.random()*6));
    console.log(number)
    $('.apospeak').text(data[number]);
});
$('#Apo').mouseout(function(){
    $('.apobox').css({
        // 'display':'none',
        'opacity':'0',
        'right':'-50%',
        // 'width':'1px',
    });
});

const scrolled=$(window).scrollTop();
console.log(scrolled);
const Wheight=$(window).outerHeight();
console.log(Wheight);