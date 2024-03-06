@extends('eBookStore.layout.main')

@section('main')

    <div class="container-fluid mb-5 " 
    style="background-image: url('{{ asset("eBookStore/img/cover3.jpg") }}');
    background-position: center; background-repeat: no-repeat;
    background-size: cover; height: 500px; width: 100%;">

        <div class="d-flex flex-column align-items-center justify-content-start" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mt-4 mb-3"
            style="color: papayawhip;">Shopping Cart</h1>
            <!-- <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div> -->
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-3">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <!-- <th>Price</th> -->
                            <!-- <th>Quantity</th> -->
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="tablebody align-middle">
                        @foreach($cartDetails as $itemDetail)
                        <tr class="tablerow">
                            <td class="d-flex align-items-center">
                                <img class="img-fluid" style="width: 20%; height: auto;" src="{{ asset($itemDetail -> image) }}">
                                <div class="d-flex flex-column ml-2">
                                    <h5>{{ $itemDetail->title }}</h5>
                                    <p>Rs.{{ $itemDetail->price }}</p>
                                </div>
                            </td>
                            <!-- <td class="align-middle">$150</td> -->
                            <!-- <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td> -->
                            <td class="align-middle cartItem_price">Rs.{{ $itemDetail->price }}</td>

                            <td class="align-middle">
                                <a href="#"  data-id="{{ $itemDetail -> cartItemId }}"
                                    class="deleteBtn btn btn-sm btn-primary">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="subTotal-price font-weight-medium">0</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs.110</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="total-price font-weight-bold">0</h5>
                        </div>
                        <a href="{{ url('/checkOut')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.deleteBtn', function(event) {
            event.preventDefault();
            var cartItemId = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/shoppingCart/' + cartItemId,
                type: 'DELETE',
                success: function (response) {
                        console.log(response);
                        if (response.status == 200) {
                            console.log('Item deleted successfully');
                            updateTotalPrice();
                        }else
                        {
                           console.log('You can not remove this item.');
                        }
                    }
                });
            });
        function updateTotalPrice(){
            var total_price = 0;
            $('.tablerow').each(function(){
                var priceStr = $(this).find('.cartItem_price').text();
            // Converting the string type price into float type and replace null('') instead of Rs. and remove whitespace
                var priceNum = parseFloat(priceStr.replace('Rs.', '').trim());
                total_price += priceNum;
            });
            var totalPriceWithShipping = total_price + 110;
            $('.subTotal-price').text('Rs.'+ total_price);
            $('.total-price').text('Rs.'+ totalPriceWithShipping);
        }
        updateTotalPrice();
    });
</script>
@endsection
