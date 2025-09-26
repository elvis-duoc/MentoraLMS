"use strict";

/* Full Screen */
const fullscreenButton = document.getElementById('crancy-header__full');
const htmlElement = document.documentElement;

if (fullscreenButton) {
    fullscreenButton.addEventListener('click', () => {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            htmlElement.requestFullscreen();
        }
    });
}

/* Password Field */
document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password-field');
    const toggleIcon = document.getElementById('toggle-icon');
    const togglePassword = () => {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    };

    if (toggleIcon) {
        toggleIcon.addEventListener('click', togglePassword);
    }
});


/* Confirm Password Field */
document.addEventListener('DOMContentLoaded', function() {
    const confirmPasswordField = document.getElementById('confirm-password-field');
    const confirmToggleIcon = document.getElementById('confirm-toggle-icon');
    const togglePassword = () => {
        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            confirmToggleIcon.classList.remove('fa-eye');
            confirmToggleIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordField.type = 'password';
            confirmToggleIcon.classList.remove('fa-eye-slash');
            confirmToggleIcon.classList.add('fa-eye');
        }
    };

    if (confirmToggleIcon) {
        confirmToggleIcon.addEventListener('click', togglePassword);
    }
});


// /* Crancy Options */
const cs_button = document.querySelectorAll("#crancy__sicon");
const cs_action = document.querySelectorAll(".crancy-smenu, .crancy-header, .crancy-adashboard");

cs_button.forEach(button => {
    button.addEventListener("click", function() {
        cs_action.forEach((el) => {
            el.classList.toggle("crancy-close");
        });
        localStorage.setItem("iscicon", cs_action[0].classList.contains("crancy-close"));
    });
});

if (localStorage.getItem("iscicon") === "true") {
    cs_action.forEach((el) => {
        el.classList.add("crancy-close");
    });
}

jQuery(document).ready(function($) {

    $('#crancy-header__nav,.crancy-sidebarmenu__close').on("click", function() {
        $('.crancy-sidebarmenu').toggleClass('active');
    });

    $('.crancy-filters-button').on("click", function() {
        $('.crancy-table-filter-tables').toggleClass('active');
    });

    $('.td_rating').each(function() {
        var review = $(this).data('rating');
        var reviewVal = review * 20 + '%';
        $(this).find('.td_rating_percentage').css('width', reviewVal);
    });


});


// Get all elements with the class "crancy-toggle"
const toggleElements = document.querySelectorAll('.crancy-toggle');

// Add click event listeners to each ".crancy-toggle" element
toggleElements.forEach((toggleElement) => {
    toggleElement.addEventListener('click', (event) => {
        // Find the corresponding ".crancy-toggle__dropdown" element
        const dropdownElement = toggleElement.querySelector('.crancy-toggle__dropdown');

        // Toggle the "active" class on the clicked dropdownElement
        dropdownElement.classList.toggle('active');

        // Close other open dropdowns
        toggleElements.forEach((otherToggleElement) => {
            if (otherToggleElement !== toggleElement) {
                const otherDropdownElement = otherToggleElement.querySelector('.crancy-toggle__dropdown');
                otherDropdownElement.classList.remove('active');
            }
        });
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const crancyDropdowns = document.querySelectorAll(".crancy__dropdown");

    crancyDropdowns.forEach((crancyDropdown, index) => {
        const observer = new MutationObserver(function(mutationsList) {
            const crancyDropdownHasShowClass = crancyDropdown.classList.contains("show");

            document.querySelectorAll(".admin-menu").forEach((adminMenuOne) => {
                adminMenuOne.classList.toggle("no-overflow", crancyDropdownHasShowClass);
            });
        });

        observer.observe(crancyDropdown, { attributes: true });
    });
});