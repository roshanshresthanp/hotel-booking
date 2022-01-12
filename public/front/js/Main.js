$(document).ready(function(){
    $('#bannerslide').owlCarousel({
        loop:true,
        nav:true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
            }
        }
    })

    $('#bannerslide').parent().find('.owl-next, .owl-prev').show(function(){
        $('#bannerslide').parent().find('.owl-next').html('<i class="bi bi-chevron-right"></i>').addClass('owl-next-position');
        $('#bannerslide').parent().find('.owl-prev').html('<i class="bi bi-chevron-left"></i>').addClass('owl-prev-position');
    });



    $('#reviews').owlCarousel({
        loop:true,
        nav:true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
            }
        }
    })

    $('#reviews').parent().find('.owl-next, .owl-prev').show(function(){
        $('#reviews').parent().find('.owl-next').html('<i class="bi bi-chevron-right"></i>').addClass('owl-next-position-reviews');
        $('#reviews').parent().find('.owl-prev').html('<i class="bi bi-chevron-left"></i>').addClass('owl-prev-position-reviews');
    });




    $('#detail-imgae-slide').owlCarousel({
        loop:true,
        rewind: false,
        nav:true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: false,
        dotsContainer: '#carousel-custom-dots',
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
            }
        }
    });
   


    $('#detail-imgae-slide').parent().find('.owl-next, .owl-prev').show(function(){
        $('#detail-imgae-slide').parent().find('.owl-next').html('<i class="bi bi-chevron-right"></i>').addClass('owl-next-position-image');
        $('#detail-imgae-slide').parent().find('.owl-prev').html('<i class="bi bi-chevron-left"></i>').addClass('owl-prev-position-image');
    });

    $('.myslider').owlCarousel({
        loop:true,
        rewind: false,
        nav:true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: false,
        dotsContainer: '.owl-dots',
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
    });



    $('.details-dots button').on('mouseover', function () {
        console.log('hovered');
        $('.myslider').trigger('stop.owl.autoplay');

        var carousel = $('.myslider').data('owl.carousel');
        carousel.settings.autoplay = false; 
        carousel.options.autoplay = false;
        $('.owl-carousel').trigger('refresh.owl.carousel');
    });
    $('.details-dots button').on('mouseleave', function () {
        console.log('mouse leave');
        $('.owl-carousel').trigger('stop.owl.autoplay');
        var carousel = $('.owl-carousel').data('owl.carousel');
        carousel.settings.autoplay = true; 
        carousel.options.autoplay = true;
        $('.owl-carousel').trigger('refresh.owl.carousel');
    });

    // $('.details-dots owl-dot').on('mouseover',function(e){
    //     owl.trigger('stop.owl.autoplay');
    // });
    // $('.details-dots owl-dot').on('mouseleave',function(e){
    //     owl.trigger('play.owl.autoplay');
    // });
    
    $('.myslider').parent().find('.owl-next, .owl-prev').show(function(){
        $('.myslider').parent().find('.owl-next').html('<i class="bi bi-chevron-right"></i>').addClass('owl-next-position-image');
        $('.myslider').parent().find('.owl-prev').html('<i class="bi bi-chevron-left"></i>').addClass('owl-prev-position-image');
    });


    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
    });

    //pop menu
    $('#menu').click(function(){
        $('#menu-links').slideToggle();
    });

    

    window.addEventListener("resize", function(){
        let windows_size =  window.innerWidth;
        console.log(windows_size);
        if(windows_size > 991 ){
            $('.links').css({
                'display': 'flex',
            })
        }
        if(windows_size < 991 ){
            $('.links').css({
                'display': 'none',
            })
        }
    });

    // if($('#menu').is(':visible')){
    //     $('#menu-links').show();
    //     $('#menu').click(function(){

    //         $('#menu-links').toggle();
    //     });
    // }

    //rooms toggle
    $('.rooms-toggle').hide();
    
    $('.collaps-btn').click(function(){
        let getId = $(this).attr('target');
        //remove acitve from previous btn and add in new one
        if($(this).is('.active')){
            console.log('current active');
        }else{
            $('.collaps-btn').removeClass('active');
            $(this).addClass('active');
        }
        // $('.collaps-btn').removeClass('active');
        if($('#'+getId).is('.room-active')){
            console.log('good');
            // $('#'+getId).show();
        }else{
            console.log('good');
            $('.rooms-toggle').removeClass('room-active');
            $('#'+getId).addClass('room-active');
        }
        // $('#'+getId).toggleClass('room-active');
        // console.log($('#'+getId).attr('id'));
    });


    


    
        
});