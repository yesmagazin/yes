/*
 * Showmore plugin for opencart
 * Copyright (c) 2015 Shvarev Ruslan ruslan.shv@gmail.com
 * https://opencartforum.com/user/12381-freelancer/
 * small tuning: Sergey R., 2020
 */
$(document).ready(function () {
//    if ($('.pagination div.links b').next('a').length > 0) {
    if ($('.show_more_link').length > 0) {
//        $('.pagination').before('<div id="showmore" style="padding-bottom: 15px;"><a onclick="showmore();">Показать еще</a></div>');
//        $('.pagination').before('<div id="showmore" class="catalog__btns"><button class="catalog__btn btn btn_orange" onclick="showmore();"><span class="btn__text" style="margin: 12px 2px 12px 2 px;">ПОКАЗАТЬ ЕЩЕ</span></button></div>');
        $('.pagination').after('<div id="showmore_search" class="catalog__btns"><button class="catalog__btn btn btn_orange" onclick="showmore_search();"><span class="btn__text" style="margin: 12px 2px 12px 2 px;">ПОКАЗАТЬ ЕЩЕ</span></button></div>');
    }
});
function showmore_search() {
    var $next = $('.show_more_link');
    if ($next.length == 0) {
        return;
    }
    $.ajax({
        url: $next.attr('href') + '&ajax=1',
        dataType: 'json',
        success: function (data) {
            var $container = $('.catalog__list');
            $('ul.pagination').remove();
            $container.append(data);
            $('ul.pagination').css('margin', '0 auto');
            if ($('.show_more_link').length == 0) {
                $('#showmore_search').hide();
            }
        }
    });
    return false;
}