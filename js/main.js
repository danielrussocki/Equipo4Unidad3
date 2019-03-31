$('header nav ul li').click(function(){
    $('header nav ul li').removeClass('active');
    $(this).addClass('active');
});
$(document).ready(function(){
    scrolling();
});
function scrolling(){
    $('.scroll-down').click(function(){
        $('html,body').animate({
            scrollTop: $('.footer-1').offset().top
        }, 1500);
    });
}