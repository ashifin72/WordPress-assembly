// Подключаем слайдер
$('.comments__items').slick({
    dots: true,
    autoplay: true,
    centerMode: true,
    slidesToShow: 3,
    centerPadding: 0,
    prevArrow: '<div class="slick-left"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div class="slick-right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
});