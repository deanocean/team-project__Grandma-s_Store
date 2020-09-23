function createSlider3d() {
    
    var faq= document.querySelector('.faq');
    // faq.className='pagebg';
    faq.style.cssText=
    `color:#d53e23;
    background-image:url(img/member/nav-hover.png);
    background-size:110%;
    background-repeat:no-repeat;
    background-position:50%;
    `;
    var browser_w=document.body.clientWidth;
    if(browser_w <1200){
        faq.style.cssText=
        `color:#d53e23;
        background-image:none;
        `;
    }

	var _ = el => document.querySelector(el);
	var slider = _(".slider3d");
	var left = _(".slider3d_left");
	var right = _(".slider3d_right");
    var wrap = slider.children[0];
    // console.log(wrap)
    var all = wrap.children.length;
    // console.log(all)
    var gCS = window.getComputedStyle(slider);
    // console.log(gCS)
    var width = parseInt(gCS.width);
    // console.log(width)
    var myR = width / (2 * Math.tan(Math.PI / all));
    // console.log(Math.PI / all)
    // console.log( Math.tan(Math.PI / all))
    // console.log(myR)
    var step = 360 / all;
    // console.log(step)
	let angle = 0;

	for (let i = 0; i < all; i++) {
		var rad = i * step * Math.PI / 180;

            wrap.children[i].style.transform = `
                translate3d(${myR * Math.sin(rad)}px,
                0,${myR * Math.cos(rad)}px)
                rotateY(${i * step}deg)
                `;
        }

	function nav(d) {
		angle += step * d;
		wrap.style.transform = `
			translateZ(${-myR}px)
			rotateY(${angle}deg)`;
	}

	left.onclick = () => nav(1);
	right.onclick = () => nav(-1);
	nav(0);
}

// window.addEventListener("resize", createSlider3d);
window.addEventListener("load", createSlider3d);






