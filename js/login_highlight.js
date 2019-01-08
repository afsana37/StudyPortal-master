$('.content_vio').click(function(e){
    $(this).css('z-index','99999');
    $('#overlay').fadeIn(300);
});

$('#overlay').click(function(e){
    $('#overlay').fadeOut(300, function(){
        $('.content_vio').css('z-index','1');
    });
});