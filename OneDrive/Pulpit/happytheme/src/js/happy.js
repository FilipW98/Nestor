var $ = jQuery;
const mediaQueryMax991px = window.matchMedia('(max-width: 991px)');
const mediaQueryMax767px = window.matchMedia('(max-width: 767px)');

// scroll to hash on click

$("a[href*='#']").on('click', function (e) {
    let hrefID = $(this).attr('href').substring(1);

    if (document.querySelector(`[id="${hrefID}"]`)) {
        document.querySelector(`[id="${hrefID}"]`).click();
    }

    e.preventDefault();

    var $self = $(this);

    if ($('#' + $self.attr('href').split('#').pop()).length) {
        $('html, body').animate({
                scrollTop: $('#' + $self.attr('href').split('#').pop()).offset().top - 140,
            },

            500
        );
    } else {
        window.location = window.location.origin + $(this).attr('href');
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
            $('html, body').animate({
                    scrollTop: $(window.location.hash).offset().top - 140,
                },

                2000
            );
        }, 250);
    }
});

// https://stackoverflow.com/questions/17134823/detect-element-style-changes-with-javascript

const Observe = (sel, opt, cb) => {
    const Obs = new MutationObserver(m => [...m].forEach(cb));

    document.querySelectorAll(sel).forEach(el => Obs.observe(el, opt));
};

// Observe(".wppopups-whole", {

//     attributesList: ["style"], // Only the "style" attribute

//     attributeOldValue: true, // Report also the oldValue

// }, (m) => {

// });

const makingArrowForMenu = () => {
    const linksWithChilds = document.querySelectorAll('.navigation-desktop__menu li.menu-item-has-children');
    let linkArrows;

    /* adding span with arrow for menu elements that have children */

    for (let i = 0; i < linksWithChilds.length; i++) {
        const arrow = document.createElement('span');

        arrow.innerHTML = `<img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/chevron-down.svg" alt=">" />`;

        arrow.classList.add('navigation-desktop__menu-activator');

        linksWithChilds[i].insertBefore(arrow, linksWithChilds[i].childNodes[2]);
    }
};

makingArrowForMenu();

// };

const formNegativeValidation = () => {
    $('.form-validation .form__input-container').each(function () {
        let $thisContainer = $(this);

        $(this).on('DOMNodeInserted', function (e) {
            console.log(e.target, $(this), $(this).find('.wpcf7-not-valid-tip').length !== 0); // the new element
            $eeeemakarena = $thisContainer;

            if ($thisContainer.find('.wpcf7-not-valid-tip').length !== 0) {
                $thisContainer.addClass('not-validated');
            }
            if ($thisContainer.hasClass('.validated')) {
                $thisContainer.removeClass('not-validated');
            }
        });

        $(this).on('DOMNodeRemoved', function (e) {
            $eeeemakarena = $thisContainer;
            if (!$thisContainer.find('.wpcf7-not-valid-tip').length !== 0) {
                $thisContainer.removeClass('not-validated');
            }
            if ($thisContainer.hasClass('.validated')) {
                $thisContainer.removeClass('not-validated');
            }
        });

        $(this)
            .find('input, textarea')
            .on('input', function () {
                if ($thisContainer.hasClass('validated')) {
                    $thisContainer.removeClass('not-validated');
                }
            });
    });
};

const formValidationHandler = () => {
    const section = document.querySelector('.contact-form');

    const name = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"] input');
    const nameHolder = section.querySelector('.form__input-container [data-input-name="imie-i-nazwisko"]');

    const email = section.querySelector('.form-validation [data-input-name="email"] input');
    const emailHolder = section.querySelector('.form__input-container [data-input-name="email"]');

    const number = section.querySelector('.form-validation [data-input-name="tel"] input');
    const numberHolder = section.querySelector('.form-validation [data-input-name="tel"]');

    const question = section.querySelector('.form-validation [data-input-name="text-content"] textarea');
    const questionHolder = section.querySelector('.form-validation [data-input-name="text-content"]');

    let nameState = false;
    let emailState = false;
    let numberState = false;
    let questionState = false;

    section.querySelectorAll('.form__input-container').forEach(el => {
        el.classList.remove('validated');
    });

    const sendButton = document.querySelector('.form__send');

    name.value = '';
    email.value = '';
    number.value = '';
    question.value = '';

    const validateEmail = email => {
        var regex =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    };

    if (nameHolder) {
        if (name.value != '') {
            // nameHolder.classList.add('validated');
            name.classList.add('validated');
            nameState = true;
        }
    } else {
        nameState = true;
    }

    if (emailHolder) {
        if (validateEmail(email.value)) {
            email.classList.add('validated');
            emailState = true;
        }
    } else {
        emailState = true;
    }

    if (numberHolder) {
        if (number.value != '') {
            telefonNumber = parseInt(number.value);
        }
    } else {
        numberState = false;
    }

    if (questionHolder) {
        if (question.value != '') {
            questionHolder.classList.add('validated');
            questionState = true;
        }
    } else {
        questionState = true;
    }

    var options = {
        onComplete: function (cep) {
            // console.log('CEP Completed!:' + cep);
            numberHolder.classList.add('validated');
            numberState = true;
            console.log('complete');
            // checkValidation();
        },
        onKeyPress: function (cep, event, currentField, options) {
            if (number.value.length > 14) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }

            // console.log('keypress')
            // checkValidation();
        },
        onChange: function (cep) {
            if (number.value.length > 14) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }
            // numberHolder.classList.remove('validated')
            // numberState = false;
            // console.log('change')
            // checkValidation();
        },
        onInvalid: function (val, e, f, invalid, options) {
            numberHolder.classList.remove('validated');
            numberState = false;
            console.log('invalid');
            // checkValidation();
        },
    };

    jQuery(`.form-validation [data-input-name="telefon"] input`).mask('+99 999-999-999-999-999', options);

    if (nameHolder) {
        name.addEventListener('input', function (e) {
            if (e.target.value != '') {
                // name.classList.add('validated');
                nameHolder.classList.add('validated');
                nameState = true;
                // checkValidation();
            } else {
                nameHolder.classList.remove('validated');
                nameState = false;
                // checkValidation();
            }
        });
    }

    if (emailHolder) {
        email.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (validateEmail(e.target.value)) {
                // email.classList.add('validated');
                // inputBox.classList.add('validated');
                emailHolder.classList.add('validated');
                emailState = true;
                // checkValidation();
            } else {
                emailHolder.classList.remove('validated');
                emailState = false;
                // checkValidation();
            }
        });
    }
    if (questionHolder) {
        question.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (e.target.value != '') {
                questionHolder.classList.add('validated');
                questionState = true;
                // checkValidation();
            } else {
                questionHolder.classList.remove('validated');
                questionState = false;
                // checkValidation();
            }
        });
    } else {
        questionState = true;
    }

    const clearFormAfterSend = () => {
        let wpcf7Elm = document.querySelector('#wpcf7-f471-o1');
        // let wpcf7Elm = document.querySelector('.contact-form__container>div.wpcf7');
        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                nameState = false;
                emailState = false;
                questionState = false;
                numberState = false;
                // subjectState = false;
                // cityState = false;

                document.querySelectorAll('.form__input-container .wpcf7-form-control-wrap').forEach(el => {
                    el.classList.remove('validated');
                    el.classList.remove('not-validated');
                });

                // $('#file-name-container-inner').empty();
            },
            false
        );
    };

    clearFormAfterSend();
    const handleFormSendMessage = () => {
        const messageSentContainer = document.querySelector('.form__message-sent');
        let wpcf7Elm = document.querySelector('.contact-form__container>div.wpcf7');

        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                messageSentContainer.classList.add('active');
                // shadow.classList.add('active');

                setTimeout(() => {
                    messageSentContainer.classList.remove('active');
                }, 4000);
            },
            false
        );
    };

    handleFormSendMessage();
};

const formValidationHandlerContact = () => {
    const section = document.querySelector('.contact-form');

    const name = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"] input');
    const nameHolder = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"]');

    const email = section.querySelector('.form-validation [data-input-name="email"] input');
    const emailHolder = section.querySelector('.form-validation [data-input-name="email"]');

    const question = section.querySelector('.form-validation [data-input-name="text-content"] textarea');
    const questionHolder = section.querySelector('.form-validation [data-input-name="text-content"]');

    const number = document.querySelector('.form-validation [data-input-name="tel"] input');
    const numberHolder = document.querySelector('.form-validation [data-input-name="tel"]');

    let nameState = false;
    let emailState = false;
    let questionState = false;
    let numberState = false;

    section.querySelectorAll('.form__input-container').forEach(el => {
        el.classList.remove('validated');
    });

    name.value = '';
    email.value = '';
    question.value = '';
    number.value = '';

    const sendButton = document.querySelector('.form__send');

    const validateEmail = email => {
        var regex =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    };

    if (nameHolder) {
        if (name.value != '') {
            nameHolder.classList.add('validated');
            nameState = true;
        }
    } else {
        nameState = true;
    }

    if (emailHolder) {
        if (validateEmail(email.value)) {
            emailHolder.classList.add('validated');
            emailState = true;
        }
    } else {
        emailState = true;
    }

    if (questionHolder) {
        if (question.value != '') {
            questionHolder.classList.add('validated');
            questionState = true;
        }
    } else {
        questionState = true;
    }

    if (numberHolder) {
        if (number.value != '') {
            telefonNumber = parseInt(number.value);
        }
    } else {
        numberState = false;
    }

    if (nameHolder) {
        name.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (e.target.value != '') {
                nameHolder.classList.add('validated');
                nameState = true;
                // checkValidation();
            } else {
                nameHolder.classList.remove('validated');
                nameState = false;
                // checkValidation();
            }
        });
    }

    if (emailHolder) {
        email.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (validateEmail(e.target.value)) {
                emailHolder.classList.add('validated');
                emailState = true;
                // checkValidation();
            } else {
                emailHolder.classList.remove('validated');
                emailState = false;
                // checkValidation();
            }
        });
    }
    if (questionHolder) {
        question.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (e.target.value != '') {
                questionHolder.classList.add('validated');
                questionState = true;
                // checkValidation();
            } else {
                questionHolder.classList.remove('validated');
                questionState = false;
                // checkValidation();
            }
        });
    } else {
        questionState = true;
    }

    var options = {
        onComplete: function (cep) {
            // console.log('CEP Completed!:' + cep);
            numberHolder.classList.add('validated');
            numberState = true;
            console.log('complete');
            // checkValidation();
        },
        onKeyPress: function (cep, event, currentField, options) {
            if (number.value.length > 10) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }

            // console.log('keypress')
            // checkValidation();
        },
        onChange: function (cep) {
            if (number.value.length > 14) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }
            // numberHolder.classList.remove('validated')
            // numberState = false;
            // console.log('change')
            // checkValidation();
        },
        onInvalid: function (val, e, f, invalid, options) {
            numberHolder.classList.remove('validated');
            numberState = false;
            console.log('invalid');
            // checkValidation();
        },
    };

    jQuery(`.form-validation [data-input-name="tel"] input`).mask('999-999-999-999-999', options);

    const clearFormAfterSend = () => {
        // let wpcf7Elm = document.querySelector('#wpcf7-f1046-o2');
        let wpcf7Elm = document.querySelector('.contact-form__container>div.wpcf7');

        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                nameState = false;
                emailState = false;
                questionState = false;
                numberState = false;
                // subjectState = false;
                // cityState = false;

                document.querySelectorAll('.form__input-container').forEach(el => {
                    el.classList.remove('validated');
                });
            },
            false
        );
    };
    clearFormAfterSend();
    const handleFormSendMessage = () => {
        const messageSentContainer = document.querySelector('.form__message-sent');
        // var wpcf7Elm = document.querySelector('#wpcf7-f1046-o2');
        let wpcf7Elm = document.querySelector('.contact-form__container>div.wpcf7');

        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                messageSentContainer.classList.add('active');

                setTimeout(() => {
                    messageSentContainer.classList.remove('active');
                }, 4000);
            },
            false
        );
    };
    handleFormSendMessage();
};

if (document.body.classList.contains('page-template-contact')) {
    formNegativeValidation();
    // formValidationHandler();
    formValidationHandlerContact();
}

const tabsChangeHandler = () => {
    const allTabs = document.querySelectorAll('.select-mat__box-items-block');
    const allCategories = document.querySelectorAll('.select-mat__box-menu-name');

    let childSlug;

    let activeElNumber = 0;
    let activeElButtonNumber = 0;
    let oldActiveElNumber;

    allCategories.forEach(el => {
        el.addEventListener('click', function () {

            document
                .querySelector(`.select-mat__box-menu-name[data-tab-number="${activeElButtonNumber}"]`)
                .classList.remove('active-cat');

            this.classList.add('active-cat');
            activeElButtonNumber = this.getAttribute('data-tab-number');

            document.querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`).classList.add('hide');
            document
                .querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`)
                .classList.remove('show');

            setTimeout(() => {
                document
                    .querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`)
                    .classList.remove('active-cat');

                oldActiveElNumber = activeElNumber;

                activeElNumber = activeElButtonNumber;

                document
                    .querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`)
                    .classList.add('active-cat');

                setTimeout(() => {
                    document
                        .querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`)
                        .classList.remove('hide');
                    document
                        .querySelector(`.select-mat__box-items-block[data-tab-number="${activeElNumber}"]`)
                        .classList.add('show');
                    
                }, 200);
            }, 300);
        });
    });
};

const projectsTabHandler = () => {
    const buttons = document.querySelectorAll('section.projects .projects__category-button');
    const tabs = document.querySelectorAll('section.projects .projects__category-container');

    let activeElNumber = 0;
    let activeElButtonNumber = 0;
    let oldActiveElNumber;

    buttons.forEach(el => {
        el.addEventListener('click', function () {
            document
                .querySelector(`section.projects .projects__category-button[data-button-number="${activeElButtonNumber}"]`)
                .classList.remove('active');

            this.classList.add('active');
            activeElButtonNumber = this.getAttribute('data-button-number');

            document
                .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                .classList.add('hide');
            document
                .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                .classList.remove('show');

            setTimeout(() => {
                document
                    .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                    .classList.remove('active');

                oldActiveElNumber = activeElNumber;

                activeElNumber = activeElButtonNumber;

                document
                    .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                    .classList.add('active');

                setTimeout(() => {
                    document
                        .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                        .classList.remove('hide');
                    document
                        .querySelector(`section.projects .projects__category-container[data-tab-number="${activeElNumber}"]`)
                        .classList.add('show');
                    setTimeout(() => {
                        document
                            .querySelector(
                                `section.projects .projects__category-container[data-tab-number="${activeElNumber}"] .project:first-child`
                            )
                            .classList.add('active');
                    }, 100);
                }, 200);
            }, 300);
        });
    });
};

if (document.querySelector('section.projects')) {
    // projectsTabHandler();
}

if (document.body.classList.contains('page-template-products')) {
    tabsChangeHandler();
}

const headerMobileMenuHandler = () => {
    const headerMobileMenu = document.querySelector('.header-mobile__menu-container');

    const menuOpenButton = document.querySelector('.header-mobile__menu-button-container');
    const menuCloseButton = document.querySelector('.header-mobile__close-button');

    menuOpenButton.addEventListener('click', function () {
        headerMobileMenu.classList.add('active');
        document.body.classList.add('body-overflow-hidden');
    });
    menuCloseButton.addEventListener('click', function () {
        headerMobileMenu.classList.remove('active');
        document.body.classList.remove('body-overflow-hidden');
    });
};

headerMobileMenuHandler();

const makingArrowForMenuMobile = () => {
    const linksWithChilds = document.querySelectorAll('.header-mobile__menu li.menu-item-has-children');
    let linkArrows;

    /* adding span with arrow for menu elements that have children */

    for (let i = 0; i < linksWithChilds.length; i++) {
        const arrow = document.createElement('span');
        arrow.innerHTML = `<img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/chevron-down.svg" alt=">" />`;
        arrow.classList.add('header-mobile__menu-activator');
        linksWithChilds[i].insertBefore(arrow, linksWithChilds[i].childNodes[2]);
    }
    setTimeout(function () {
        linkArrows = document.querySelectorAll('.header-mobile__menu li.menu-item-has-children > span');
        linkArrows.forEach(item => {
            item.addEventListener('click', function (e) {
                e.stopPropagation();
                $(this).parent('li').toggleClass('active');
            });
        });
    }, 1000);
};

makingArrowForMenuMobile();

const showMatDimensions = () => {
    const arrow = document.querySelector('.selected-mat .selected-mat__right-dimensions-title');
    const dropdown = document.querySelector('.selected-mat .selected-mat__right-dimensions-dropdown');
    if (arrow) {
        arrow.addEventListener('click', () => {
            dropdown.classList.toggle('active');
        });
    }
};

showMatDimensions();

const focusOnDimension = () => {
    const dimensions = document.querySelectorAll('.selected-mat__right-dimensions-text');

    dimensions.forEach(el => {
        el.addEventListener('click', () => {
            dimensions.forEach(otherEl => {
                if (otherEl !== el) {
                    otherEl.classList.remove('active-dimension');
                }
            });

            el.classList.toggle('active-dimension');
            const dimensionHolder = el.textContent;
        });
    });
};

focusOnDimension();

const rightImgsItems = document.querySelectorAll('.selected-mat__right-imgs-item');

const showHoverImg = () => {
    document.addEventListener('DOMContentLoaded', function () {
        const initialLeftItem = document.querySelector('.selected-mat__big-images-items-group-item[data-number="0"]');
        if (initialLeftItem) {
            initialLeftItem.classList.add('active');
        }

        rightImgsItems.forEach(rightImgsItem => {
            rightImgsItem.addEventListener('mouseover', function () {
                const dataNumber = this.getAttribute('data-number');
                const correspondingGroup = document.querySelector(
                    `.selected-mat__big-images-items-group[data-number="${dataNumber}"]`
                );

                if (correspondingGroup) {
                    const firstItemInGroup = correspondingGroup.querySelector('.selected-mat__big-images-items-group-item');
                    if (firstItemInGroup) {
                        const activeItem = document.querySelector('.selected-mat__big-images-items-group-item.active-hover');

                        if (activeItem) {
                            activeItem.classList.remove('active-hover');
                        }
                        firstItemInGroup.classList.add('active-hover');
                    }
                }
            });

            rightImgsItem.addEventListener('mouseout', function () {
                const dataNumber = this.getAttribute('data-number');
                const correspondingGroup = document.querySelector(
                    `.selected-mat__big-images-items-group[data-number="${dataNumber}"]`
                );
                if (correspondingGroup) {
                    const firstItemInGroup = correspondingGroup.querySelector('.selected-mat__big-images-items-group-item');
                    if (firstItemInGroup) {
                        const activeItem = document.querySelector('.selected-mat__big-images-items-group-item.active-hover');

                        if (activeItem) {
                            activeItem.classList.remove('active-hover');
                        }
                    }
                }
            });
        });
    });
};

showHoverImg();

const showClickImg = () => {
    document.addEventListener('DOMContentLoaded', function () {
        const initialLeftItem = document.querySelector('.selected-mat__big-images-items-group-item[data-number="0"]');
        if (initialLeftItem) {
            initialLeftItem.classList.add('active-click');
        }

        const initialRightItem = document.querySelector('.selected-mat__right-imgs-item[data-number="0"]');

        if (initialRightItem) {
            initialRightItem.classList.add('clicked-border');
        }

        const initialLeftAdditionalItems = document.querySelectorAll(`.selected-mat__single-additional[data-number="0"]`);
        if (initialLeftAdditionalItems) {
            initialLeftAdditionalItems.forEach(initialLeftAdditionalItem => {
                initialLeftAdditionalItem.classList.add('active-click');
            });
        }

        rightImgsItems.forEach(rightImgsItem => {
            rightImgsItem.addEventListener('click', function (event) {
                const dataNumber = this.getAttribute('data-number');
                const correspondingLeftAdditionalItems = document.querySelectorAll(
                    `.selected-mat__single-additional[data-number="${dataNumber}"]`
                );

                const correspondingGroup = document.querySelector(
                    `.selected-mat__big-images-items-group[data-number="${dataNumber}"]`
                );

                const correspondingRightItem = document
                    .querySelector(`.selected-mat__right-imgs-item[data-number="${dataNumber}"]`)
                    .getAttribute('data-number');

                const additionalImg = document.querySelector('.selected-mat__single-additional.clicked-additional');

                if (additionalImg) {
                    if (correspondingRightItem !== additionalImg.getAttribute('data-number')) {
                        additionalImg.classList.remove('clicked-additional');
                    }
                }

                if (correspondingGroup) {
                    console.log('tak');
                    const firstItemInGroup = correspondingGroup.querySelector('.selected-mat__big-images-items-group-item');
                    if (firstItemInGroup) {
                        const activeClickItem = document.querySelector('.selected-mat__big-images-items-group-item.active-click');
                        const activeItem = document.querySelector('.selected-mat__big-images-items-group-item.active');
                        if (activeClickItem) {
                            activeClickItem.classList.remove('active-click');
                        }
                        firstItemInGroup.classList.add('active-click');


                        if (activeItem) {
                            activeItem.classList.remove('active');
                        }
                        firstItemInGroup.classList.add('active');
                    }

                    document.querySelectorAll('.selected-mat__big-images-items-group-item').forEach(leftItem => {
                        if (leftItem !== firstItemInGroup) {
                            leftItem.classList.remove('active-click');
                        }
                    });
                }

                rightImgsItems.forEach(item => {
                    if (item !== rightImgsItem) {
                        item.classList.remove('clicked-border');
                    }
                });

                rightImgsItem.classList.add('clicked-border');

                document.querySelectorAll('.selected-mat__single-additional').forEach(leftAdditionalItem => {
                    correspondingLeftAdditionalItems.forEach(correspondingLeftAdditionalItem => {
                        if (leftAdditionalItem !== correspondingLeftAdditionalItem) {
                            leftAdditionalItem.classList.remove('active-click');
                        }
                        if (correspondingLeftAdditionalItem) {
                            correspondingLeftAdditionalItem.classList.add('active-click');
                        }
                    });
                });

                event.stopPropagation();
            });
        });
    });
};

showClickImg();

const showMatColor = () => {
    const colors = document.querySelectorAll('.selected-mat__right-details-color-name');
    const colorText = document.querySelector('.selected-mat__right-details-color');

    const initialColor = document.querySelector('.selected-mat__right-details-color-name[data-number="0"]');

    if (initialColor) {
        initialColor.classList.add('show-color');
    }

    rightImgsItems.forEach(rightImgsItem => {
        rightImgsItem.addEventListener('click', function () {
            colors.forEach(color => {
                const colorNumber = this.getAttribute('data-number');
                const correspondingColor = document.querySelector(
                    `.selected-mat__right-details-color-name[data-number="${colorNumber}"]`
                );

                if (colorNumber !== correspondingColor) {
                    color.classList.remove('show-color');
                }
                if (correspondingColor) {
                    correspondingColor.classList.add('show-color');
                }
            });
        });
    });

    colors.forEach(color => {
        if (color.classList.contains('show-color')) {
            colorText.style.display = 'flex';
        }
    });
};

showMatColor();

const showMatPattern = () => {
    const patternText = document.querySelector('.selected-mat__right-details-pattern');

    const patterns = document.querySelectorAll('.selected-mat__right-details-pattern-name');

    const initialPattern = document.querySelector('.selected-mat__right-details-pattern-name[data-number="0"]');

    if (initialPattern) {
        initialPattern.classList.add('show-pattern');
    }

    rightImgsItems.forEach(rightImgsItem => {
        rightImgsItem.addEventListener('click', function () {
            patterns.forEach(pattern => {
                const patternNumber = this.getAttribute('data-number');
                const correspondingPattern = document.querySelector(
                    `.selected-mat__right-details-pattern-name[data-number="${patternNumber}"]`
                );

                if (patternNumber !== correspondingPattern) {
                    pattern.classList.remove('show-pattern');
                }
                if (correspondingPattern) {
                    correspondingPattern.classList.add('show-pattern');
                }
            });
        });
    });

    patterns.forEach(pattern => {
        if (pattern.classList.contains('show-pattern')) {
            patternText.style.display = 'flex';
        }
    });
};
showMatPattern();

const offerSelectSpecificCategory = () => {
    setTimeout(function () {
        const offerLink = window.location.search;
        let offerLinkWithDot = offerLink.replace('?', '');

        if (document.querySelector(`.selected-mat__right-imgs-item[data-filter="${offerLinkWithDot}"]`)) {
            document.querySelector(`.selected-mat__right-imgs-item[data-filter="${offerLinkWithDot}"]`).click();
        }
    }, 300);
};
offerSelectSpecificCategory();

const singleAdditionals = document.querySelectorAll('.selected-mat__single-additional');
let lastClickedElement = null;

const clickAdditionalImg = () => {
    singleAdditionals.forEach(singleAdditional => {
        singleAdditional.addEventListener('click', () => {
            if (lastClickedElement !== null && lastClickedElement !== singleAdditional) {
                lastClickedElement.classList.remove('clicked-additional');

                const lastClickedAdditionalImg = lastClickedElement.getAttribute('data-second-number');

                const lastClickedAdditionalFirstAttr = lastClickedElement.getAttribute('data-number');

                const lastCorrespondingGroup = document.querySelector(
                    `.selected-mat__big-images-items-group[data-number="${lastClickedAdditionalFirstAttr}"]`
                );

                if (lastCorrespondingGroup) {
                    const lastCorrespondingItem = lastCorrespondingGroup.querySelector(
                        `.selected-mat__big-images-items-group-item[data-number="${lastClickedAdditionalImg}"]`
                    );

                    if (lastCorrespondingItem) {
                        lastCorrespondingItem.classList.remove('active');
                    }
                }
            }

            if (singleAdditional.classList.contains('active-click')) {
                singleAdditional.classList.add('clicked-additional');
            } else {
                singleAdditional.classList.remove('clicked-additional');
            }
            lastClickedElement = singleAdditional;

            const clickedAdditionalImg = singleAdditional.getAttribute('data-second-number');

            const clickedAdditionalFirstAttr = singleAdditional.getAttribute('data-number');

            const correspondingGroup = document.querySelector(
                `.selected-mat__big-images-items-group[data-number="${clickedAdditionalFirstAttr}"]`
            );

            if (correspondingGroup) {
                const correspondingItem = correspondingGroup.querySelector(
                    `.selected-mat__big-images-items-group-item[data-number="${clickedAdditionalImg}"]`
                );
                if (correspondingItem) {
                    correspondingItem.classList.add('active');
                }
            }
        });
    });
};

clickAdditionalImg();

const formValidationHandlerProduct = () => {
    const section = document.querySelector('.product-form');

    const name = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"] input');
    const nameHolder = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"]');

    const email = section.querySelector('.form-validation [data-input-name="email"] input');
    const emailHolder = section.querySelector('.form-validation [data-input-name="email"]');

    const question = section.querySelector('.form-validation [data-input-name="text-content"] textarea');
    const questionHolder = section.querySelector('.form-validation [data-input-name="text-content"]');

    const number = document.querySelector('.form-validation [data-input-name="tel"] input');
    const numberHolder = document.querySelector('.form-validation [data-input-name="tel"]');

    let nameState = false;
    let emailState = false;
    let questionState = false;
    let numberState = false;

    section.querySelectorAll('.form__input-container').forEach(el => {
        el.classList.remove('validated');
    });

    name.value = '';
    email.value = '';
    question.value = '';
    number.value = '';

    const sendButton = document.querySelector('.form__send');

    const validateEmail = email => {
        var regex =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    };

    if (nameHolder) {
        if (name.value != '') {
            nameHolder.classList.add('validated');
            nameState = true;
        }
    } else {
        nameState = true;
    }

    if (emailHolder) {
        if (validateEmail(email.value)) {
            emailHolder.classList.add('validated');
            emailState = true;
        }
    } else {
        emailState = true;
    }

    if (questionHolder) {
        if (question.value != '') {
            questionHolder.classList.add('validated');
            questionState = true;
        }
    } else {
        questionState = true;
    }

    if (numberHolder) {
        if (number.value != '') {
            telefonNumber = parseInt(number.value);
        }
    } else {
        numberState = false;
    }

    if (nameHolder) {
        name.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (e.target.value != '') {
                nameHolder.classList.add('validated');
                nameState = true;
                // checkValidation();
            } else {
                nameHolder.classList.remove('validated');
                nameState = false;
                // checkValidation();
            }
        });
    }

    if (emailHolder) {
        email.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (validateEmail(e.target.value)) {
                emailHolder.classList.add('validated');
                emailState = true;
                // checkValidation();
            } else {
                emailHolder.classList.remove('validated');
                emailState = false;
                // checkValidation();
            }
        });
    }
    if (questionHolder) {
        question.addEventListener('input', function (e) {
            // console.log(e.target.value)
            if (e.target.value != '') {
                questionHolder.classList.add('validated');
                questionState = true;
                // checkValidation();
            } else {
                questionHolder.classList.remove('validated');
                questionState = false;
                // checkValidation();
            }
        });
    } else {
        questionState = true;
    }

    var options = {
        onComplete: function (cep) {
            // console.log('CEP Completed!:' + cep);
            numberHolder.classList.add('validated');
            numberState = true;
            console.log('complete');
            // checkValidation();
        },
        onKeyPress: function (cep, event, currentField, options) {
            if (number.value.length > 10) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }

            // console.log('keypress')
            // checkValidation();
        },
        onChange: function (cep) {
            if (number.value.length > 14) {
                numberHolder.classList.add('validated');
                numberState = true;
            } else {
                numberHolder.classList.remove('validated');
                numberState = false;
            }
            // numberHolder.classList.remove('validated')
            // numberState = false;
            // console.log('change')
            // checkValidation();
        },
        onInvalid: function (val, e, f, invalid, options) {
            numberHolder.classList.remove('validated');
            numberState = false;
            console.log('invalid');
            // checkValidation();
        },
    };

    jQuery(`.form-validation [data-input-name="tel"] input`).mask('999-999-999-999-999', options);

    const clearFormAfterSend = () => {
        // let wpcf7Elm = document.querySelector('#wpcf7-f1046-o2');
        let wpcf7Elm = document.querySelector('.product-form__container>div.wpcf7');

        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                nameState = false;
                emailState = false;
                questionState = false;
                numberState = false;
                // subjectState = false;
                // cityState = false;

                document.querySelectorAll('.form__input-container').forEach(el => {
                    el.classList.remove('validated');
                });
            },
            false
        );
    };
    clearFormAfterSend();

    const handleFormSendMessage = () => {
        const messageSentContainer = document.querySelector('.form__message-sent');
        // var wpcf7Elm = document.querySelector('#wpcf7-f1046-o2');
        let wpcf7Elm = document.querySelector('.product-form__container>div.wpcf7');

        wpcf7Elm.addEventListener(
            'wpcf7mailsent',
            function (event) {
                messageSentContainer.classList.add('active');

                setTimeout(() => {
                    messageSentContainer.classList.remove('active');
                }, 4000);
            },
            false
        );
    };
    handleFormSendMessage();
};


const handleAdditionalFormInputs = () => {

    document.addEventListener('DOMContentLoaded', function () {

        const showFormButton = document.querySelector('.selected-mat__right-btn');
        const formControlVisibility = document.querySelector('.product-form__outer');

        showFormButton.addEventListener('click', function () {
            if ((formControlVisibility != undefined) && (formControlVisibility != null)) {

                if (formControlVisibility.classList.contains('active')) {
                    formControlVisibility.classList.remove('active');
                } else {
                    formControlVisibility.classList.add('active');
                }
            }
        })


        const formInputProdName = document.querySelector('.form__input-container[data-input-name="product-name"] textarea');
        const formInputProdPattern = document.querySelector('.form__input-container[data-input-name="product-pattern"] textarea');
        const formInputProdColor = document.querySelector('.form__input-container[data-input-name="product-color"] textarea');
        const formInputProdSize = document.querySelector('.form__input-container[data-input-name="product-size"] textarea');


        const prodName = document.querySelector('.selected-mat__right-details-title');

        const prodItems = document.querySelectorAll('.selected-mat__right-imgs-item');

        const prodSizesAll = document.querySelectorAll('.selected-mat__right-dimensions-text.item-name');

        formInputProdName.value = prodName.innerText;

        let activeProdPattern = document.querySelector('.selected-mat__right-details-pattern-name.show-pattern');
        // formInputProdPattern.value = activeProdPattern.innerText;

        if (activeProdPattern != undefined && activeProdPattern != null) {
            formInputProdPattern.value = activeProdPattern.innerText;
        } else {
            formInputProdPattern.value = 'Brak wzoru';
            // console.log('Brak koloru');
        }
        let activeProdColor = document.querySelector('.selected-mat__right-details-color-name.show-color');

        // formInputProdColor.value = activeProdColor.innerText;

        let activeProdSize = document.querySelector('.selected-mat__right-dimensions-text.item-name.active-dimension');

        formInputProdSize.value = activeProdSize.innerText;


        prodItems.forEach(elem => {
            elem.addEventListener('click', () => {
                activeProdPattern = document.querySelector('.selected-mat__right-details-pattern-name.show-pattern');

                if (activeProdPattern != undefined && activeProdPattern != null) {
                    formInputProdPattern.value = activeProdPattern.innerText;
                } else {
                    formInputProdPattern.value = 'Brak wzoru';
                    // console.log('Brak koloru');
                }
                // formInputProdPattern.value = activeProdPattern.innerText;
                // console.log('formInputProdPattern.value: ' + formInputProdPattern.value)


                activeProdColor = document.querySelector('.selected-mat__right-details-color-name.show-color');
                if (activeProdColor != undefined && activeProdColor != null) {
                    formInputProdColor.value = activeProdColor.innerText;
                } else {
                    formInputProdColor.value = 'Brak Koloru';
                    // console.log('Brak koloru');
                }
                // console.log('formInputProdColor.value: ' + formInputProdColor.value)


            })
        });

        prodSizesAll.forEach(size => {
            size.addEventListener('click', () => {
                activeProdSize = document.querySelector('.selected-mat__right-dimensions-text.item-name.active-dimension');
                formInputProdSize.value = activeProdSize.innerText;
                //console.log('formInputProdSize.value: ' + formInputProdSize.value)


            })
        });





    });

}

if (document.body.classList.contains('page-template-product')) {
    formNegativeValidation();
    // formValidationHandler();
    formValidationHandlerProduct();
    // productChangesHandler();
    handleAdditionalFormInputs();


}