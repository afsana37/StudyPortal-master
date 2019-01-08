/**
 * Created by Lenovo on 21/10/2016.
 */


$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.view_st_admin').css({'padding-right':scrollWidth});
}).resize();