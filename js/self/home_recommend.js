$(document).ready(function(){      
	// q1

	$('#a1_1').click(function(){
			$('#first').css("display","none");
			$('#q2_1').fadeIn(2000).removeClass('hidden');
	});
	$('#a1_2').click(function(){
		$('#first').css("display","none");
		$('#q2_2').fadeIn(2000).removeClass('hidden');
	});
		
  //q2

	$('#a2_1_1').click(function(){
		$('#q2_1').css("display","none");
		$('#q3_1_1').fadeIn(2000).removeClass('hidden');
	});

	$('#a2_1_2').click(function(){
		$('#q2_1').css("display","none");
		$('#q3_1_2').fadeIn(2000).removeClass('hidden');
	});

	$('#a2_2_1').click(function(){
		$('#q2_2').css("display","none");
		$('#q3_2_1').fadeIn(2000).removeClass('hidden');
	});

	$('#a2_2_2').click(function(){
		$('#q2_2').css("display","none");
		$('#q3_2_2').fadeIn(2000).removeClass('hidden');
	});

  //q3

	$('#a3_1_1_1').click(function(){
		$('#q3_1_1').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=14" class="toproducts"><img src="img/section2/1.png" alt="竹蜻蜓"><span><br>竹蜻蜓</span></a>');
	});

	$('#a3_1_1_2').click(function(){
		$('#q3_1_1').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=24"><img src="img/section2/2.png" alt="飛機餅乾"><span><br>飛機餅乾</span></a>');
	});

	$('#a3_1_2_1').click(function(){
		$('#q3_1_2').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=6"><img src="img/section2/3.png" alt="黃心梅"><span><br>黃心梅</span></a>');
	});

	$('#a3_1_2_2').click(function(){
		$('#q3_1_2').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=7"><img src="img/section2/4.png" alt="口紅糖"><span><br>口紅糖</span></a>');
		});
		
	$('#a3_2_1_1').click(function(){
		$('#q3_2_1').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=3"><img src="img/section2/5.png" alt="香菸糖"><span><br>香菸糖</span></a>');
	});

	$('#a3_2_1_2').click(function(){
		$('#q3_2_1').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=13"><img src="img/section2/6.png" alt="劍玉"><span><br>劍玉</span></a>');
	});

	$('#a3_2_2_1').click(function(){
		$('#q3_2_2').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');	
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=10"><img src="img/section2/7.png" alt="跳跳糖"><span><br>跳跳糖</span></a>');
	});

	$('#a3_2_2_2').click(function(){
		$('#q3_2_2').css("display","none");
		$('#re-img').css("display","flex");
		$('#end').fadeIn(2000).removeClass('hidden');
		$('#re-img').fadeIn(2000).removeClass('hidden').html('<a href="products.php?product_id=1"><img src="img/section2/8.png" alt="膠帶口香糖"><span><br>膠帶口香糖</span></a>');
	});

	$('#replay').click(function(){
		$('#end').css("display","none");
		$('#re-img').css("display","none");
		$('#first').fadeIn(2000).removeClass('hidden');
	});


});


 