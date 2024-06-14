prevScrollpos = window.pageYOffset;
let transformCount = 0;

const prepareAnimations = () => {
   $(".animate").each(function (i) {
      let deviceWindowHeight = window.innerHeight;
      let bottom_of_object = $(this).offset().top + $(this).outerHeight();
      let bottom_of_window = $(window).scrollTop() + $(window).height();

      let sectionHeight40Percents =
         $(this).offset().top + $(this).outerHeight() * 0.4;
      let scrollTop = $(window).scrollTop();
      let elementOffset = $(this).offset().top;
      let distance = elementOffset - scrollTop;
      // console.log(distance, deviceWindowHeight)
      if ($(this).hasClass("animate-early")) {
         if (distance < deviceWindowHeight * 1.1) {
            $(this).addClass("active");
         }
      } else if ($(this).hasClass("animate-late")) {
         if (distance < deviceWindowHeight * 0.3) {
            $(this).addClass("active");
         }
      } else {
         if (distance < deviceWindowHeight * 0.8) {
            $(this).addClass("active");
         }
      }
   });

   $(".header-scroll").each(function (i) {
      let deviceWindowHeight = window.innerHeight;
      let top_of_object = $(this).offset().top;
      let bottom_of_window = $(window).scrollTop() + $(window).height();

      let sectionHeight40Percents =
         $(this).offset().top + $(this).outerHeight() * 0.4;
      let scrollTop = $(window).scrollTop();
      let elementOffset = $(this).offset().top;
      let distance = elementOffset - scrollTop;
      console.log(distance);
      if (distance < 30) {
         $(".main-part__logo").addClass("active");
         $(".main-part__inner").addClass("active");
         $(".header-desktop__products-menu").addClass("scrolled");
         // console.log('makarena')
      } else {
         $(".main-part__logo").removeClass("active");
         $(".main-part__inner").removeClass("active");
         $(".header-desktop__products-menu").removeClass("scrolled");
      }
   });
};

const doAnimations = () => {
   $(".animate-called").each(function (i) {
      let deviceWindowHeight = window.innerHeight;
      let bottom_of_object = $(this).offset().top + $(this).outerHeight();
      let bottom_of_window = $(window).scrollTop() + $(window).height();

      let sectionHeight40Percents =
         $(this).offset().top + $(this).outerHeight() * 0.4;
      let scrollTop = $(window).scrollTop();
      let elementOffset = $(this).offset().top;
      let distance = elementOffset - scrollTop;
      // console.log(distance, deviceWindowHeight)
      if ($(this).hasClass("animate-early")) {
         if (distance < deviceWindowHeight * 1.1) {
            $(this).addClass("active");
         }
      } else if ($(this).hasClass("animate-late")) {
         if (distance < deviceWindowHeight * 0.3) {
            $(this).addClass("active");
         }
      } else {
         if (distance < deviceWindowHeight * 0.8) {
            $(this).addClass("active");
         }
      }
   });
};

$(window).scroll(function () {
   prepareAnimations();
});

$(document).ready(function () {
   prepareAnimations();
});
