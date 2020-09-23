var storage = localStorage;
if(storage['customerinfo'] == null){
    storage['customerinfo'] = '';
}
if(storage['Finalprice'] == null){
    storage['Finalprice'] = '';
}

function doFirst(){
    var pricesave = storage.getItem('Finalprice_save');
    console.log(pricesave)
    var finalprice =document.querySelector('.finalprice');
    //抓取商品總金額
    storage['Finalprice'] = pricesave;
    finalprice.innerHTML = pricesave; 
    //回填資料
    var customerinfo = storage.getItem('customerinfo');

    if(customerinfo !=''){
        var pay = customerinfo.split('|')[0];           //付款方式
        var name = customerinfo.split('|')[1];          //客戶姓名
        var phone = customerinfo.split('|')[2];           //客戶電話
        var address = customerinfo.split('|')[3];           //客戶地址
        
        var cname  = document.querySelector('#c-name');
        var cphone  = document.querySelector('#c-phone');
        var caddress  = document.querySelector('#c-address');
        var finalprice  = document.querySelector('.finalprice');
        
        cname.value = '';
        cphone.value = '';
        caddress.value = '';
        finalprice.value = '';
        
        // 如再確認購買頁面按回上一步時，回填資料
        var selectoption=document.querySelector(`.select input[value=${pay}]`);
        selectoption.checked=true;
        cname.value = name;             
        cphone.value = phone;          
        caddress.value = address;       
        finalprice.innerHTML = pricesave;   
    
    }
    var myTest=document.getElementById("myTest");
    myTest.addEventListener('click',function(){
        var finalprice  = document.querySelector('.finalprice');
        finalprice.innerHTML = pricesave;

        if(pricesave <500){
            // alert('價位小於500無法使用');
            var contentMsg =document.querySelector('.contentMsg');
            contentMsg.innerHTML=`價位低於500元<br>無法使用。`;
            showLoginAlert(loginAlert); 

            var contentMsg= document.querySelector('.contentMsg');
            contentMsg.style.cssText =
                `line-height:1.5;
                display:flex;
                justify-content:center;
                align-items:center`;
        }else{
            var sampleValue = document.getElementById("coupon").value;
            finalprice.innerHTML = pricesave - sampleValue;
            storage['Finalprice'] =pricesave - sampleValue;
        }
    });

        var nextbtn = document.querySelector('.nextbtn');
        nextbtn.addEventListener('click',showdata);
}


function showdata(){
    //付款方式
    var select=document.getElementsByTagName('input');
    var str = '';
    for(var i=0 ; i<select.length ; i++){
        if(select[i].checked){
            str = select[i].value;
        }    
    }
    var cname = document.querySelector('#c-name').value;        //客人姓名
    var cphone = document.querySelector('#c-phone').value;      //客人電話
    var caddress = document.querySelector('#c-address').value;  //客人地址
    
    if(str == "" || cname=="" || cphone=="" || caddress==""){
        var contentMsg =document.querySelector('.contentMsg');
        contentMsg.innerHTML=`請確認資料<br>是否填寫完整。`;
        showLoginAlert(loginAlert); 
        contentMsg.style.cssText =
                `line-height:1.5;
                display:flex;
                justify-content:center;
                align-items:center`;
    }else{
        window.location.href='cart3.php';
    }
    
    //客人所有資訊
    var customerinfo = str +'|'+ cname +'|'+ cphone +'|'+caddress;
    console.log(customerinfo);
    storage['customerinfo']=customerinfo;

}
window.addEventListener('load',doFirst);



