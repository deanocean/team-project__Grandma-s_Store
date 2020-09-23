<!DOCTYPE html>
<html lang="en">
<head>
    <title>會員專區</title>
    <?php require_once("head.html")?>
</head>

<body class="member">



<!-- 20181225 -->
<?php require_once("nav.html"); ?>
<?php require_once("loginBox.html"); ?>

<div class="member_section">

<div class="show_order_light_box_bg"></div>

<!-- <div class="member_content"> -->

<div class="profile col-sm-12 col-md-12 col-lg-12 col-xl-12" id="profile_edit">
    <script>
        function show_member(jsonStr){
            // console.log(jsonStr);
            var str="";
            var ary_coupon=jsonStr.split("split");
            for (let i = 0; i < ary_coupon.length; i++) {
                var column = JSON.parse(ary_coupon[i]);
                if( column.account ){
                    str +="<div class='col-sm-12 col-md-6 col-lg-6 col-xl-2 edit_personal_picture' id='edit_personal_picture'>";
                    str +="<label for='select_head_pic'><img id='personal_picture' src='"+column.image_path+"' alt='"+column.image_path+"'>";
                    str +="<div>編輯大頭貼<input type='file' id='select_head_pic' style='display:none'><img class='member_edit' src='img/member/pencil.png' alt=''></div></label>";
                    str +="<form class='textform' method='post' accept-charset='utf-8' name='form_member_pic'>";
                    str +="<input name='hidden_data' id='hidden_data' type='hidden' /></form>";
                    str +="</div>";
                    str +="<div class='col-sm-12 col-md-12 col-lg-12 col-xl-10'>";
                    str +="<div class='col-sm-12 col-md-12 col-lg-6 col-xl-3'>";
                    str +="<p class='profile_name'><input type='text' name='' id='edit_name_input' class='input_edit disable_edit' readonly value='"+column.name+"'><img id='edit_name' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="<p>帳號:"+column.account+"</p>";
                    str +="<p>密碼:<input type='password' name='' id='edit_password_input' class='input_edit disable_edit' readonly value='"+column.password+"'><img id='edit_password' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="</div>";
                    str +="<div class='col-sm-12 col-md-12 col-lg-6 col-xl-4'>";
                    str +="<p>生日:<input type='date' name='' id='edit_birthday_input' class='input_edit disable_edit' readonly value='"+column.birthday+"'><img id='edit_birthday' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="<p>電話:<input type='text' name='' id='edit_mobile_phone_input' class='input_edit disable_edit' readonly value='"+column.mobile_phone+"'><img id='edit_mobile_phone' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="</div>";
                    str +="<div class='col-sm-12 col-md-12 col-lg-6 col-xl-5'>";
                    str +="<p>E-mail:<input type='text' name='' id='edit_email_input' class='input_edit disable_edit' readonly value='"+column.email+"'><img id='edit_email' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="<p>地址:<input type='text' name='' id='edit_address_input' class='input_edit disable_edit' readonly value='"+column.address+"'><img id='edit_address' class='member_edit' src='img/member/pencil.png' alt=''></p>";
                    str +="</div>";  
                    str +="</div>";      
                }else{
                    
                    str += "<p>資料異常!</p>";
                   
                }
            }
            document.getElementById("profile_edit").innerHTML = str;

            let obj= document.getElementsByClassName("member_edit");
            for(var i=0;i<obj.length;i++){
                obj[i].addEventListener("click",modify_member,false);
            }

            //20190101
            let obj2= document.getElementById('select_head_pic');
            obj2.addEventListener("change",change_picture,false);
           
        }

        function get_member(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    show_member( xhr.responseText );
                }else{
                    alert( xhr.status );
                }
            }
            var url = "php/get_member.php";
            xhr.open("Get", url, true);
            xhr.send( null );
        }
    </script>
</div>

<!-- <div class="tablinks col-sm-12 col-md-12 col-lg-12 col-xl-12"> -->
<div class="tablinks flex_r_w_sb_sa">
    <!-- <div class="tab_btn col-sm-3 col-md-3 col-lg-2 col-xl-2" id="tab1" name="tb1">訂單管理</div>
    <div class="tab_btn col-sm-3 col-md-3 col-lg-2 col-xl-2" id="tab2" name="tb2">活動管理</div>
    <div class="tab_btn col-sm-3 col-md-3 col-lg-2 col-xl-2" id="tab3" name="tb3">收藏管理</div>
    <div class="tab_btn col-sm-3 col-md-3 col-lg-2 col-xl-2" id="tab4" name="tb4">折價券查看</div> -->
    <div class="tab_btn" id="tab1" name="tb1">訂單管理</div>
    <div class="tab_btn" id="tab2" name="tb2">活動管理</div>
    <div class="tab_btn" id="tab3" name="tb3">收藏管理</div>
    <div class="tab_btn" id="tab4" name="tb4">折價券查看</div>
</div>

<div class="member_tab col-sm-12 col-md-12 col-lg-12 col-xl-12">

   
    
    <!-- 訂單查詢 -->
    <div class="order flex_r_w_sa_sa" id="tb1"> 
    <script>

    function show_product_order_detail(jsonStr){
        var str="";
        var ary_coupon=jsonStr.split("split");
        for (let i = 0; i < ary_coupon.length; i++) {
            var column = JSON.parse(ary_coupon[i]);
             // if( column.name ){ 
            //     str+="<tr>";   
            //     str+= "<td>"+(i+1)+"</td><td>"+column.name+"</td><td>"+column.price+"</td>";  
            //     str+= "<td>"+column.qty+"</td><td>"+(parseInt(column.price)*parseInt(column.qty))+"</td>";    
            //     str+="</tr>"; 
            // }else{  
            //     str += "<p>資料異常!</p>";
            // }
            str+= "<tr>";   
            str+= "<td>"+(i+1)+"</td><td>"+column.name+"</td><td>"+column.price+"</td>";  
            str+= "<td>"+column.qty+"</td><td>"+(parseInt(column.price)*parseInt(column.qty))+"</td>";    
            str+= "</tr>"; 
        }
        return str;
    }

    function get_product_order_detail(order_id){
        var str="";
        var xhr = new XMLHttpRequest();
        xhr.onload=function(){
            if( xhr.status == 200 ){ 
                str=show_product_order_detail(xhr.responseText);
                return str;
            }else{
                alert( xhr.status );
            }
        }
        var url = "php/get_product_order_detail.php?order_id=" + order_id;
        //要同步才能抓到
        xhr.open("Get", url, false);
        xhr.send( null );
        return str;
    }


    function show_product_order(jsonStr){
        if(jsonStr.indexOf("訊息")==-1){
            var str="";
            var ary_coupon=jsonStr.split("split");
            for (let i = 0; i < ary_coupon.length; i++) {
                var column = JSON.parse(ary_coupon[i]);
                if( column.order_id ){
                    str += "<div class='order_item col-sm-12 col-md-12 col-lg-12 pad20'>";

                    str += "<div class='order_title col-sm-12 col-md-12 col-lg-12'>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
                    str += "<p>訂單編號："+column.order_id+"</p>";
                    str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>"
                    str += "<p>訂單日期："+column.order_datetime+"</p>";
                    str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>"
                    str += "<p>加總金額："+column.amount+"</p>";
                    str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>"
                    str += "<p>付款方式："+column.payment_method+"</p>";
                    str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>"
                    if(column.payment_state=='0'){
                        str += "<p>付款狀態：未付款</p>";
                    }
                    else{
                        str += "<p>付款狀態：已付款</p>";
                    }
                    str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>"
                    if(column.order_state=='0'){
                        str += "<p>訂單狀態：未出貨</p>";
                    }
                    else{
                        str += "<p>訂單狀態：已出貨</p>";
                    }
                    str += "</div>";

                    // str += "<div class='col-sm-12 col-md-12 col-lg-2'>";
                    // str += "<p>&nbsp;</p>";
                    // str += "</div>";

                    str += "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>";
                    str += "<div class='show_more_order' id='order_"+column.order_id+"'>查看明細<img src='img/member/triangle_down.png' alt=''></div>";
                    str += "</div>";

                    str += "</div>";//order_title

                    str += "<div class='col-sm-12 col-md-12 col-lg-12 order_content' id='order_content_"+column.order_id+"' >";
                    str += "<i class='fas fa-times-circle btn_order_cancel' id='oc_"+column.order_id+"'></i>";
                    str += "<h2>訂單明細</h2>";
                    str += "<p>訂單日期："+column.order_datetime+"</p>";
                    str += "<p>收件人姓名："+column.name+"</p>";
                    str += "<p>收件人地址："+column.address+"</p>";
                    str += "<p>&nbsp;</p>";
                    str += "<h2>購買清單</h2>";
                    str += "<div class='divide'></div>";
                    str += "<table class='product_detail'>";
                    str += "<tr><th>項目</th><th>名稱</th><th>單價</th><th>數量</th><th>金額</th></tr>";
                    // str+= "<p>商品編號：001 商品名稱：膠帶口香糖 商品數量：3</p>";
                    str += get_product_order_detail(column.order_id);
                    str += "</table>";
                    str += "</div>"; //order_content

                    str += "</div>";  //order_item  
                    
                    


                }else{
                    str += "<div class='order_item col-sm-12 col-md-12 col-lg-12 pad20'>";
                    str += "<p>資料異常!</p>";
                    str += "</div>"; 
                }
            }

        }
        else{
                str = "<div class='order_item col-sm-12 col-md-12 col-lg-12 pad20'>";
                str += "<p>"+jsonStr+"</p>";
                str += "</div>"; 
        }
       
        document.getElementById("tb1").innerHTML = str;

        // let obj= document.getElementsByClassName("show_more_order");
        // for(var i=0;i<obj.length;i++){
        //     obj[i].addEventListener("click",show_or_hide_product_order_detail,false);
        // }

        //點擊取消按鈕，關閉燈箱
        // var btnCancel = document.getElementsByClassName('btnCancel');
        // for(var i=0;i<btnCancel.length;i++){
        //     btnCancel[i].addEventListener("click",hide_box,false);
        // }

        $('.show_more_order').click(function () {
            var btnIndex =$(this).index('.show_more_order');
            $('.order_content').eq(btnIndex).slideToggle();    
            $('.show_order_light_box_bg').slideToggle(); 
        })

        $('.show_order_light_box_bg').click(function () {
            $('.order_content').hide();
            $('.show_order_light_box_bg').slideToggle();  
        })

        $('.btn_order_cancel').click(function () {
            var btnIndex =$(this).index('.btn_order_cancel');
            $('.order_content').eq(btnIndex).slideToggle(); 
            $('.show_order_light_box_bg').slideToggle();
        })


    }

    function get_product_order(){
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            if( xhr.status == 200 ){
                show_product_order( xhr.responseText );
            }else{
                alert( xhr.status );
            }
        }
        var url = "php/get_product_order.php";
        xhr.open("Get", url, true);
        xhr.send( null );
    }
    </script>      
    </div>
    
     <!-- 活動 -->
    <div class="activity flex_r_w_sa_sa hide" id="tb2">
    <script>
        function show_member_join_activity(jsonStr){
            console.log(jsonStr);
            if(jsonStr.indexOf("訊息")==-1){
                var str="";
                var ary_coupon=jsonStr.split("split");
                for (let i = 0; i < ary_coupon.length; i++) {
                    var column = JSON.parse(ary_coupon[i]);
                    if( column.activity_name ){
                        str += "<div class='activity_item'>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12 activity_image'>";
                        str += "<a href='eventInfo.php";
                        str += "?activity_id="+column.activity_id+"&activity_type_id="+column.activity_type_id+"&desc_image01_path="+column.desc_image01_path;
                        str += "&hold_date="+column.hold_date+"&name="+column.activity_name+"&storeName="+column.name;
                        str += "&max_people="+column.max_people; 
                        str += "'><img src='"+column.desc_image01_path+"' alt=''></a>";
                        str += "</div>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                        str += "<p>活動名稱:"+column.activity_name+"</p>";
                        str += "<p>店鋪地點:"+column.name+"<a href='store.php#store"+column.store_id+"'><img class='img_address' src='img/member/address.png' alt=''></a></p>";
                        str += "<p>活動日期:"+column.hold_date+"</p>";
                        str += "</div>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                        // str += "<div class='col-sm-6 col-md-6 col-lg-6 ac_btn'><a href='eventInfo.php"; 
                        // str +="?activity_id="+column.activity_id+"&activity_type_id="+column.activity_type_id+"&desc_image01_path="+column.desc_image01_path;
                        // str +="&hold_date="+column.hold_date+"&name="+column.activity_name+"&store_id="+column.store_id;
                        // str +="&max_people="+column.max_people; 
                        // str += "'>查看</a></div>";
                        str += "<div class='col-sm-6 col-md-6 col-lg-6 ac_btn btnCancelActivity' id='activityid_"+column.activity_id+"'>取消</div>";
                        str += "</div>";            
                        str += "</div>"; 
                        str += "</div>";     
                    }else{
                        str += "<div class='activity_item'>";
                        str += "<p>資料異常!</p>";
                        str += "</div>"; 
                    }
                }

            }
            else{
                str = "<div class='activity_item'>";
                str += "<p>"+jsonStr+"</p>";
                str += "</div>"; 
            }    
           
            document.getElementById("tb2").innerHTML = str;
            let obj= document.getElementsByClassName("btnCancelActivity");
            for(var i=0;i<obj.length;i++){
                obj[i].addEventListener("click",delete_member_join_activity,false);
            }
        }

        function get_member_join_activity(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    show_member_join_activity( xhr.responseText );
                }else{
                    alert( xhr.status );
                }
            }
            var url = "php/get_member_join_activity.php";
            xhr.open("Get", url, true);
            xhr.send( null );
        }
    </script> 
    </div>
    
    <!-- 商品收藏 -->
    <div class="member_product flex_r_w_sa_sa hide" id="tb3">
    <script>
        function show_favorite_goods(jsonStr){
            if(jsonStr.indexOf("訊息")==-1){
                var str="";
                var ary_coupon=jsonStr.split("split");
                for (let i = 0; i < ary_coupon.length; i++) {
                    var column = JSON.parse(ary_coupon[i]);
                    if( column.name ){
                        str += "<div class='product_item'>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12 product_image'>";
                        str += "<a href='products.php?product_id="+column.product_id+"'><img src='"+column.image_path+"' alt=''></a>";
                        str += "</div>";
                        str += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                        str += "<div class='col-sm-8 col-md-8 col-lg-8'>";
                        str += "<p>商品名稱:"+column.name+"</p>";
                        str += "<p>商品單價:"+column.price+"</p>";
                        str += "</div>";
                        str += "<div class='col-sm-4 col-md-4 col-lg-4'>"
                        str += "<div class='btnCancelLove' id='productid_"+column.product_id+"'>取消</div>";
                        str += "</div>";
                        str += "</div>";   
                        str += "</div>";    
                    }else{
                        str += "<div class='product_item'>";
                        str += "<p>資料異常!</p>";
                        str += "</div>"; 
                    }
                }
            }
            else{
                    str = "<div class='product_item'>";
                    str += "<p>"+jsonStr+"</p>";
                    str += "</div>"; 
            }
           
            document.getElementById("tb3").innerHTML = str;

            let obj= document.getElementsByClassName("btnCancelLove");
            for(var i=0;i<obj.length;i++){
                obj[i].addEventListener("click",delete_favorite_goods,false);
            }

        }

        function get_favorite_goods(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    show_favorite_goods( xhr.responseText );
                }else{
                    alert( xhr.status );
                }
            }
            var url = "php/get_favorite_goods.php";
            xhr.open("Get", url, true);
            xhr.send( null );
        }
    </script>
    </div>
    
   
    <!-- 折價券 -->
    <div class="coupon flex_r_w_sa_sa hide" id="tb4">
    <script>
        function show_member_coupon(jsonStr){
            // console.log(jsonStr);
            if(jsonStr.indexOf("訊息")==-1){
                var str="";
                var ary_coupon=jsonStr.split("split");
                for (let i = 0; i < ary_coupon.length; i++) {
                    var column = JSON.parse(ary_coupon[i]);
                    if( column.coupon_id ){
                        str += "<div class='coupon_item'>";
                        str += "<p>折價券金額:<span>"+column.coupon_id+"</span></p>";
                        str += "<p>折價券張數:<span>"+column.qty+"</span></p>";
                        str += "</div>";        
                    }else{
                        str += "<div class='coupon_item'>";
                        str += "<p>資料異常!</p>";
                        str += "</div>"; 
                    }
                }
                
            }
            else{
                str = "<div class='coupon_item'>";
                str += "<p>"+jsonStr+"</p>";
                str += "</div>";
            }
            document.getElementById("tb4").innerHTML = str;
           
        }

        function get_member_coupon(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){  
                    show_member_coupon( xhr.responseText );      
                }else{
                    alert( xhr.status );
                }
            }
            var url = "php/get_member_coupon.php";
            xhr.open("Get", url, true);
            xhr.send( null );
        }
    </script>  
    </div>

</div><!--member_tab-->



<!-- </div> -->

</div><!-- member_section -->




</body>
<?php require_once("selfJs.html")?>
<script src="js/self/member.js"></script>

</html>