$num = $('.my-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

// if ($num % 2 == 0) {
//     $('.my-card:nth-child(' + $even + ')').addClass('card-active');
//     $('.my-card:nth-child(' + $even + ')').prev().addClass('card-prev');
//     $('.my-card:nth-child(' + $even + ')').next().addClass('card-next');
// } else {
//     $('.my-card:nth-child(' + $odd + ')').addClass('card-active');
//     $('.my-card:nth-child(' + $odd + ')').prev().addClass('card-prev');
//     $('.my-card:nth-child(' + $odd + ')').next().addClass('card-next');
// }
$('.my-card:nth-child(2)').addClass('card-active');
$('.my-card:nth-child(2)').prev().addClass('card-prev');
$('.my-card:nth-child(2)').next().addClass('card-next');
$('.my-card:nth-child(1)').css('opacity' , 0);
$('.my-card:nth-child(1)').css('cursor' , 'default');



$('.my-card').click(function () {
    if($(this).css('opacity') == $('.my-card:nth-child(1)').css('opacity')){
            return;
    }else{

    $slide = $('.card-active').width();
    $slide = parseInt($slide) + 6 + "px";

    if ($(this).hasClass('card-next')) {
        
        $('.card-carousel').stop(false, true).animate({ left: '-=' + $slide });
    } else if ($(this).hasClass('card-prev')) {
        $('.card-carousel').stop(false, true).animate({ left: '+=' + $slide });
    }
        // console.log($slide);
        // console.log($('.card-carousel').position().left());

    $(this).removeClass('card-prev card-next');
    $(this).siblings().removeClass('card-prev card-active card-next');

    $(this).addClass('card-active');
    $(this).prev().addClass('card-prev');
    $(this).next().addClass('card-next');
    }
});


// mobile nav
$('.toggle-btn1').click(function () {
        $('.card-active').prev().trigger('click');
});
$('.toggle-btn2').click(function () {
        $('.card-active').next().trigger('click');
});