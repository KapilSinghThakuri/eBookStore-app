(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });
    
})(jQuery);



// FOR USER PROFILE INFORMATIONS & SETTING
var profileBtn = document.getElementById('profileBtn');
var profileModal = document.getElementById('profileModal');
var cancelBtn = document.getElementById('cancelBtn');

profileBtn.addEventListener('click', function(event) {
    event.preventDefault();
    profileModal.style.display = 'block';
});
cancelBtn.addEventListener('click',function(event){
    profileModal.style.display = 'none';
});

// FOR VIEW DETAILS MODAL
// This is just for displying modal incase of modal items are in loop
    // var viewDetail = document.getElementById('viewDetail');
    // var viewDetailBtn = document.querySelectorAll('.viewDetailBtn');

    // // Iterate through each element with the class .viewDetailBtn
    // viewDetailBtn.forEach(function(element) {
    //     // Attach click event listener to each element
    //     element.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         viewDetail.style.display = 'block';
    //         console.log("Modal Button Clicked");
    //     });
    // });

// This is just for displying modal with associated data
    // Add event listener to each "View Book Details" button
    document.querySelectorAll('.viewDetailBtn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Get book details from data attributes
            var bookTitle = button.getAttribute('data-title');
            var bookPrice = button.getAttribute('data-price');
            var bookImage = button.getAttribute('data-image');
            var bookRating = button.getAttribute('data-rating');
            var bookDescription = button.getAttribute('data-description');

            // Populate modal with book details
            document.querySelector('#viewDetail #viewDetailContent #book_image').src = bookImage;
            document.querySelector('#viewDetail #viewDetailContent #bookDetails h5').textContent = bookTitle;
            document.querySelector('#viewDetail #viewDetailContent #bookDetails p').textContent = "Rs."+ bookPrice;
            document.querySelector('#viewDetail #viewDetailContent #bookDetails h6').textContent = bookDescription;

        // Showing book's rating
        var previousRatingDiv = document.querySelector('#viewDetail #viewDetailContent #bookDetails .rating .mb-1');
        if (previousRatingDiv) {
            previousRatingDiv.remove();
        }
        const ratingDiv = document.createElement('div');
        ratingDiv.classList.add('mb-1');
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('small');
            if (i <= bookRating) {
                star.classList.add('fas', 'fa-star'); // Full star
            } else if (i - 0.5 === bookRating) {
                star.classList.add('fas', 'fa-star-half-alt'); // Half-star
            } else {
                star.classList.add('far', 'fa-star'); // Empty star
            }
            ratingDiv.appendChild(star);
        }
        document.querySelector('#viewDetail #viewDetailContent #bookDetails .rating').appendChild(ratingDiv);

        // Show modal
        document.getElementById('viewDetail').style.display = 'block';
        });
    });
    var closeDetailModal = document.getElementById('closeDetailModal');
        closeDetailModal.onclick = function(){
            viewDetail.style.display = 'none';
        };

// FOR ADD TO CART MODAL
var selectedBookId;
$('.addToCartBtn').click(function(event) {
    event.preventDefault();

    var bookId = $(this).data('id'); // Get the book ID from the data attribute of the clicked button
    selectedBookId = bookId; // Setting bookId to selectedBookId variable for passing the book id to Shopping cart page
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/addToCartDetailStore',
        type: 'POST',
        data: { book_id: bookId },
        success: function(response) {
            if (response.status == 200) {
                // Populate modal with book details
                $('#addToCartModal #bookInfo h5').text(response.book.title);
                $('#addToCartModal #bookInfo h6').text("Rs." + response.book.price);
                $('#addToCartModal #modalBodyContent img').attr('src', response.book.image);

                $('#addToCartModal #modalHeadingContent #bookAddedMessage').text(response.success);
                // $('#addToCartModal').fadeIn();
                $('#addToCartModal').show();
                // To show updated cartItemCount in cartSection onTop and viewCartButton
                updateCartItemCount();
            } else {
                if (response.status == 404 ) {
                    // alert(response.message);
                    alert('Please select book first !!!');
                    }else{
                        alert('Please login first !!!');
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error adding book to cart:', error);
            }
        });
    });

// Close modal when the close button is clicked
    // document.getElementById('closeBtn').addEventListener('click', function() {
    //     document.getElementById('addToCartModal').style.display = 'none';
    // });

    $('#closeBtn').click(function(event) {
        event.preventDefault();
        $('#addToCartModal').hide();
    });

// Open shopping cart page with cart items when the view cart button is clicked
    // document.getElementById('viewCartBtn').addEventListener('click', function(e){
    //     e.preventDefault();
    //     var shoppingCartUrl = this.getAttribute('href');
    //     // shoppingCartUrl += '/' + selectedBookId;
    //     window.location.href = shoppingCartUrl;
    // });

    // Or Using event delegation for the viewCartBtn click event
    $(document).on('click', '#viewCartBtn', function(e) {
        e.preventDefault();
        var shoppingCartUrl = $(this).attr('href');
        window.location.href = shoppingCartUrl;
    });

// Counting the addToCartItems
function updateCartItemCount(){
    $.ajax({
        url: '/getCartItemCount',
        type: 'GET',
        success: function(response) {
            if (response.status == 200) {
                // Update the UI with the cart item count
                $('#cartItemCount').text(response.cart_item_count);
                $('#cartBookCount').text(response.cart_item_count);
            } else {
                console.error('Error fetching cart item count:', response.errors);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching cart item count:', error);
        }
    });
}





