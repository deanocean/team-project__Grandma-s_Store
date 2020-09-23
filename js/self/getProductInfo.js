var storage = localStorage;
if(storage['Finalprice'] == null){
    storage['Finalprice'] = '';
}
if(storage['Finalprice_save'] == null){
    storage['Finalprice_save'] = '';
}
if(storage['count_itemsid'] == null){
    storage['count_itemsid'] = '';
}
if(storage['count_itemsqty'] == null){
    storage['count_itemsqty'] = '';
}
if(storage['count_itemsprice'] == null){
    storage['count_itemsprice'] = '';
}

function doFirst(){
    var itemString = storage.getItem('addItemList');
    var items = itemString.substr(0,itemString.length-2).split(', ');
    var finalprice = document.querySelector('.finalprice');
    total = 0;  //商品加總金額
    finalprice.innerText = total;
	//每購買一個品項，就呼叫函數(createCartList)新增tr
	for(var key in items){		//use items[key]
        var itemInfo = storage.getItem(items[key]);
        createCartList(items[key],itemInfo);          

        //將最後總金額存回 storage  
        var itemPrice = parseInt(itemInfo.split('|')[1]); 
        total += itemPrice;
        finalprice.innerText = total;
        storage['Finalprice'] = total;
        storage['Finalprice_save'] = total;
    }
    

}

function createCartList(itemskey,itemInfo){
    var itemTitle = itemInfo.split('|')[0];           //商品名稱
	var itemPrice = parseInt(itemInfo.split('|')[1]); //商品價錢
	var itemImage = itemInfo.split('|')[2];           //商品圖片
    

    var cartbody = document.querySelector('.cartbody');
    cartbody.innerHTML += `
        <tr class="productdata" id=${itemskey}>
            <td data-title="貨圖" class="cartimg">                
                <img id="product" src="${itemImage}" alt=" ${itemImage}">
            </td>
            <td data-title="貨名" class="w-full">${itemTitle}</td>
            <td data-title="數量" class="w-half count_position">
                <ul class="count_product">
                    <li class="minus">-</li>
                    <li><input type="text" maxlength="2" maxnum="50" value="1" class="productqty"></li>
                    <li class="plus">+</li>
                </ul>
            </td>
            <td data-title="單價" class="w-half productprice">${itemPrice}元</td>
            <td data-title="金額" class="w-half producttotal">${itemPrice}元</td>
            <td data-title="修改" class="w-half productdel">
            <button class="btn btndel">刪除</button>
            </td>
        <tr>
        `;
}

document.querySelector('.tableMoney').addEventListener('click',function(e){
    var finalprice=document.querySelector('.finalprice').innerText;
    console.log(e.target)

    //選擇商品購買件數，並更新商品總價
    if(e.target.className == 'plus'){  //增加商品數量
        //數量增加
        var plus = e.target.previousElementSibling.firstChild;
        plus.value ++;
        //找出商品單價
        var itemstorage = e.target.parentNode.parentNode.parentNode.id;
        var itemInfo = storage.getItem(itemstorage);
        var itemPrice = parseInt(itemInfo.split('|')[1]); 
        
        //計算商品總價
        var producttotal = e.target.parentNode.parentNode.nextSibling.nextSibling.nextElementSibling;
        var productval = itemPrice * plus.value;
        producttotal.innerText = productval + '元'; 

        //加總最後總金額
        finalcount = parseInt(finalprice) + itemPrice;
        document.querySelector('.finalprice').innerText = finalcount;
        //將最後總金額存回 storage
        storage['Finalprice'] = finalcount;
        storage['Finalprice_save'] = finalcount;

        // var itemTitle = itemInfo.split('|')[0];
        // var count_items = itemTitle + '|' + plus.value + '|' + productval;
        // console.log(count_items)

        // addItem(itemstorage,count_items);
    }
    if(e.target.className == 'minus'){  //減少商品數量 
        if(e.target.nextElementSibling.firstChild.value > 1){
            var minus = e.target.nextElementSibling.firstChild;
            minus.value --;
            //找出商品單價
            var itemstorage = e.target.parentNode.parentNode.parentNode.id;
            var itemInfo = storage.getItem(itemstorage);
            var itemPrice = parseInt(itemInfo.split('|')[1]); 

            //計算商品總價
            var producttotal = e.target.parentNode.parentNode.nextSibling.nextSibling.nextElementSibling;           
            var productval = itemPrice * minus.value;
            producttotal.innerText = productval + '元'; 

            //加總最後總金額
            finalcount = parseInt(finalprice) - itemPrice;
            document.querySelector('.finalprice').innerText = finalcount;
            //將最後總金額存回 storage
            storage['Finalprice'] = finalcount;
            storage['Finalprice_save'] = finalcount;

            // var itemTitle = itemInfo.split('|')[0];
            // count_items = itemTitle + '|' + minus.value + '|' + productval;
            // console.log(count_items)
            
            // addItem(itemstorage,count_items);
        }
    }

    //刪除資料
    if(e.target.className == 'btn btndel'){

        //1.刪除整tr
        e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);

        //2.更新 FinalPrice
     
        var producttotal=e.target.parentNode.previousElementSibling.innerText;
        var pstring=producttotal.substring(0, producttotal.length-1);
        document.querySelector('.finalprice').innerText = finalprice - pstring;

        //將最後總金額存回 storage
        storage['Finalprice'] = finalprice - pstring;
        storage['Finalprice_save'] = finalprice - pstring;

        //3.清除storage的資料
        var itemId = e.target.parentNode.parentNode.id;
        storage.removeItem(itemId);
        storage['addItemList'] = storage['addItemList'].replace(itemId+', ','');      
    }
 
});


var nextbtn = document.querySelector('.nextbtn');
nextbtn.addEventListener('click',saveitemdata);

function saveitemdata(itemPrice){
    var result = loginCheck();
    var finalprice = document.querySelector('.finalprice');
    var form_login = document.getElementById('form_login');
    var greenbg = document.querySelector('.show_login_light_box_bg');

        if(result ==0){ 
            form_login.style.display = 'block';
            greenbg.style.display = 'block';
            // contentMsg.innerText = '尚未登入， 請先登入';
        }else{
            var contentMsg =document.querySelector('.contentMsg');
            if(finalprice.innerText == 0){
                contentMsg.innerHTML=`<a href="products-main.php?tab_btn=tab2" class="clickbtn">點擊選取商品</a>`;
                showLoginAlert(loginAlert);  

            }else{
                window.location.href='cart2.php';    
                var list = storage.getItem('addItemList');
                var listsplit = list.split(', ');
                listsplit.pop();    
                var arr =[];
                var arr2=[];
                var arr3=[];
                for(var i=0 ; i<listsplit.length ; i++){
                    var productqty = document.querySelector('#'+listsplit[i]+ ' .productqty').value; //商品數量 
                    arr[i]=productqty;
        
                    var itemInfo = storage.getItem(listsplit[i]);
                    var itemPrice = parseInt(itemInfo.split('|')[1]); 
                    arr2[i]=itemPrice;
        
                    var itemId = parseInt(itemInfo.split('|')[3]); 
                    arr3[i]=itemId;
                }            
                // console.log(listsplit) //商品編號        
                console.log(arr)       //商品數量
                console.log(arr2)      //商品單價
                console.log(arr3)      //商品編號
                storage['count_itemsid'] = arr3;
                storage['count_itemsqty'] = arr;
                storage['count_itemsprice'] = arr2;    
            }     
        }
        
        
    
    



   
}

window.addEventListener('load',doFirst);








