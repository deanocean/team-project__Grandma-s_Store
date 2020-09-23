var store = document.querySelector('.store');
// faq.className='pagebg';
store.style.cssText =
    `color:#d53e23;
    background-image:url(img/member/nav-hover.png);
    background-size:110%;
    background-repeat:no-repeat;
    background-position:50%;
    `;
var browser_w = document.body.clientWidth;
if (browser_w < 1200) {
    store.style.cssText =
        `color:#d53e23;
        background-image:none;
        `;
}


if($(window).width()>768){
$(function () {
    TweenMax.to('#apo', 0.5, {
        x: 100,
        y: 200
    });


    var path = {
        bezier1: {
            curviness: 1,
            timeResolution: 6,
            // autoRotate:360,
            values: [
                { x: 200, y: 200 },
                { x: 300, y: 200 },
                { x: 400, y: 200 },
                { x: 500, y: 200 },
                { x: 700, y: 300 },
                { x: 800, y: 400 },
                { x: 900, y: 500 },
                { x: 900, y: 600 },
                { x: 900, y: 700 }    //逢甲店鋪
            ]
        },
        bezier2: {
            curviness: 1,
            timeResolution: 6,
            // autoRotate:360,
            values: [
                { x: 900, y: 800 },
                { x: 800, y: 900 },
                { x: 700, y: 1000 },
                { x: 600, y: 1000 },
                { x: 500, y: 1100 },
                { x: 400, y: 1150},
                { x: 300, y: 1200},
                { x: 200, y: 1300},
                { x: 100, y: 1400},
                { x: 150, y: 1500}  //北港店鋪
            ]
        },
        bezier3: {
            curviness: 1,
            timeResolution: 6,
            // autoRotate:360,
            values: [
                { x: 150, y: 1600 },
                { x: 200, y: 1700},
                { x: 250, y: 1800},
                { x: 350, y: 1900},
                { x: 500, y: 2000},
                { x: 600, y: 2000 },
                { x: 700, y: 2100 },
                { x: 800, y: 2200},
                { x: 900, y: 2300 },
                { x: 900, y: 2400},
                { x: 900, y: 2500}, //路港店鋪
            ]
        },
        bezier4: {
            curviness: 1,
            timeResolution: 6,
            // autoRotate:360,
            values: [
                { x: 800, y: 2600 },
                { x: 700, y: 2700},
                { x: 600, y: 2800},
                { x: 500, y: 2900},
                { x: 400, y: 2900},
                { x: 300, y: 3000},
                { x: 200, y: 3100},
                { x: 100, y: 3200},
                { x: 150, y: 3300}, //新港店鋪
            ]
        },
        bezier5: {
            curviness: 1,
            timeResolution: 6,
            // autoRotate:360,
            values: [
                { x: 200, y: 3400 },
                { x: 250, y: 3500 },
                { x: 300, y: 3600 },
                { x: 400, y: 3700 },
                { x: 500, y: 3800 },
                { x: 600, y: 3850 },
                { x: 700, y: 3900 },
                { x: 800, y: 4000 },
                { x: 900, y: 4100 },
                { x: 900, y: 4200 },
                { x: 900, y: 4300 },
                { x: 900, y: 4400 },
                { x: 900, y: 4500 },  //中壢店鋪
            ]
        },

    };

    //scrollmagic
    //初始化場景
    var controller = new ScrollMagic.Controller();

    //阿婆觸發事件
    var animation = new TimelineMax()
        .add(TweenMax.to($("#apo"), 1, { css: { bezier: path.bezier1 }, ease: Power0.easeNone }))
        .add(TweenMax.to($("#apo"),0.5,{rotationY: 180}))
        .add(TweenMax.to($("#apo"), 1.8, { css: { bezier: path.bezier2 }, ease: Power0.easeNone }))
        .add(TweenMax.to($("#apo"),0.3,{rotationY: 0}))
        .add(TweenMax.to($("#apo"), 1.8, { css: { bezier: path.bezier3 }, ease: Power0.easeNone }))
        .add(TweenMax.to($("#apo"),0.3,{rotationY: 180}))
        .add(TweenMax.to($("#apo"), 1.8, { css: { bezier: path.bezier4 }, ease: Power0.easeNone }))
        .add(TweenMax.to($("#apo"),0.3,{rotationY: 0}))
        .add(TweenMax.to($("#apo"),1.5, { css: { bezier: path.bezier5 }, ease: Power0.easeNone }))
        TweenMax.to(".wheel",1,{
            repeat:-1,
            rotation:360,
            ease:Power0.easeNone
        });

    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger",
        duration: 3900,
        offset: 320,
        reverse: true
    }).setTween(animation).addTo(controller);

    //烏鴉觸發事件
    var tween = TweenMax.fromTo('.item2', 10, {
            x: 0,
            y:-200
        }, {
            x: -2000,
            y:-800
        });

    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger2",
        // duration:500,   //取消時自動播放
        repeat: -1,
        reverse: false,
        offset: 1400,
    }).setTween(tween).addTo(controller);

    //店鋪一資訊觸發事件
    var information = TweenMax.fromTo('.box1',2,{
        x:-350,
    },{
        x:0,
    });

    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger3",
        reverse:false,
        offset:300,
    }).setTween(information).addTo(controller);

    //店鋪二資訊觸發事件
    var information = TweenMax.fromTo('.box2',2,{
        x:550,
    },{
        x:0,
    });
    
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger4",
        reverse:false,
        offset:1200,
    }).setTween(information).addTo(controller);

    //店鋪三資訊觸發事件
    var information = TweenMax.fromTo('.box3',2,{
        x:-350,
    },{
        x:0,
    });
    
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger5",
        reverse:false,
        offset:2000,
    }).setTween(information).addTo(controller);

    //店鋪四資訊觸發事件
    var information = TweenMax.fromTo('.box4',2,{
        x:550,
    },{
        x:0,
    });
    
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger6",
        reverse:false,
        offset:3000,
    }).setTween(information).addTo(controller);

    //店鋪五資訊觸發事件
    var information = TweenMax.fromTo('.box5',2,{
        x:-350,
    },{
        x:0,
    });
    
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger7",
        reverse:false,
        offset:3600,
    }).setTween(information).addTo(controller);    

})
// }else{

//     // //店鋪一資訊觸發事件
//     // var information = TweenMax.fromTo('.box1',3,{
//     //     x:-300,
//     // })
//     // //店鋪二資訊觸發事件
//     // var information = TweenMax.To('.box2',3,{
//     //     x:600,
//     // })
}  //大於768px有做動畫

    // 吊牌特效
    var tag = TweenMax.fromTo('.tag', 1, 
    {rotation:10, transformOrigin:"50% top"},
    {rotation:-10, transformOrigin:"50% top",repeat:-1,yoyo:true});

    
//小狗觸發事件
element = document.getElementById("dog");

element.addEventListener("mouseover", function () {
    element.classList.remove("bounce");
    element.offsetWidth = element.offsetWidth;
    element.classList.add("bounce");
}, false);


var j = 0;
var text = "汪.汪..";
function textWord(){
   
    if(j < text.length){
        document.getElementById('word').innerHTML += text.charAt(j);
        j++;
        setTimeout(textWord,200);
    }
}


var lightBox = document.getElementById('lightBox');
// var item = document.getElementById('item');
var btn = document.getElementById('btn');

// btn.onclick = function(){
//     lightBox.style.display="block";
// }

// var close = document.getElementById('close');

// close.onclick = function(){
//     lightBox.style.display="none";
// }
// 店鋪一錨點
document.getElementById('archor1').onclick = function(){
    TweenMax.to(window, 3, {
        scrollTo: {
            y: "#store1",
            offsetY: 50,
        }
    })
}
// 店鋪二錨點
document.getElementById('archor2').onclick = function(){
    TweenMax.to(window, 3, {
        scrollTo: {
            y: "#store2",
            offsetY: 50,
        }
    })
}
// 店鋪三錨點
document.getElementById('archor3').onclick = function(){
    TweenMax.to(window, 3, {
        scrollTo: {
            y: "#store3",
            offsetY: 30,
        }
    })
}
// 店鋪四錨點
document.getElementById('archor4').onclick = function(){
    TweenMax.to(window, 3, {
        scrollTo: {
            y: "#store4",
            offsetY: 50,
        }
    })
}
// 店鋪五錨點
document.getElementById('archor5').onclick = function(){
    TweenMax.to(window, 3, {
        scrollTo: {
            y: "#store5",
            offsetY: 50,
        }
    })
}


//點擊毛點換字或變色

    var archor = document.getElementById('archor');
    var archors = archor.getElementsByClassName('archor');
    for(var i = 0;i < archors.length;i++){
        archors[i].addEventListener("click",function(){
            var actives = document.getElementsByClassName("active");
            actives[0].className = actives[0].className.replace(" active","");
            this.className += " active";
        });
    }




// 店鋪一簡介
if($(window).width()>768){

var btn = document.getElementById('btn');
var lightBox = document.getElementById('lightBox');
var close = document.getElementById('close');
var lightBoxFull = document.getElementById('lightBoxFull');

btn.onclick = function(){
    lightBox.style.width="500px";
    lightBox.style.border="10px #002552 solid";
    lightBoxFull.style.display="block";
} 
close.onclick = function(){
    lightBox.style.width="0";
    lightBox.style.border="0px solid black";
    lightBoxFull.style.display="none";
}
// 店鋪二簡介
var btn2 = document.getElementById('btn2');
var lightBox2 = document.getElementById('lightBox2');
var close2 = document.getElementById('close2');

btn2.onclick = function(){
    lightBox2.style.width="500px";
    lightBox2.style.border="10px #002552 solid";
    lightBoxFull.style.display="block";
} 
close2.onclick = function(){
    lightBox2.style.width="0";
    lightBox2.style.border="0px solid black";
    lightBoxFull.style.display="none";
}
// 店鋪三簡介
var btn3 = document.getElementById('btn3');
var lightBox3 = document.getElementById('lightBox3');
var close3 = document.getElementById('close3');

btn3.onclick = function(){
    lightBox3.style.width="500px";
    lightBox3.style.border="10px #002552 solid";
    lightBoxFull.style.display="block";
} 
close3.onclick = function(){
    lightBox3.style.width="0";
    lightBox3.style.border="0px solid black";
    lightBoxFull.style.display="none";
}
// 店鋪四簡介
var btn4 = document.getElementById('btn4');
var lightBox4 = document.getElementById('lightBox4');
var close4 = document.getElementById('close4');

btn4.onclick = function(){
    lightBox4.style.width="500px";
    lightBox4.style.border="10px #002552 solid";
    lightBoxFull.style.display="block";
} 
close4.onclick = function(){
    lightBox4.style.width="0";
    lightBox4.style.border="0px solid black";
    lightBoxFull.style.display="none";
}
// 店鋪伍簡介
var btn5 = document.getElementById('btn5');
var lightBox5 = document.getElementById('lightBox5');
var close5 = document.getElementById('close5');

btn5.onclick = function(){
    lightBox5.style.width="500px";
    lightBox5.style.border="10px #002552 solid";
    lightBoxFull.style.display="block";
} 
close5.onclick = function(){
    lightBox5.style.width="0";
    lightBox5.style.border="0px solid black";
    lightBoxFull.style.display="none";
}
}else{
    var btn = document.getElementById('btn');
    var lightBox = document.getElementById('lightBox');
    var close = document.getElementById('close');
    var lightBoxFull = document.getElementById('lightBoxFull');
    
    btn.onclick = function(){
        lightBox.style.width="90%";
        lightBox.style.border="10px #002552 solid";
        lightBoxFull.style.display="block";
    } 
    close.onclick = function(){
        lightBox.style.width="0";
        lightBox.style.border="0px solid black";
        lightBoxFull.style.display="none";
    }
    // 店鋪二簡介
    var btn2 = document.getElementById('btn2');
    var lightBox2 = document.getElementById('lightBox2');
    var close2 = document.getElementById('close2');
    
    btn2.onclick = function(){
        lightBox2.style.width="90%";
        lightBox2.style.border="10px #002552 solid";
        lightBoxFull.style.display="block";
    } 
    close2.onclick = function(){
        lightBox2.style.width="0";
        lightBox2.style.border="0px solid black";
        lightBoxFull.style.display="none";
    }
    // 店鋪三簡介
    var btn3 = document.getElementById('btn3');
    var lightBox3 = document.getElementById('lightBox3');
    var close3 = document.getElementById('close3');
    
    btn3.onclick = function(){
        lightBox3.style.width="90%";
        lightBox3.style.border="10px #002552 solid";
        lightBoxFull.style.display="block";
    } 
    close3.onclick = function(){
        lightBox3.style.width="0";
        lightBox3.style.border="0px solid black";
        lightBoxFull.style.display="none";
    }
    // 店鋪四簡介
    var btn4 = document.getElementById('btn4');
    var lightBox4 = document.getElementById('lightBox4');
    var close4 = document.getElementById('close4');
    
    btn4.onclick = function(){
        lightBox4.style.width="90%";
        lightBox4.style.border="10px #002552 solid";
        lightBoxFull.style.display="block";
    } 
    close4.onclick = function(){
        lightBox4.style.width="0";
        lightBox4.style.border="0px solid black";
        lightBoxFull.style.display="none";
    }
    // 店鋪伍簡介
    var btn5 = document.getElementById('btn5');
    var lightBox5 = document.getElementById('lightBox5');
    var close5 = document.getElementById('close5');
    
    btn5.onclick = function(){
        lightBox5.style.width="90%";
        lightBox5.style.border="10px #002552 solid";
        lightBoxFull.style.display="block";
    } 
    close5.onclick = function(){
        lightBox5.style.width="0";
        lightBox5.style.border="0px solid black";
        lightBoxFull.style.display="none";
    } 
}


//點擊毛點換字或變色

// for(var i = 0;i < archors.length;i++){
//     var archor = document.getElemnetById('archor');
//     var archors = archor.getElemnetsByClassName('archor');
//     archors[i].addEventListener("click",function(){
//         var actives = document.getElementsByClassName("active");
//         actives[0].classNmae = actives[0].className.replace(" active","");
//         this.className += " active";
//     });
// }








