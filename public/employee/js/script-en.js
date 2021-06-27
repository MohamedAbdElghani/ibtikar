
$(document).ready(function () {

    window.onbeforeunload = function () {
        window.scrollTo(0,0);
};
    new WOW().init();

    // Feather Icons
    feather.replace()


    // Declare Intro Carousel jquery object
    var owl = $('.intro-carousel');
    if (owl.length) {
        // Carousel initialization
        owl.owlCarousel({
            rtl: false,
            loop: false,
            margin: 0,
            navSpeed: 500,
            nav: false,
            autoplay: true,
            rewind: true,
            items: 1,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
        });
    }

    var tabs = $('#tile-1 .nav-tabs');
    if (tabs.length) {
        $("#tile-1 .nav-tabs a").click(function () {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $("#tile-1 .slider").css({ "left": + position.left, "width": width });
        });
        var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-1 .nav-tabs .active").position();
        $("#tile-1 .slider").css({ "left": + actPosition.left, "width": actWidth });
    }



    // Portfolio Silder

    var cSlider = $(".works-owl-carousel");
    if (cSlider.length) {
        cSlider.owlCarousel({
            rtl: false,
            animateOut: 'slideOutLeft',
            loop: false,
            nav: false,
            dots: true,
            autoplay: false,
            autoplayTimeout: 2000,
            smartSpeed: 1000,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
                551: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            },
        })
    }


    cSlider.mouseover(function () {
        cSlider.trigger('stop.owl.autoplay');
    });

    cSlider.mouseleave(function () {
        cSlider.trigger('play.owl.autoplay', [1000]);
    });


    /* Demo purposes only */
    $("figure").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );



    $(window).load(function () {

        $(".loadingLogo").addClass('removeLogo');

        var morphing = anime({
            targets: '.morph',
            d: [
                { value: 'M 0.5 0.5 L 0.5 469.5 C 0.5 469.5 241.5 211.5 499.5 469.5 C 757.5 727.5 1164 610.66 1319.5 469.5 C 1493 312 1713 261 1919.5 478.5 L 1919.5 -0.5 Z' },
                { value: 'M 0.5 0.5 L 0.5 1 C 213.722 1 426.944 1 640.167 1 C 853.389 1 1066.611 1 1279.833 1 C 1493.056 1 1706.278 1 1919.5 1 L 1919.5 -0.5 Z' }
            ],
            easing: 'easeInOutQuint',
            duration: '2000',
            loop: 'false',
            autoplay: 'false'
        })
    });

    var filter = $('#filter');
    if(filter.length) {

    (function () {

        let filter = document.querySelector("#filter");
        let filterBtns = Array.from(document.querySelectorAll("ul li"));
        let elements = Array.from(filter.children);
        let lis = Array.from(document.querySelectorAll("li"));

        function filterCardapio(e) {
            let result = elements.filter((element) => {
                element.className = element.className.replace(" hide", "");
                return e.target.id !== element.dataset.food;
            });

            makeChange(result);

            if (e.target.id == "all") {
                for (let element of elements) {
                    element.classList.remove("hide");
                }
            }
        }

        function makeChange(result) {
            result.forEach(element => {
                if (element.classList.contains("hide")) {
                    element.className = element.className.replace(" hide", "");
                } else if (!element.classList.contains("hide")) {
                    element.className += " hide";
                } else if (element.dataset.food) {
                    element.classList.remove("hide");
                }
            });
        }

        function currentBtn(e) {
            lis.forEach(li => {
                li.classList.remove("current");
                e.target.classList.add("current")
            });
        }

        function renderClick(e) {
            filterCardapio(e);
            currentBtn(e);
        }

        filterBtns.forEach((filterBtn => filterBtn.addEventListener("click", renderClick)));
    })();
};


    // Declare portfolio Carousel jquery object
    var owl = $('.product-carousel');
    if(owl.length) {
    // Carousel initialization
    owl.owlCarousel({
        rtl:false,
        loop:false,
        margin:0,
        navSpeed:500,
        nav:false,
        autoplay: true,
        rewind: true,
        items:1,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });
    }
  



    //create tween


    i = 0;
    $('.dots').each(function () {
        TweenMax.to($(this), .5, { y: -6, delay: i * .15, ease: Power1.easeInOut }).yoyo(true).repeat(-1);
        i++;
    });


    var owl = $('.product-carousel');
    if(owl.length) {
    var tlcomments = new TimelineMax({ repeat: -1, yoyo: true });
    tlcomments.from('#comment2', 1.5, { scaleX: 0, opacity: 0, transformOrigin: "0% 0%" }, '-=0.2');
    tlcomments.from('#comment1', 1.5, { scaleX: 0, opacity: 0, transformOrigin: "0% 0%" }, '-=0.2');
    tlcomments.to('#comment', 0.3, { scale: 1.1, transformOrigin: "bottom right", rotation: 2 });
    }


    TweenMax.to('#blue-face', 1, { transformOrigin: "bottom right", rotation: 10, ease: Power0.easeNone }).yoyo(true).repeat(-1);
    TweenMax.to('#right-hand', 0.6, { transformOrigin: "bottom right", rotation: 10, ease: Power0.easeNone }).yoyo(true).repeat(-1);


    TweenMax.to('#blue-face', 1.5, { transformOrigin: "bottom right", rotation: 10, ease: Power0.easeNone }).yoyo(true).repeat(-1);



    TweenMax.to('#triangle1', 8, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);
    TweenMax.to('#triangle2', 7, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);
    TweenMax.to('#triangle3', 9, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);

    TweenMax.to('#Rectangle1', 8, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);
    TweenMax.to('#Rectangle2', 9, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);

    TweenMax.to('#circle1', 5, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(false).repeat(-1);
    TweenMax.to('#circle2', 5, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(false).repeat(-1);

    TweenMax.to('#cross1', 5, { transformOrigin: "center center", rotation: 360, ease: Power0.easeNone }).yoyo(true).repeat(-1);

    TweenMax.to("#cross2", 8, { rotation: 360, repeat: -1, transformOrigin: "50% 50%", ease: Linear.easeNone }).yoyo(true);



});

