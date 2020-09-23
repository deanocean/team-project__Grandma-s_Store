function addtocartDofirst(){
    var loginAlert = document.getElementById("loginAlert");
    var contentMsg = document.getElementsByClassName("contentMsg")[0];


    var storage = localStorage;
    var cartCount = $('#cart-count'); //抓到nav購物車的小數字

    var storageItemList = storage.getItem("addItemList");


    //loading時就先判斷購物車是否有東西
    if (storage.getItem("addItemList")) { //如果addItemList裡面有東西
        var stArray = storageItemList.split(',');
        var starrylength = stArray.length - 1; //扣掉陣列最後一個空字串
        //若購物車裡有商品，一開始就顯示商品數量
        if (starrylength >= 1) {
            cartCount.attr("style", "visibility:visible"); //小數字顯現       
            cartCount.text(starrylength);
        }
    }

    if(storage['addItemList'] == null){
		storage['addItemList'] = '';
    }


    var addtocart = document.querySelectorAll('.addtocart');
    for(var i=0 ; i<addtocart.length ; i++){
        addtocart[i].addEventListener('click', function(e){
            // console.log(this.firstElementChild.nextElementSibling);
            console.log(111);
            var productinfo = this.firstElementChild.nextElementSibling.value; //從資料庫拿出來的商品資訊
            addItem(this.id,productinfo);        
        });
    }    
}

function addItem(itemId,itemValue){ //加到localstorage裡面
    var storage = localStorage;
    var contentMsg = document.getElementsByClassName("contentMsg")[0];
    var cartCount = $('#cart-count'); //抓到nav購物車的小數字
    var cartCircle = $("#cart-circle");
    var storageItemList = storage.getItem("addItemList");

    //loading時就先判斷購物車是否有東西
    if (storage.getItem("addItemList")) { //如果addItemList裡面有東西
        var stArray = storageItemList.split(',');
        var starrylength = stArray.length - 1; //扣掉陣列最後一個空字串
        //若購物車裡有商品，一開始就顯示商品數量
        if (starrylength >= 1) {
            cartCircle.attr("style", "visibility:visible"); //小數字顯現       
            cartCount.text(starrylength);
        }
    }

    if(storage[itemId]){
        contentMsg.innerText = "商品已在購物車當中";
        showLoginAlert(loginAlert);
    }else{
        storage[itemId] = itemValue;
        storage['addItemList'] += itemId + ', ';  

        //nav的購物車圖示
        if (starrylength == undefined) {
            starrylength = 0;
        }
        cartCircle.attr("style", "visibility:visible"); //小數字顯現        
        var actual = starrylength + 1;
        cartCircle.addClass('bounceIn');
        cartCount.text(actual);

        // var timer = 
        setTimeout(function () {
            cartCircle.removeClass("bounceIn");
            // clearTimeout(timer);
        }, 800) 
    }
}
window.addEventListener('load',addtocartDofirst);

