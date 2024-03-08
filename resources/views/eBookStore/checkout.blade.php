@extends('eBookStore.layout.main')

@section('main')

    <div class="container-fluid mb-5 " 
    style="background-image: url('{{ asset("eBookStore/img/cover3.jpg") }}');
    background-position: center; background-repeat: no-repeat; background-size: cover; height: 500px; width: 100%;">

        <div class="d-flex flex-column align-items-center justify-content-start" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mt-4 mb-3" 
            style="color: papayawhip;">Checkout</h1>
            <!-- <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div> -->
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">

            <form id="order_items">

                <div class="mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>

                    <ul id="saveForm_errlist"></ul>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input name="name" class="name form-control" type="text" value="{{ $userName }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="email form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="phone" class="phone form-control" type="text" placeholder="98********">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Province</label>
                            <select name="province" class="province custom-select">
                                <option selected>Select Province</option>
                                <option value="Gandaki">Gandaki</option>
                                <option value="Bagmati">Bagmati</option>
                                <option value="Lumbini">Lumbini</option>
                                <option value="Madesh">Madesh</option>
                                <option value="Koshi">Koshi</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input name="city" class="city form-control" type="text" placeholder="City">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Postal Code</label>
                            <input name="postalcode" class="form-control" type="text" placeholder="123">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input name="street1" class="street1 form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input name="street2" class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="total_amount" class="totalPaybleAmt"  value="" class="form-control">
                        </div>

                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="eSewa" class="payment custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">e-Sewa</label>
                                </div>
                            </div>
                            <div class="form-group ml-5">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="MobileBanking" class="payment custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Mobile Banking</label>
                                </div>
                            </div>
                            <div class="form-group ml-5">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="CashOnDelivery" class="payment custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" class="orderPlace btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                        <div class="success_message"></div>
                    </div>
                </div>
            </form>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Items</h5>
                        @foreach($cartDetails as $item)
                        <div class="checkoutItems d-flex justify-content-between">
                            <p>{{ $item->title }}</p>
                            <p class="itemPrice">Rs.{{ $item->price }}</p>
                        </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="subTotalAmt font-weight-medium">0</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs.110</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h6 class="font-weight-bold">Total Payable Amount</h6>
                            <h5 class="totalAmount font-weight-bold">0</h5>
                        </div>
                    </div>
                </div>
                <!-- <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">e-Sewa</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Mobile Banking</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Cash On Delivery</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Checkout End -->
    <script type="text/javascript">
        $(document).ready(function(){
            function calculatingTotalAmount() {
                var totalAmount = 0;
                $('.checkoutItems').each(function () {
                    var strAmount = $(this).find('.itemPrice').text();
                    var numAmount = parseFloat(strAmount.replace('Rs.','').trim());
                    totalAmount += numAmount;
                });
                var totalAmountWithShipping = totalAmount + 110;
                $('.subTotalAmt').text('Rs.'+ totalAmount);
                $('.totalAmount').text('Rs.'+ totalAmountWithShipping);
                $('.totalPaybleAmt').val(totalAmountWithShipping); // Set total amount to hidden input field
            }
            calculatingTotalAmount() ;

            $('.orderPlace').click(function(event){
                event.preventDefault();

                // const form = $('#order_items')[0];
                // const formData = new FormData(form);
                // formData.append('total_amount', $('.totalPaybleAmt').val());
                // console.log(formData);
                var formData = {
                    'name' : $(".name").val(),
                    'email' : $(".email").val(),
                    'phone' : $(".phone").val(),
                    'province' : $(".province").val(),
                    'city' : $(".city").val(),
                    'street1' : $(".street1").val(),
                    'total_amount' : totalAmountWithShipping,
                    'payment' : $(".payment:checked").val(),
                };

            // Cache the button element
                var $orderPlaceBtn = $(this);
            // Change button text to indicate processing
                $orderPlaceBtn.text('Order Placing...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/checkOut/orderSubmitting',
                    type: 'POST',
                    data: formData,
                    // contentType: false,
                    // processData: false,
                    success: function (response) {
                        console.log(response);
                        if(response.status == 200){
                            $('.success_message').html("");
                            $('.success_message').addClass('alert alert-success');
                            $('.success_message').text(response.success);
                            $('#order_items').find('input').val("");
                            // Reset button text on error
                            $orderPlaceBtn.text('Place Order');
                        }
                        else
                        {
                            $('#saveForm_errlist').html("");
                            $('#saveForm_errlist').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                            $('#saveForm_errlist').append('<li>'+ err_values + '</li>');
                            });
                            console.log('Error occurrred !!!');
                        }
                    },
                    error: function(textStatus, errorThrown){
                        console.log('error occurrred:',textStatus, errorThrown);
                    },
                    complete: function() {
                        $orderPlaceBtn.text('Place Order'); // Reset button text on completion
                    }
                });
            });
        });
    </script>
@endsection