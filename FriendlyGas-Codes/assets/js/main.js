window.onscroll = function (e){
    console.log($(window).scrollTop());
    if ($(window).scrollTop() > 20){
        $('.navbar').css("background", "white");

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.navbar-brand-img').attr('src', window.location.origin + '/Gasonline/media/images/logo.png');
        }
    }else{
        $('.navbar').css("background", "none");

    }
}