document.querySelector('.no-js').classList.add('js');
document.querySelector('.no-js').classList.remove('no-js');




jQuery(document).ready(function($) {
    $('.dropdown-toggle').attr("href", "#");
    fullHeight();
    aos();
    $(window).on('resize', function(){
        fullHeight();
        aos();
    });

    function fullHeight(){
        var windowHeight = $(window).height();
        var headerHeight = $('header').height();
        var fullHeight = windowHeight - headerHeight;
        if(fullHeight > 700){
            fullHeight = 700
        };
        $('.full-height').css({
            'min-height' :  fullHeight + 'px',
        });
    }
    
    function aos(){
        var windowHeight = $(window).height();
        var windowPadding = windowHeight * 0.8;
        $('.aos').each(function(){
            var block = $(this);
            rowPositionBottom =  (block.offset().top) - windowPadding;
                currentScroll = $(window).scrollTop(); //current scroll position
                if (currentScroll >=  rowPositionBottom) {  // apply parallax if you scroll past element
                    block.addClass('active');
    
                };
            
               $(window).scroll(function() { 
                rowPositionBottom =  (block.offset().top) - windowPadding;
                currentScroll = $(window).scrollTop(); //current scroll position
                if (currentScroll >=  rowPositionBottom) {  // apply parallax if you scroll past element
                    block.addClass('active');
    
                };
    
            });
         });
    }
    
    
    

// 07-07-2022 removed unnecessary function
    /*window.onload = function(){
    document.getElementById('close').onclick = function(){
        this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
        return false;
    };
};*/
    $(".wrapper").fitVids();
    $('a[href^="#"]').on('click', function(event) {

        var target = $(this.getAttribute('href'));

        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }

    });


    /* Show enquiry form from the product pages */
    var enqForm = document.querySelector('.wrapper-enquire-form');
    $('.wrapper-enquire-form').find('input').attr('tabindex', '-1');

    enqForm.blur();
    $(".btn-enquire").click(function(){
        enqForm.classList.add("showForm");
        $('.wrapper-enquire-form.showForm').find('input').attr('tabindex', '0');
        enqForm.focus();
    });
    /*close the form*/
    $(".close-form-button").click(function(){
        enqForm.classList.remove("showForm");
        $('.wrapper-enquire-form').find('input').attr('tabindex', '-1');
    });
    /*Dynamically populate the product name field on the form*/
    if(document.querySelector('.gallery-and-text-heading *') != null){
        var productName = document.querySelector('.gallery-and-text-heading *').innerHTML.toUpperCase();
    } else {
        productName = " ";
    }
    $(".enquire-product-name input").val(productName); 
    
    
    /*Hiding the Slider Navigation if there is only 1 image in it*/
    var sliderNav = $(".slider-nav");
    var list = $(".slider-nav li");
    if (list.length == 1){
        sliderNav.hide();
    }

    /*Calculate the distance of the enquire button group to the top of the page*/
    window.onscroll = function () {
        var enqBtn = document.querySelector('.wrapper-gallery-and-text .button-group'), //main button group in the product info block
            bottomBar = document.querySelector(' .wrapper-enquire-bottom-bar'), //button group in the bottom bar
            topScroll = document.documentElement.scrollTop, //counting the distance scrolled from the top of the page
            btnOffset = (enqBtn.clientHeight + enqBtn.offsetTop); //calculating the distance from the end of the main button group to the top of the page
       
        if (topScroll > btnOffset) {  //if user has scrolled far enough that the main button group isn't visible anymore
            bottomBar.classList.add("showEnquiryBar"); //then show the bottom button group
            $(' .wrapper-enquire-bottom-bar').find(".btn").attr("tabindex", "0");
        } else { //otherwise
            bottomBar.classList.remove("showEnquiryBar");//hide the bottom button group
            $(' .wrapper-enquire-bottom-bar').find(".btn").attr("tabindex", "-1");
        }
    };
        
    /*Finding Required Fields and Inputs*/
    $('form[id^="gform_"]').on('change', function (e) {
        var $reqd = $(this).find('.gfield_contains_required.gfield_visibility_visible').filter(function (i, c) {
          return []
            .concat($(c).find('input[type="text"], textarea').filter(function (i, fl) { return $(fl).val().length == 0; }).get())
            .concat($(c).find('input[type="checkbox"]').not(':checked').get())
            .length;
        });

    
        if ($reqd.length) {/*If there are any required fields and Input*/
          $(this).find('input[type="submit"]').addClass('disabled button-disabled').attr('disabled', 'disabled'); /* disable the submit button */
        } else { /*otherwise*/
          $(this).find('input[type="submit"]').removeClass('disabled button-disabled').removeAttr('disabled');/* enable the button again */
        }
    }).trigger('change');

    /*Look for any field with errors*/
    $('form[id^="gform_"]').on('show', function(e) {
        var $hasErr = $(this).find('.gfield_error');
        /*if there are any*/
        if ($hasErr.length >= 1){
            enqForm.classList.add("showForm"); /*open the form */
        }
    }).trigger('show');
   
  

    /*Toggling the slider for the Table/Slider Block*/
    $('.two_column_table .content-link').children('*:first-child()').attr('tabindex', '0');

    $(function(){
        $(".two_column_table").on("click", ".title", function() {
        $(this).toggleClass("table-hidden").next().slideToggle("1s");
        $(this).siblings().removeClass("table-hidden");
        });
    });
    

    
    $(function() {
        $('.content-link').each(function(){
            var idLink = $(this).attr("id");
            var linkName  = document.getElementById(idLink).firstChild.innerHTML.split(' ').join('_');
            $(this).attr("id", linkName);
            $(".table-of-content ul")
            .append($('<li>')
                .attr("class", "gallery-and-text-content-link")
                .append($('<a>')
                    .attr("href", "#"+linkName.split(' ').join('_'))
                    .append(linkName)));
        });
    });



    var speed = 15;

    /* Call this function with a string containing the ID name to
     * the element containing the number you want to do a count animation on.*/
    var check = 1;
    function incEltNbr(nbr){
        $(nbr).each(function(){
            elt = $(this).children("p")[0];  
            console.log(elt)
            endNbr = Number($(this).children("p").html());
            console.log(endNbr);
            incNbrRec(0, endNbr, elt);
        });
       
    };
    


    /*A recursive function to increase the number.*/
    function incNbrRec(i, endNbr, elt) {
      if (i <= endNbr) {
        elt.innerHTML = i;
        setTimeout(function() {//Delay a bit before calling the function again.    
            incNbrRec(i + 1, endNbr, elt);      
        }, speed);
     
      }
    }
    
    $(window).scroll(function(){
        var stats = document.querySelector('.stats-box'),
            totalScroll = document.documentElement.scrollTop, //counting the distance scrolled from the top of the page
            statsScroll = stats.offsetTop; //calculating the distance from the end of the main button group to the top of the page

       
        if (totalScroll > statsScroll - (stats.clientHeight * 2)) {  //if user has scrolled far enough that the main button group isn't visible anymore
          
            if(check === 1){
                incEltNbr(".increment");
                check++;
            }
        }
    })

});





jQuery(document).ready(function ($) {
   

// Slick Slider
    
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: true,
        infinite: false,
         responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
        }
      ]
    });
    
     $('.slick-slider-hero').slick({
        arrows: false,
        infinite: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        fade: true,
        speed: 1000,
        autoplaySpeed: 3000,
		pauseOnHover: false,
    });
	$('.hero-play-pause').on('click', function() {
		
		if($(this).attr("aria-label") === "Pause"){
          
		   $(this).attr("aria-label", "Play");
			$('.slick-slider-hero')
			.slick('slickPause');
           
        }else{
            $(this).attr("aria-label", "Pause");
                $('.slick-slider-hero')
            .slick('slickPlay');
        }
       
	});

    $('.slick-slider-quotes').slick({
        arrows: true,
        infinite: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        fade: true,
        speed: 1000,
        autoplaySpeed: 3000
    });
    $('.slick-slider-casestudies').slick({
        arrows: true,
        infinite: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        speed: 300,
    });
    $('.slick-slider-casestudies-column').slick({
        arrows: true,
        infinite: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        fade: true,
        speed: 300,
    });
    $('.slick-slider-carousel').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 1600,
        autoplaySpeed: 0,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
        },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
        }
      ]
    });
    $('.carousel-play-pause').on('click', function() {
		
		if($(this).attr("aria-label") === "Pause"){
		   $(this).attr("aria-label", "Play");
			$('.slick-slider-carousel')
			.slick('slickPause');
		   }else{
			$(this).attr("aria-label", "Pause");
			   $('.slick-slider-carousel')
			.slick('slickPlay');
			}
	});
    $('.slick-slider-carousel2').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
        }
      ]
    });
    $('.slick-slider-carousel3').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
        },
            {
                breakpoint: 624,
                settings: {
                    slidesToShow: 1,
                }
        }
      ]
    });
});