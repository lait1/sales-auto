$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    // centerMode: true,
    focusOnSelect: true
});
// $('.new-sales__list').slick({
//     slidesToShow: 4,
//     slidesToScroll: 1,
// });