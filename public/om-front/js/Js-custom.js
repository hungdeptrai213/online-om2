
// $(document).ready(function () {
//     $('.hover-1').hover(
//         function () {
//             var container = $(this).closest(".hover-1-container");
//             var content = container.find(".hover-1");
//             $(this).addClass('border rounded-5'); // when mouse enters
//         },
//         function () {
//             var container = $(this).closest(".hover-1-container");
//             var content = container.find(".hover-1");
//             $(this).removeClass('border rounded-5'); // when mouse leaves
//         }
//     );
// });

// $(document).ready(function () {
//     $('.hover-1').hover(
//         function () {
//             var container = $(this).closest(".hover-1-container");
//             var content = container.find(".hover-1::after");
//             $(this).addClass('border rounded-5'); // when mouse enters
//         },
//         function () {
//             var container = $(this).closest(".hover-1-container");
//             var content = container.find(".hover-1::after");
//             $(this).removeClass('border rounded-5'); // when mouse leaves
//         }
//     );
// });

$(document).ready(function () {
    $(".has-tooltip").each(function () {
        const tooltip = $(this).find(".my-tooltip");

        $(this).on("mousemove", function (e) {
            const padding = 15;

            const tooltipWidth  = tooltip.outerWidth();
            const tooltipHeight = tooltip.outerHeight();

            const viewportW = $(window).width();
            const viewportH = $(window).height();

            let x = e.clientX + padding;
            let y = e.clientY + padding;

            // If tooltip exceeds right edge, place it on the left
            if (x + tooltipWidth > viewportW) {
                x = e.clientX - tooltipWidth - padding;
            }

            // If tooltip exceeds bottom edge, move it above
            if (y + tooltipHeight > viewportH) {
                y = e.clientY - tooltipHeight - padding;
            }

            tooltip.css({
                left: x,
                top: y,
                opacity: 1
            });
        });

        $(this).on("mouseleave", function () {
            tooltip.css("opacity", 0);
        });
    });
});

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function (e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function (e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);

// $(document).ready(function () {
//   $('.dropdown-el').click(function (e) {
//     e.preventDefault();
//     e.stopPropagation();
//     $(this).toggleClass('expanded');
//     $('#' + $(e.target).attr('for')).prop('checked', true);
//   });
//   $(document).click(function () {
//     $('.dropdown-el').removeClass('expanded');
//   });
// });

// $(document).ready(function () {
//     $('.card-run').owlCarousel({
//         // loop: true,
//         margin: 20,
//         slideTransition: 'linear',
//         responsive: {
//             0: {
//                 items: 1
//             },
//             600: {
//                 items: 3
//             },
//             1000: {
//                 items: 5
//             }
//         }
//     })
// });

// $(document).ready(function () {
//     $('.word-run').owlCarousel({
//         // loop: true,
//         margin: 55,
//         slideTransition: 'linear',
//         autoWidth: true,
//         responsive: {
//             0: {
//                 items: 1
//             },
//             600: {
//                 items: 3
//             },
//             1000: {
//                 items: 5
//             }
//         }
//     })
// });

$(document).ready(function() {
    $('.word-run').owlCarousel({
    loop: true,
    items: 6,
    autoplay: true,
    slideTransition: 'linear',
    autoplaySpeed: 6000,
    smartSpeed: 6000,
    // center: true,
    autoWidth: true,
    margin: 50,
    dots: false,
    });


    $('.word-run').trigger('play.owl.autoplay',[1000]);

    function setSpeed(){
        $('.word-run').trigger('play.owl.autoplay',[6000]);
    }

    setTimeout(setSpeed, 1000);
});

$(document).ready(function () {
    $('.card-run-2').owlCarousel({
        loop: true,
        margin: 20,
        slideTransition: 'linear',
        // center: true,
        
        responsive: {
            0: {
                items: 1
            },
            750: {
                items: 2
            },
            1000: {
                items: 3
            },
            1500: {
                items: 6
            }
            
        }
    })
});



$(document).ready(function () {
    $(window).scroll(function () {
  var vitribody = $(window).scrollTop();

  $('.custom-bg').each(function () {
    var vitrigiaodien = $(this).offset().top;

    vitrigiaodien = vitrigiaodien - 250;

    if (vitribody >= vitrigiaodien) {
      $(this).find('a').addClass('show-bg');
    } else {
      $(this).find('a').removeClass('show-bg');
    }
  });
});
});

$(document).ready(function () {
    $(window).scroll(function () {
  var vitribody = $(window).scrollTop();

  
    // var vitrigiaodien = $('.navbar').offset().top;

    // vitrigiaodien = vitrigiaodien + 250;

    if (vitribody > 200) {
      $('.big-logo').addClass('small-nav-cus');
      $('.non-e-learning-nav .nav-link').addClass('fs-2');
      $('.e-learning-nav .nav-link').addClass('fs-4');
      $('.two-button a').addClass('p-xl-2 px-xl-3');
      $('.two-button a').removeClass('p-xl-4 p-lg-3');

    } 
    if (vitribody < 100) {

      $('.big-logo').removeClass('small-nav-cus');
      $('.non-e-learning-nav .nav-link').removeClass('fs-2');
      $('.e-learning-nav .nav-link').removeClass('fs-4');
      $('.two-button a').removeClass('p-xl-2 px-xl-3');
      $('.two-button a').addClass('p-xl-4 p-lg-3');

    } 
});
});



// $(document).ready(function() {
//   $('.rotate-item').hover(
//     function() {
//       $(this).css({
//         'animation': 'spin 1s linear infinite'
//       });
//     },
//     function() {
//       $(this).css({
//         'animation': 'none'
//       });
//     }
//   );
// });

// $(document).ready(function () {
//     $('.rotate-item').hover(function () {
//         $(this).addClass('spinning');
//     });

//     $('.rotate-item').mouseleave(function () {
//         $(this).removeClass('spinning');
//     });
// });

// $(document).ready(function() {
//   $('.rotate-item').hover(
//     function() {
//       $(this).css({
//         'transform': 'rotate(360deg)',
//         'transition': 'transform 0.6s ease'
//       });
//     },
//     function() {
//       $(this).css({
//         'transform': 'rotate(0deg)',
//         'transition': 'transform 0.6s ease'
//       });
//     }
//   );
// });




$(document).ready(function () {
    $(window).scroll(function () {
  $(function() {

    var owl = $('.slide-one-item');

    $('.slide-one-item').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        smartSpeed: 1500,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ['<span class="material-symbols-outlined text-black rounded-circle p-1 shadow-sm">keyboard_arrow_left</span>', '<span class="material-symbols-outlined text-black rounded-circle p-1 shadow-sm">keyboard_arrow_right</span>']
    });

    $('.thumbnail li').each(function(slide_index){
        $(this).click(function(e) {
            owl.trigger('to.owl.carousel',[slide_index,500]);
            e.preventDefault();
        })
    })

    owl.on('changed.owl.carousel', function(event) {
        $('.thumbnail li').removeClass('active');
        $('.thumbnail li').eq(event.item.index - 3).addClass('active');
    })
})
});
});

const swiper = new Swiper('.swiper', {
  freeMode: true,
loop: true,
allowTouchMove: false,
autoplay: {
delay: 0,
disableOnInteraction: false,
},
slidesPerView: 5.5,
spaceBetween: 32,
speed: 10000,
});


$(document).ready(function () {
    const elem = $('.rotate-item');
    let angle = 0;
    let spinning = true;

    function spin() {
        if (spinning) {
            angle = (angle + 0.5) % 360; // speed
            elem.css('transform', `rotate(${angle}deg)`);
        }
        requestAnimationFrame(spin);
    }

    // Start animation loop
    spin();

    // Pause on hover
    elem.on('mouseenter', function () {
        spinning = false;
    });

    // Resume from same angle
    elem.on('mouseleave', function () {
        spinning = true;
    });
});

// $(document).ready(function() {
//     $(".read-more-btn").click(function() {
//         var container = $(this).closest(".text-group"); 
//         var content = container.find(".more-content"); 
        
//        $(".more-content").not(content).slideUp(); 
//        $(".read-more-btn").not(this).text("Hiện thêm");
//        content.slideToggle();
//         $(this).text($(this).text() === "Hiện thêm" ? "Ẩn bớt" : "Hiện thêm");
//     });

    
//      $(".toggle-icon").click(function() {
//         var container = $(this).closest(".text-group");
//         var content = container.find(".more-content");

   
//         $(".more-content").not(content).slideUp();
//         $(".toggle-icon").not(this).removeClass("icon-rotated"); 

//         content.slideToggle(); // Toggle visibility of clicked section
//         $(this).toggleClass("icon-rotated"); 
//     });
// });

$(document).ready(function() {
    $(".read-more-btn").click(function() {
        $(".more-content").slideToggle();
        $(".read-more-btn span").text($('.read-more-btn span').text() === "Xem tất cả" ? "Thu gọn" : "Xem tất cả");
        $(".toggle-icon").toggleClass("icon-rotated"); 
    });
});




$(document).ready(function () {

  const mainNav   = $("#mainNav");
  const searchBar = $("#searchBar");

  // Click 🔍 → show search bar
  $("#openSearch").on("click", function (e) {
    e.stopPropagation();
    mainNav.addClass("d-none");
    searchBar.removeClass("d-none");
    searchBar.find("input").focus();
  });

  // Click outside → restore navbar
  $(document).on("click", function (e) {
    if (!searchBar.is(e.target) && searchBar.has(e.target).length === 0) {
      searchBar.addClass("d-none");
      mainNav.removeClass("d-none");
    }
  });

  // Prevent search click from triggering outside close
  searchBar.on("click", function (e) {
    e.stopPropagation();
  });

});

$(".scroll-btn").on("click", function () {
  // scroll to the clicked button itself
  $("html, body").animate(
    {
      scrollTop: $(this).offset().top + 60
    },
    400
  );
});