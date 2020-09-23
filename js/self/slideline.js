function slideLine2(box, stf, delay, speed, h, h2)//多了第6個參數h2 是裡面各元素的高度
{
    var slideBox = document.getElementById(box);
    var speed = speed || 20, h = h || 20, h2 = h2 || 20;//h2也加個預設值
    var tid = null, pause = false;
    var s = function () { tid = setInterval(slide, speed); }
    var slide = function () {
        if (pause) return;

        slideBox.scrollTop += 1;
        if (slideBox.scrollTop % h == 0) {
            clearInterval(tid);

            for (var j = 0; j < h; j += h2) {//依據外面包住的div高度 跟裡面各元素的高度 判斷一次要移幾個到後面
                slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
            }

            slideBox.scrollTop = 0;
            setTimeout(s, 0);
        }
    }
    slideBox.onmouseover = function () { pause = true; }
    slideBox.onmouseout = function () { pause = false; }
    setTimeout(s, 1000);
}
slideLine2('ann_box3', 'div', 2000, 20, 1000, 250);