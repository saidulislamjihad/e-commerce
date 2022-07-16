// Navbar Submenu Make Collapse In Mini Device
$(window).on('load', function() {
    if ($(window).width() <= 600) {
        $('.nav-item-mega-menu').addClass('collapse');
    } else {
        $('.nav-item-mega-menu').removeClass('collapse');
    }
});
$(window).on('resize', function() {
    if ($(window).width() <= 830) {
        $('.nav-item-mega-menu').addClass('collapse');
    } else {
        $('.nav-item-mega-menu').removeClass('collapse');
    }
    if ($(window).width() >= 830) {
        $('body').removeClass('body-overflow');
    }
});
// $(window).on('load', function() {
//     if ($(window).width() <= 450) {
//         $('.home-category-wrapper').addClass('home-category-show');
//     } else {
//         $('.home-category-wrapper').removeClass('home-category-show');
//     }
// });
// $(window).on('resize', function() {
//     if ($(window).width() <= 830) {
//         $('.nav-item-mega-menu').addClass('collapse');
//     } else {
//         $('.nav-item-mega-menu').removeClass('collapse');
//     }
//     if ($(window).width() >= 830) {
//         $('body').removeClass('body-overflow');
//     }
// });
// Navbar Toggle Button For Mini Device
$(".main-nav-item-link").click(function(e) {
    if ($(window).width() <= 830) {
        e.preventDefault();
        $(this).parent().find(".collapse").collapse('toggle');
    }
});
// My Account Dropdown show hide js
$(document).ready(function(e) {
    $(".supplier-profile-outer").click(function() {
        $(".supplier-right-items-wrapper").toggleClass("show");
    });
});
$(document).ready(function(e) {
    $(".category-title.header-center").click(function(e) {
        e.stopPropagation();
        $(".header-center-sidebar-main-nav-wrapper").toggleClass("show");
    });
});

$(document).on("click", function(e) {
    e.stopPropagation();
    $(".supplier-right-items-wrapper").removeClass("show");
});
$(".supplier-profile-outer").on("click", function(e) {
    e.stopPropagation();
});
//Toggle Sidebar menu js 
$(document).ready(function() {
    $(".nav-toggle-btn").click(function(e) {
        e.stopPropagation();
        $(".header-bottom-left").toggleClass("menu-visible");
    });
});

$(document).on("click", function(e) {
    e.stopPropagation();
    $(".header-bottom-left").removeClass("menu-visible");
});
$(".header-bottom-left").on("click", function(e) {
    e.stopPropagation();
});


// Home Slider js
var owlOne = $('.home-slider-items-wrapper').owlCarousel({
    loop: true,
    center: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 1,
            nav: true
        },
        1000: {
            items: 1,
            nav: true,
            loop: true,
            margin: 0
        }
    },
    autoplay: true,
    smartSpeed: 1000,
    autoplayHoverPause: true,
    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
});

// Add to cart now btn
$(".marquee").on("mouseover", function(e) {
    $(this).marquee("toggle");
});

// Product Slider js
var owlTwo = $('.product-slider-items-wrapper').owlCarousel({
    loop: true,
    center: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 3,
            nav: false,
            loop: true,
            margin: 0
        }
    },
    autoplay: true,
    autoplayTimeout: 2000,
    smartSpeed: 1000,
    autoplayHoverPause: true,
    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
});

// Company Slider js
var owlThree = $('.company-slider-items-wrapper').owlCarousel({
    loop: true,
    center: true,
    margin: 0,
    items: 6,
    autoplay: true,
    autoplayTimeout: 2000,
    smartSpeed: 1000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        991: {
            items: 3,
            nav: false,
            loop: false,
            margin: 0
        },
        1000: {
            items: 5,
            nav: false,
            loop: true,
            margin: 0
        },
        1920: {
            items: 5,
            nav: false,
            loop: true,
            margin: 0
        }
    },
    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
});

// Related product Slider js
var owlFour = $('.related-product-items-wrapper').owlCarousel({
    loop: true,
    center: true,
    margin: 20,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: false,
            loop: true,
        }
    },
    autoplay: true,
    autoplayTimeout: 2000,
    smartSpeed: 1000,
    autoplayHoverPause: true,
    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
});


// Cart show hide btn
$(document).ready(function() {
    $(".cart-show-hide-btn").click(function() {
        $(".shopping-cart").toggleClass("visible");
        $(".add-cart-outer").toggleClass("visible");
        $("main").toggleClass("cart-visible");

        owlOne.trigger('refresh.owl.carousel');
        owlTwo.trigger('refresh.owl.carousel');
        owlThree.trigger('refresh.owl.carousel');
        owlFour.trigger('refresh.owl.carousel');
    });
});

// Scroll top
$(window).on('scroll', function() {
    if ($(this).scrollTop() > 1) {
        $('.scroll-back-top').css({
            bottom: "20px"
        });
    } else {
        $('.scroll-back-top').css({
            bottom: "-100px"
        });
    }
});
$('.scroll-back-top').on('click', function(event) {
    event.preventDefault();
    $('html , body').animate({
        scrollTop: 0,
    }, 1500);
});

// Product item increment and decrement
let count = 1;

function increment(e) {
    if (count <= 10) {
        document.getElementById('qty').value = count++;
    }
}

function decrement(e) {
    if (count >= 1) {
        document.getElementById('qty').value = count--;
    }
}

// Product Details Image Slider
const imgs = document.querySelectorAll('.img-select a');
if (imgs.length) {
    const imgBtns = [...imgs];
    let imgId = 1;
    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
}


// Html Step form js

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    if (x.length) {
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    if (x.length) {
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

// Dashboard Pagination
window.onload = function() {
    var paginationPage = parseInt($('.cdp').attr('actpage'), 10);
    $('.cdp_i').on('click', function() {
        var go = $(this).attr('href').replace('#!', '');
        if (go === '+1') {
            paginationPage++;
        } else if (go === '-1') {
            paginationPage--;
        } else {
            paginationPage = parseInt(go, 10);
        }
        $('.cdp').attr('actpage', paginationPage);
    });
};

// Inspact off js
// document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }
// document.addEventListener('contextmenu', function(e) {
//   e.preventDefault();
// });