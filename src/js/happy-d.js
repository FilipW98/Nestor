let prevScrollpos = window.pageYOffset;

const menuBarHandler = () => {
    var currentScrollPos = window.pageYOffset;
    const headerMainFixedMobile = document.querySelector('.header-mobile__outer');
    // const headerMain = document.querySelector('body > .header > .header-desktop');


    if (window.pageYOffset < 50) {
        headerMainFixedMobile.classList.remove('hidden');
    } else if (prevScrollpos > currentScrollPos) {
        headerMainFixedMobile.classList.remove('hidden');
    } else if (prevScrollpos < currentScrollPos) {
        // headerMain.classList.remove('hidden');
        headerMainFixedMobile.classList.add('hidden');
    }

    prevScrollpos = currentScrollPos;
}

$(window).scroll(function () {
    menuBarHandler();
});

const headerMobileMenuHandler = () => {
    const headerMobileMenu = document.querySelector('.header-mobile__menu-container');

    const menuOpenButton = document.querySelector('.header-mobile__menu-button-container');
    const menuCloseButton = document.querySelector('.header-mobile__close-button');

    menuOpenButton.addEventListener('click', function () {
        headerMobileMenu.classList.add('active')
        document.body.classList.add('overflow-hidden')
    })
    menuCloseButton.addEventListener('click', function () {
        headerMobileMenu.classList.remove('active')
        document.body.classList.remove('overflow-hidden')
    })
}

headerMobileMenuHandler();


const makingArrowForMenu = () => {

    const linksWithChilds = document.querySelectorAll(".header-mobile__menu li.menu-item-has-children");
    let linkArrows;


    /* adding span with arrow for menu elements that have children */

    for (let i = 0; i < linksWithChilds.length; i++) {
        const arrow = document.createElement("span");
        arrow.innerHTML = `<img src="/wp-content/uploads/2024/05/arrow-down-nestor.svg" alt=">" />`;
        arrow.classList.add('header-mobile__menu-activator')
        linksWithChilds[i].insertBefore(arrow, linksWithChilds[i].childNodes[2])
    }
    setTimeout(function () {

        linkArrows = document.querySelectorAll(".header-mobile__menu li.menu-item-has-children > span");
        linkArrows.forEach(item => {
            item.addEventListener('click', function (e) {
                e.stopPropagation();
                $(this).parent('li').toggleClass('active')
            })
        })
    }, 1000)

}

makingArrowForMenu();


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

const formValidationHandlerContact = () => {
    const section = document.querySelector('.form-image');

    const name = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"] input');
    const nameHolder = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"]');

    const email = section.querySelector('.form-validation [data-input-name="email"] input');
    const emailHolder = section.querySelector('.form-validation [data-input-name="email"]');

    // const question = section.querySelector('.form-validation [data-input-name="text-content"] textarea');
    // const questionHolder = section.querySelector('.form-validation [data-input-name="text-content"]');

    const number = document.querySelector('.form-validation [data-input-name="tel"] input');
    const numberHolder = document.querySelector('.form-validation [data-input-name="tel"]');

    let nameState = false;
    let emailState = false;
    // let questionState = false;
    let numberState = false;

    section.querySelectorAll('.form__input-container').forEach(el => {
        el.classList.remove('validated');
    });

    name.value = '';
    email.value = '';
    // question.value = '';
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

    // if (questionHolder) {
    //     if (question.value != '') {
    //         questionHolder.classList.add('validated');
    //         questionState = true;
    //     }
    // } else {
    //     questionState = true;
    // }

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
    // if (questionHolder) {
    //     question.addEventListener('input', function (e) {
    //         // console.log(e.target.value)
    //         if (e.target.value != '') {
    //             questionHolder.classList.add('validated');
    //             questionState = true;
    //             // checkValidation();
    //         } else {
    //             questionHolder.classList.remove('validated');
    //             questionState = false;
    //             // checkValidation();
    //         }
    //     });
    // } else {
    //     questionState = true;
    // }

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
        let wpcf7Elm = document.querySelector('.form-image__form-container>div.wpcf7');

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
        let wpcf7Elm = document.querySelector('.form-image__form-container>div.wpcf7');

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
    formValidationHandlerContact();
}

if (document.body.classList.contains('page-template-home')) {
    formNegativeValidation();
    formValidationHandlerContact();
}


const searchHandler = () => {
    const closeButton = document.querySelector('.search-section__close-button');
    const searchSection = document.querySelector('.search-section');

    const enableSearchButtonDesktop = document.querySelector('.header-desktop__search-icon');
    const enableSearchButtonMobile = document.querySelector('.header-mobile__search-icon');

    closeButton.addEventListener('click', function () {
        searchSection.classList.remove('active');
    })


    enableSearchButtonDesktop.addEventListener('click', function () {
        searchSection.classList.add('active');
    })

    enableSearchButtonMobile.addEventListener('click', function () {
        searchSection.classList.add('active');
    })
}

searchHandler();






const formValidationHandlerProduct = () => {
    const section = document.querySelector('.product-content');

    const name = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"] input');
    const nameHolder = section.querySelector('.form-validation [data-input-name="imie-i-nazwisko"]');

    const email = section.querySelector('.form-validation [data-input-name="email"] input');
    const emailHolder = section.querySelector('.form-validation [data-input-name="email"]');

    // const question = section.querySelector('.form-validation [data-input-name="text-content"] textarea');
    // const questionHolder = section.querySelector('.form-validation [data-input-name="text-content"]');

    const number = document.querySelector('.form-validation [data-input-name="tel"] input');
    const numberHolder = document.querySelector('.form-validation [data-input-name="tel"]');

    let nameState = false;
    let emailState = false;
    // let questionState = false;
    let numberState = false;

    section.querySelectorAll('.form__input-container').forEach(el => {
        el.classList.remove('validated');
    });

    name.value = '';
    email.value = '';
    // question.value = '';
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

    // if (questionHolder) {
    //     if (question.value != '') {
    //         questionHolder.classList.add('validated');
    //         questionState = true;
    //     }
    // } else {
    //     questionState = true;
    // }

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
    // if (questionHolder) {
    //     question.addEventListener('input', function (e) {
    //         // console.log(e.target.value)
    //         if (e.target.value != '') {
    //             questionHolder.classList.add('validated');
    //             questionState = true;
    //             // checkValidation();
    //         } else {
    //             questionHolder.classList.remove('validated');
    //             questionState = false;
    //             // checkValidation();
    //         }
    //     });
    // } else {
    //     questionState = true;
    // }

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
        let wpcf7Elm = document.querySelector('.product-content__form-container>div.wpcf7');

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
        let wpcf7Elm = document.querySelector('.product-content__form-container>div.wpcf7');

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




if (document.body.classList.contains('page-template-product')) {
    formNegativeValidation();
    formValidationHandlerProduct();
}