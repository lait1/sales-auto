$(document).ready(function () {

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
//

        $('select[name=brand]').trigger('change');

    // if($(this.val() != null)){

    // }
    $('.brand__item-all').click(function (e) {
        e.preventDefault();
        if ($('.brand__list').attr('style')){
            //TODO Не удаляет атрибут, почему?
            $('.brand__list').removeAttr('style');
        }
        $('.brand__list').css('height', '100%');

    });
    $('select[name=brand]').change(function () {
        var $selectType = $('select[name=model]');
        var valueSelected = this.value;
        $.ajax({
            url: '/filter/getModel',
            type: 'get',
            data: {brand: valueSelected},
            success: function (response) {
                $selectType.empty();
                $selectType.append(response);
                $selectType.attr('disabled', null);
            },
            error: function (response) {
                // $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

});
//
// $('#filter').submit(function (event) {
//     event.preventDefault();
//     var $form = $(this);
//     sendFilter($form);
// });
// function sendFilter($form) {
//     $.ajax({
//         url: '/filter',
//         type: $form.attr('method'),
//         data: $form.serialize(),
//         success: function(response) {
//             $('.catalog').empty();
//             $('.catalog').append(response);
//         },
//         error: function(response) {
//             $('#result_form').html('Ошибка. Данные не отправлены.');
//         }
//     });
// }
// $('.page-item:not(.disabled) a').click(function (e) {
//     e.preventDefault();
//     if ($(this).attr('rel') == 'prev') {
//         page = $('.page-item.active').text() - 1;
//         sendFilter();
//     } else if ($(this).attr('rel') == 'next') {
//         page = +$('.page-item.active').text() + +1;
//         sendFilter();
//     } else {
//         page = $(this).text();
//         sendFilter();
//     }
//     return false;
//
// });
