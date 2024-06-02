var $ = jQuery;
const mediaQueryMax991px = window.matchMedia("(max-width: 991px)");
const mediaQueryMax767px = window.matchMedia("(max-width: 767px)");

// scroll to hash on click
$("a[href*='#']").on("click", function (e) {
   let hrefID = $(this).attr("href").substring(1);
   // console.log();
   if (document.querySelector(`[id="${hrefID}"]`)) {
      document.querySelector(`[id="${hrefID}"]`).click();
   }

   e.preventDefault();
   var $self = $(this);

   if ($("#" + $self.attr("href").split("#").pop()).length) {
      $("html, body").animate({
            scrollTop: $("#" + $self.attr("href").split("#").pop()).offset().top - 140,
         },
         500
      );
   } else {
      window.location = window.location.origin + $(this).attr("href");
   }
});

// scroll to hash if in url
$(document).ready(function () {
   if (window.location.hash && $(window.location.hash)) {
      let hrefID = window.location.hash.substring(1);

      if (document.querySelector(`[id="${hrefID}"]`)) {
         document.querySelector(`[id="${hrefID}"]`).click();
      }

      window.setTimeout(function () {
         $("html, body").animate({
               scrollTop: $(window.location.hash).offset().top - 140,
            },
            2000
         );
      }, 250);
   }
});

// https://stackoverflow.com/questions/17134823/detect-element-style-changes-with-javascript

const Observe = (sel, opt, cb) => {
   const Obs = new MutationObserver((m) => [...m].forEach(cb));
   document.querySelectorAll(sel).forEach((el) => Obs.observe(el, opt));
};

// Observe(".wppopups-whole", {
//     attributesList: ["style"], // Only the "style" attribute
//     attributeOldValue: true, // Report also the oldValue
// }, (m) => {
//     console.log(m); // Mutation object
// });

const loadVideo = () => {
   $(function () {
      $("video source").each(function () {
         var sourceFile = $(this).attr("data-src");
         $(this).attr("src", sourceFile);
         var video = this.parentElement;
         video.load();
         video.play();
      });
   });
};

if (document.querySelector("video")) {
   //lazyLoadVideo();
   $(document).ready(function () {
      loadVideo();
   });
}

const homeIntroSliderInit = () => {
   document.addEventListener("DOMContentLoaded", function () {
      var homeIntroSlider = new Splide(".splide.intro__splide", {
         type: "fade",
         perPage: 1,
         rewind: true,
         speed: 1500,
         pagination: true,
         arrows: false,
         autoplay: true,
         // autoplay: true,
         // interval: 5000,
         arrows: false,
         pagination: {
            el: ".intro__pagination",
         },
      });
      homeIntroSlider.mount();
   });
};

if (document.body.classList.contains("page-template-home")) {
   homeIntroSliderInit();
}

const aboutUsIntroSliderInit = () => {
   document.addEventListener("DOMContentLoaded", function () {
      var aboutUsIntroSlider = new Splide(".splide.intro__splide", {
         type: "fade",
         perPage: 1,
         rewind: true,
         speed: 1500,
         pagination: true,
         arrows: false,
         autoplay: true,
         // autoplay: true,
         // interval: 5000,
         arrows: false,
         pagination: {
            el: ".intro__pagination",
         },
      });
      aboutUsIntroSlider.mount();
   });
};

if (document.body.classList.contains("page-template-about-us")) {
   aboutUsIntroSliderInit();
}





const showRestCategories = () => {
   const button = document.querySelector('.cat-selector__menu-activator');

   const overlay = document.querySelector('.cat-selector__menu');
   const buttonContainer = document.querySelector('.cat-selector__menu-inside');
   const exitButton = document.querySelector('.cat-selector__close-button');
   const activeCategory = document.querySelector('.cat-selector__menu-item-link.active-category');
   const visibleClass = 'visible-menu';

   button.addEventListener('click', () => {
      overlay.classList.toggle(visibleClass);
      buttonContainer.classList.toggle(visibleClass);
   })
   exitButton.addEventListener('click', () => {
      overlay.classList.remove(visibleClass);
      buttonContainer.classList.remove(visibleClass);
   })
   activeCategory.addEventListener('click', (e) => {
      e.preventDefault();
      overlay.classList.remove(visibleClass);
      buttonContainer.classList.remove(visibleClass);
   })



}



if (document.body.classList.contains("page-template-product-category")) {
   showRestCategories();
}

const productSliderInit = () => {



   const productSlider = new Splide(".splide.product-content__left-photos-inside", {
      type: "fade",
      perPage: 1,
      rewind: true,
      // speed: 1500,
      pagination: false,
      arrows: false,
      drag: false,
      // autoplay: true,
      // autoplay: true,
      // interval: 5000,
      // arrows: false,
      // isNavigation: true,

   });
   productSlider.mount();

   const listOfSlides = document.querySelectorAll('.product-content__left-photos-slide');
   listOfSlides.forEach(slide => {
      slide.addEventListener('click', function () {
         productSlider.go(parseInt(slide.dataset.index));
         // console.log('slide index = ');
         // console.log(slide.dataset.index);
         // console.log(parseInt(slide.dataset.index));
      })
   });

};
const clickingInteraction = () => {



   const thumbImages = document.querySelectorAll('.product-content__right-variant-images-item');
   const activeThumbClass = 'chosen-item';

   function clearThumbs() {
      thumbImages.forEach(imgBlock => {
         if (imgBlock.classList.contains(activeThumbClass)) {
            imgBlock.classList.remove(activeThumbClass);
         }
      });
   }
   const sizeSets = document.querySelectorAll('.product-content__right-variant-sizes-set');
   const sizeSetActiveClass = 'active-pick';


   const allSizeBlocks = document.querySelectorAll('.product-content__right-variant-sizes-set-block');
   const activeSizeBlockClass = 'chosen-size';


   function clearVisibleSizeSets() {
      sizeSets.forEach(eachSet => {
         if (eachSet.classList.contains(sizeSetActiveClass)) {
            eachSet.classList.remove(sizeSetActiveClass);
         }
      });
   }

   function clearAllSizeBlocks() {
      allSizeBlocks.forEach(eachBlock => {
         if (eachBlock.classList.contains(activeSizeBlockClass)) {
            eachBlock.classList.remove(activeSizeBlockClass);
         }
      });
   }

   allSizeBlocks.forEach(block => {
      block.addEventListener('click', () => {
         if (document.querySelector('.product-content__right-variant-sizes-set-block.chosen-size') != null) {
            document.querySelector('.product-content__right-variant-sizes-set-block.chosen-size').classList.remove('chosen-size');
         }
         block.classList.add('chosen-size');
         updateForm();
      })

   })
   const patternValueBox = document.querySelector('.product-content__right-variant-pattern-value');
   const colorValueBox = document.querySelector('.product-content__right-variant-color-value');


   thumbImages.forEach(imgBlock => {
      imgBlock.addEventListener('click', function () {
         //activates the proper thumbnail
         clearThumbs();
         imgBlock.classList.add(activeThumbClass);
         let blockSlugColor = imgBlock.dataset.colorSlug;

         //click the proper slide (slide changes beacause of event listener)
         if (document.querySelector(`.product-content__left-photos-slide[data-color-slug="${blockSlugColor}"]`) != null) {
            document.querySelector(`.product-content__left-photos-slide[data-color-slug="${blockSlugColor}"]`).click();
         } else {
            console.log('blockSlugColor');
            console.log(blockSlugColor);
         }

         //clear all chosen sizes
         clearVisibleSizeSets();
         // make the proper set of sizes visible
         if (document.querySelector(`.product-content__right-variant-sizes-set[data-color-slug="${blockSlugColor}"]`) != null) {
            let activeSizeSet = document.querySelector(`.product-content__right-variant-sizes-set[data-color-slug="${blockSlugColor}"]`);
            activeSizeSet.classList.add(sizeSetActiveClass);

            //choose add the visible class to first item of set
            clearAllSizeBlocks();
            activeSizeSet.querySelector(`.product-content__right-variant-sizes-set-block`).classList.add(activeSizeBlockClass);
         }

         if (imgBlock.dataset.patternName != '' && imgBlock.dataset.patternName != ' ') {
            patternValueBox.innerText = imgBlock.dataset.patternName;
         } else {
            patternValueBox.innerText = 'Brak';
         }
         colorValueBox.innerText = imgBlock.dataset.colorName;

         updateForm();
      });

   });


   function updateForm() {
      const nameFormField = document.querySelector('.form__input-container[data-input-name="product-name"] textarea');
      const patternFormField = document.querySelector('.form__input-container[data-input-name="product-pattern"] textarea');
      const colorFormField = document.querySelector('.form__input-container[data-input-name="product-color"] textarea');
      const sizeFormField = document.querySelector('.form__input-container[data-input-name="product-size"] textarea');

      let productNameContainer = document.querySelector('.product-content__right-heading-headline');
      let activeThumb = document.querySelector('.product-content__right-variant-images-item.chosen-item');
      let activeSize = document.querySelector('.product-content__right-variant-sizes-set-block.chosen-size');

      nameFormField.value = productNameContainer.innerText;
      patternFormField.value = activeThumb.dataset.patternName;
      colorFormField.value = activeThumb.dataset.colorName;
      sizeFormField.value = activeSize.innerText;

      // console.log('nameFormField.value: ' + nameFormField.value)
      // console.log('productNameContainer.innerText: ' + productNameContainer.innerText)
      // console.log(nameFormField.value == productNameContainer.innerText);
      // console.log('-------');
      // console.log('patternFormField.value: ' + patternFormField.value)
      // console.log('activeThumb.dataset.patternName: ' + activeThumb.dataset.patternName)
      // console.log(patternFormField.value == activeThumb.dataset.patternName);
      // console.log('-------');
      // console.log('colorFormField.value: ' + colorFormField.value)
      // console.log('activeThumb.dataset.colorName: ' + activeThumb.dataset.colorName)
      // console.log(colorFormField.value == activeThumb.dataset.colorName);
      // console.log('-------');
      // console.log('sizeFormField.value: ' + sizeFormField.value)
      // console.log('activeSize.innerText: ' + activeSize.innerText)
      // console.log(sizeFormField.value == activeSize.innerText);
      // console.log('-------');

   }


}


const initURLParamClick = () => {
   const queryString = window.location.search;
   const urlParams = new URLSearchParams(queryString);
   const chosenColor = urlParams.get('color');

   if (document.querySelector(`.product-content__right-variant-images-item[data-color-slug="${chosenColor}"]`) != null) {
      document.querySelector(`.product-content__right-variant-images-item[data-color-slug="${chosenColor}"]`).click();
   } else {
      document.querySelector('.product-content__right-variant-images-item').click();
   }
}

const scrollToForm = () => {
   const scrollButton = document.querySelector('.product-content__right-button');
   // const desktopFormContainer = document.querySelector('#desktop_form');

   scrollButton.addEventListener('click', () => {
      document.querySelector('#desktop_form').classList.add('active-form');
   });
}


const moveFormOnResize = () => {
   let mobile = window.matchMedia('(max-width:991px)');
   let desktop = window.matchMedia('(min-width:992px)');

   const beforeDesktop = document.querySelector(".product-content__left-desc-container");
   const beforeMobile = document.querySelector(".product-content__right-prod-desc-container");

   let toMobile = false;

   const desktopForm = document.querySelector("#desktop_form");
   const mobileForm = document.querySelector("#mobile_form");

   let cloneDesktop = desktopForm.cloneNode(true);
   let cloneMobile = mobileForm.cloneNode(true);

   if (mobile.matches && toMobile === false) {

      beforeMobile.nextElementSibling.replaceWith(cloneDesktop.cloneNode(true));
      beforeDesktop.nextElementSibling.replaceWith(cloneMobile.cloneNode(true));

      toMobile = true;
      console.log('swapped to mobile')
      // console.log('mobilka here');
   } else {
      if (desktop.matches && toMobile === true) {

         beforeDesktop.nextElementSibling.replaceWith(cloneDesktop.cloneNode(true));
         beforeMobile.nextElementSibling.replaceWith(cloneMobile.cloneNode(true));

         toMobile = false;
         console.log('swapped to desktop')

      }

   }

   window.addEventListener('resize', function () {
      if (mobile.matches && toMobile === false) {

         beforeMobile.nextElementSibling.replaceWith(cloneDesktop.cloneNode(true));
         beforeDesktop.nextElementSibling.replaceWith(cloneMobile.cloneNode(true));

         toMobile = true;
         console.log('swapped to mobile')
         // console.log('mobilka here');
      } else {
         if (desktop.matches && toMobile === true) {

            beforeDesktop.nextElementSibling.replaceWith(cloneDesktop.cloneNode(true));
            beforeMobile.nextElementSibling.replaceWith(cloneMobile.cloneNode(true));

            toMobile = false;
            console.log('swapped to desktop')

         }

      }
   })




};



if (document.body.classList.contains("page-template-product")) {

   document.addEventListener("DOMContentLoaded", function () {

      productSliderInit();
      clickingInteraction();
      initURLParamClick();
      scrollToForm();
      moveFormOnResize();
   });


}