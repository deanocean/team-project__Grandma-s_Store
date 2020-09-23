var storage = localStorage;

// function doFirst(){
    const price = storage.getItem('Finalprice');  //商品總價

    const count_itemsid= storage.getItem('count_itemsid');
    const count_itemsprice= storage.getItem('count_itemsprice');
    const count_itemsqty= storage.getItem('count_itemsqty');
    // console.log(count_itemsid)
    // console.log(count_itemsprice)
    // console.log(count_itemsqty)


    const customerinfo = storage.getItem('customerinfo');
    const pay = customerinfo.split('|')[0];           //付款方式
	const name = customerinfo.split('|')[1];          //客戶姓名
	const phone = customerinfo.split('|')[2];           //客戶電話
	const address = customerinfo.split('|')[3];           //客戶地址

    const totalprice = document.querySelector('.totalprice');
    const payment  = document.querySelector('.payment');
    const cname  = document.querySelector('.cname');
    const cphone  = document.querySelector('.cphone');
    const caddress  = document.querySelector('.caddress');
    const finalprice  = document.querySelector('.finalprice');

    totalprice.innerHTML = price;
    payment.innerHTML = pay;
    cname.innerHTML = name;
    cphone.innerHTML = phone;
    caddress.innerHTML = address;
    finalprice.innerHTML = price;  
    
    // answer(price,pay,count_itemsid,count_itemsprice,count_itemsqty);

    const nextbtn = document.getElementById('nextbtn');
    nextbtn.addEventListener('click',answer);
// }

function answer(){
    var memId = doFirst();
    console.log(memId)

    var xhr = new XMLHttpRequest();
    xhr.open('post','php/cartdatatodb.php',true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var totalprice ="memId="+ memId+ "&totalprice="+ price+ "&payment="+ pay+ "&itemsid=" +count_itemsid+ "&itemsprice="+ count_itemsprice+ "&itemsqty="+ count_itemsqty;
        console.log(totalprice);
    xhr.send(totalprice);    
    localStorage.clear();
}

function doFirst(){
    var memId;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) { //server執行完畢
            if (xhr.status == 200) { //正確執行完畢               
                memId = JSON.parse(xhr.responseText).member_id;
            } else {
                alert(xhr.status);
            }
        }
    }    
    // var url = "php/ajaxLoginCheck.php";
    xhr.open('get','php/ajaxLoginCheck.php',false);
    xhr.send(null);
    console.log(memId)
    return memId;
}
window.addEventListener('load',doFirst);