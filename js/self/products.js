var product = document.querySelector('.product');
product.style.cssText =
    `color:#d53e23;
    background-image:url(img/member/nav-hover.png);
    background-size:110%;
    background-repeat:no-repeat;
    background-position:50%;
    `;
    var browser_w = document.body.clientWidth;
    if (browser_w < 1200) {
        product.style.cssText =
            `color:#d53e23;
            background-image:none;
            `;
    }



//products.main 看更多
$("#toggle").click(function(){

    var elem = $("#toggle").text();

    if (elem == "看更多商品")
    {
        $("#toggle").text("看更少商品");
        $(".seemore").slideDown();
    }else
    {
        $("#toggle").text("看更多商品");
        $(".seemore").slideUp();
    }

});

// products-main 3D傾斜 plugin
$(document).ready(function(){

    function product_tilt(){
        const tilt = $('.js-tilt').tilt();
        $('.js-destroy').on('click', function () {
            const element = $(this).closest('.js-parent').find('.js-tilt');
            element.tilt.destroy.call(element);
        });
        $('.js-getvalue').on('click', function () {
            const element = $(this).closest('.js-parent').find('.js-tilt');
            const test = element.tilt.getValues.call(element);
            console.log(test[0]);
        });
        $('.js-reset').on('click', function () {
            const element = $(this).closest('.js-parent').find('.js-tilt');
            element.tilt.reset.call(element);
        });
        $('.js-tilt').tilt({
            glare: true,
            maxGlare: .5
        });
    };

});//end of document.ready

//products 加入收藏
$("#collection").click(function(){
    var collection = $("#collection");

    var contentMsg = document.getElementsByClassName('contentMsg')[0];//檢查會員登入
    if (loginCheck()==0) {//無登入
        contentMsg.innerText = '尚未登入， 請先登入';        
    }else{
        let collectionId = $("#collection").next().val();
        let xhr = new XMLHttpRequest();

        xhr.onload = function(){
            if( xhr.responseText.indexOf("1")== -1)
            {
                contentMsg.innerText = "已加入收藏";
                collection.text("已加入收藏");
            }else{
                contentMsg.innerText = "已加入收藏";
                collection.text("已加入收藏");
            };
        }
        xhr.open("get","php/addToFavorite.php?product_id=" + collectionId);
        xhr.send(null);
    }
    showLoginAlert(loginAlert);
});



//products 人氣值


$("#heart-emp").click(function(){
    var popularity = $("#popularity");
    var n = Number($('#popularity').text());
    $('#popularity').text(n);

    var contentMsg = document.getElementsByClassName('contentMsg')[0];//檢查會員登入
    if (loginCheck()==0) {//無登入
        contentMsg.innerText = '尚未登入， 請先登入';      
        showLoginAlert(loginAlert);  
    }else{
        let popularityId = $("#popularity").next().val();
        let xhr = new XMLHttpRequest();
        
        n +=1 ;
        $('#popularity').text(n);
        $('#heart-emp').css({'display':'none'});
        $('#heart-fil').css({'display':'inline-block'});
        console.log(n);

        xhr.open("get","php/popularity.php?score=" + n + "&product_id="+ popularityId);
        xhr.send(null);
    }
});
    //---------------------
    $("#heart-fil").click(function(){
        var popularity = $("#popularity");
        var n = Number($('#popularity').text());
        $('#popularity').text(n);
    
        var contentMsg = document.getElementsByClassName('contentMsg')[0];//檢查會員登入
        if (loginCheck()==0) {//無登入
            contentMsg.innerText = '尚未登入， 請先登入';
            showLoginAlert(loginAlert);        
        }else{
            let popularityId = $("#popularity").next().val();
            let xhr = new XMLHttpRequest();
            
            n -=1 ;
            $('#popularity').text(n);
            $('#heart-fil').css({'display':'none'});
            $('#heart-emp').css({'display':'inline-block'});
            console.log(n);
    
            
            xhr.open("get","php/popularity.php?score=" + n + "&product_id="+ popularityId);
            xhr.send(null);
        }
    //----------------------

});


