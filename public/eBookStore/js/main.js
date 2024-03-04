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



// For displaying user informations

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

// For alerting card when customer click addtocart button
// This is just for displying modal
    // var addToCartModal = document.getElementById('addToCartModal');
    // var closeBtn = document.getElementById('closeBtn');
    // var addToCartButton = document.querySelectorAll('.addToCartBtn');

    // Iterate through each element with the class .addToCartBtn
    // addToCartButton.forEach(function(element) {
        // Attach click event listener to each element
    //     element.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         addToCartModal.style.display = 'block';
    //         console.log("Modal Button Clicked");
    //     });
    // });
    // closeBtn.onclick = function(){
    //     addToCartModal.style.display = 'none';
    // };
// This is just for displying modal with associated data
    // Add event listener to each "Add To Cart" button
        // document.querySelectorAll('.addToCartBtn').forEach(function(button) {
            // button.addEventListener('click', function(event) {
                // event.preventDefault();

                // // Get book details from data attributes
                // var bookTitle = button.getAttribute('data-title');
                // var bookPrice = button.getAttribute('data-price');
                // var bookImage = button.getAttribute('data-image');
                // var bookId = button.getAttribute('data-id');

                // book_id = bookId;
                // console.log(book_id);

                // // Populate modal with book details
                // document.querySelector('#addToCartModal #bookInfo h5').textContent = bookTitle;
                // document.querySelector('#addToCartModal #bookInfo h6').textContent = "Rs."+ bookPrice;
                // document.querySelector('#addToCartModal #modalBodyContent img').src = bookImage;

                // // Show modal
                // document.getElementById('addToCartModal').style.display = 'block';
            // });
        // });
var selectedBookId;
$('.addToCartBtn').click(function(event) {
    event.preventDefault();

    var bookId = $(this).data('id'); // Get the book ID from the data attribute of the clicked button
    selectedBookId = bookId;
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
    document.getElementById('closeBtn').addEventListener('click', function() {
        document.getElementById('addToCartModal').style.display = 'none';
    });

    document.getElementById('viewCartBtn').addEventListener('click', function(e){
        e.preventDefault();
        var shoppingCartUrl = this.getAttribute('href');
        shoppingCartUrl += '/' + selectedBookId;
        window.location.href = shoppingCartUrl;
    });

    // Use event delegation for the viewCartBtn click event
    // $(document).on('click', '#viewCartBtn', function(e) {
    //     e.preventDefault();
    //     var shoppingCartUrl = $(this).attr('href');
    //     shoppingCartUrl += '/' + selectedBookId;
    //     window.location.href = shoppingCartUrl;
    // });

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





