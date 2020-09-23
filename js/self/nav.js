var storage = localStorage;
var cartCount = $('#cart-count'); //抓到nav購物車的小數字
var cartCircle = $("#cart-circle");
if (storage.getItem("addItemList")){
    var stArray = storage.getItem("addItemList").split(',');
    var starrylength = stArray.length-1; 
    //若購物車裡有商品，一開始就顯示商品數量
    if(starrylength >= 1){
        cartCircle.attr("style", "visibility:visible"); //小數字顯現        
        cartCount.text(starrylength);
    }
}


$(window).ready(function(){
    const count_itemsid= storage.getItem('count_itemsid');
    /*  客製化、商品資訊手風琴 */ 
    $('.cust').click(function(){
        $('.cust-p').slideToggle();
    });
    $('.product').click(function(){
        $('.product-p').slideToggle();
    });    
    $('.nav-burger').click(function(){
        $('#nav').toggleClass('open');
        $('.nav-list').toggleClass('openshow');          
    }); 
    /* Hover 效果 */
    $('.nav-list-font .hoverbg').on('mouseover', function(e){
        var height = e.target.clientHeight;
        var width = e.target.clientWidth;
        var left = $(this).offset().left;

        $('.bgcolor').css({'position':'absolute', 'left':left,'opacity':1});
        $('.bgcolor img').css({'opacity':1});
        });
        
        $('.nav-list-font .hoverbg').on('mouseout', function(){
            $('.bgcolor').css({'opacity':0});
    });    


});
