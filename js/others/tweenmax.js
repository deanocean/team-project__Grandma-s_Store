TweenMax.to('.box1',1,{
    x:200,y:200
});

TweenMax.from('.box2',1,{
    x:200,y:200
});

TweenMax.fromTo('.box3',1,{
    x:200,
    y:200,
},{
    x:-200,
    ease: Bounce.easeOut
});

TweenMax.set('.box4',{
    x: -400,
    y: 20,
    background: 'orange'
});


function alerts(){
    alert('ok');
}

TweenMax.fromTo('.line',1.5,{
    width: 0
},{
    width: 400,
});


TweenMax.fromTo('p',1,{
    y: 150,
    opacity: 0,
},{
    y: 100,
    opacity: 1,
    delay: 1, 
});

TweenMax.fromTo('.circle',2,{
    x:-600,
    y:-600,
    scale: 1,
    opacity: 1
},{
    scale: 1.5,
    opacity: 0,
    repeat: -1
});

TweenMax.to('.inner',2,{
    x: 300,
    repeat: -1,
    yoyo: true,
    repeatDelay: 1,
});

TweenMax.to('.bar',1,{
    x: -700,
    y: -200,
    rotation: 360,
    transformOrigin: 'right top',
    repeat: -1
});

TweenMax.set('.bar',{
    x: -700,
    y: -200,
});

TweenMax.set('.box4',{
    className: "+=area",
    // className: 'area',
});

TweenMax.to('.box4',3,{
    bezier: {
        curviness: 1.25,
        values:[{
            x:0,
            y:0
        },{
            x:250,
            y:450
        },{
            x:450,
            y:50
        },{
            x:0,
            y:0
        }],
    },
    ease: Power1.easeOut,
    repeat: -1,
    yoyo: true,
});

TweenMax.staggerTo('.wrapper2 .box',.1,{
    x:100,
    repeat: -1,
    repeatDelay: .2,
    yoyo:true
},.1);

var tl = new TimelineMax({
});

tl.add(
    TweenMax.to('#wrapper3 .cube1',1,{
    x:100,
}));

tl.add(TweenMax.to('#wrapper3 .cube2',1,{
    x:100,
    y:100,
    opacity: 0
}));

var tls = new TimelineMax({
    repeat: -1,
    yoyo: true,
});

tls.fromTo('#wrapper3 .cube3',3,{
    x:300,
},{
    x:400,
    rotation: 360,
}).fromTo('#wrapper3 .cube4', 1,{
    x: 600,
}, {
    x: 800,
    rotation: 720,
    delay: -2,
})

document.getElementById('btn_scroll').onclick = function(){
    TweenMax.to(window, 1, {
        scrollTo: {
            y: "#archor",
            offsetY: 300
        }
    })
};

// TweenMax.to('#textbox', 6,{
//     text: "品牌通常會根據電腦的用途或特色來命名，大多都是用英數混合的標示，雖然好像很明確分類了，但還是很多人搞不清楚 GX、GS或GL這些系列名稱到底是什麼意思？(＊順帶一提ASUS沒有Air喔～)",
//     ease: Linear.easeNone
// });

var tis = new TimelineMax({
    repeat: -1,
    repeatDelay: 2
});

tis.to('#textbox', 1,{
    text: "哈哈哈哈哈哈哈哈",
    ease: Linear.easeNone,
    delay: 2
}).to('#textbox', 1,{
    text: "蛋餅豪好ㄘ",
    ease: Linear.easeNone,
    delay: 2
});



// var textsplit = new SplitText('#textbox2', {
//     type: "words , chars"
// });
// //words 文字
// // chars 字母
// TweenMax.staggerFrom(textsplit.words, 1, {
//     opacity: 0,
//     scale: 0,
//     y: 10,
//     rotationX: 180,
//     // transformOrigin: "0% 50% -50",
//     ease: Back.easeOut
// }, 0.1);


var textsplit = new SplitText('#textbox2',{
    type: "words, chars"
});

TweenMax.staggerFrom(textsplit.chars, 1 ,{
    opacity: 0,
    scale: 0,
    y: 100,
    rotation: 360,
    transformOrigin: "100% 50% 50",
    ease: Back.easeOut
}, 0.1);

function parallax(){
    var scene = document.getElementById('parallax_box');
    var parallax = new Parallax(scene); 
}

parallax();


//scrollmagic
//初始化場景
var controller = new ScrollMagic.Controller();

var animation = TweenMax.to('.scrollMagic01 .magic', 1, {
    x:200,
    y:300,
    borderRadius: "50%",
    backgroundColor: "orange",
});

var scale = TweenMax.to('.scrollMagic03 div',1.5,{
    scale: 1.25,
});

//觸發事件
var scrollMagic01 = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '50%',
    offset: 100,
    // reverse: false,
    triggerHook: 0.2,
}).setTween(animation).addIndicators({
    name: "Section01"
}).addTo(controller);





var scrollMagic02 = new ScrollMagic.Scene({
    triggerElement: '#trigger_02',
    // duration: 100,
    triggerHook: 0.5,
}).setClassToggle('.toggleclass', 'on').addIndicators({
    name: 'section02'
}).addTo(controller);




var scrollMagic03 = new ScrollMagic.Scene({
    triggerElement: '#trigger_03',
    // offset: 300,
    // duration: 100,
    triggerHook: 0.3,
}).setClassToggle('.scrollMagic03 div','on').setTween(scale).addIndicators({
    name: 'section03'
}).addTo(controller);


//把畫面pin住
var tlts = new TimelineMax();

tlts.add(TweenMax.to('.magic1',1,{
    x: 200
}));

tlts.add(TweenMax.to('.magic2',1,{
    x: 400
}));

tlts.add(TweenMax.to('.magic3',1,{
    x: 600
}));

var scrollMagic04 = new ScrollMagic.Scene({
    triggerElement: '#trigger_04',
    duration: '300%',
    triggerHook: 0
})
.setPin('.scrollMagic04')
.setTween(tlts)
.addIndicators({
    name: 'stickview'
})
.addTo(controller);