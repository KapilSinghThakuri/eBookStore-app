{{-- <div class="container-fluid pt-5" id="Kids-Teens">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Kid's & Teens Books</span></h2>
    </div>
    <div class="row px-3 pb-3">
        @foreach ($childrenBooks as $childreanBook)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($childreanBook->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$childreanBook->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $childreanBook -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="#"
                            data-title="{{ $childreanBook->title }}"
                            data-price="{{ $childreanBook->price }}"
                            data-description="{{ $childreanBook->description}}"
                            data-rating="{{ $childreanBook->rating }}"
                            data-image="{{ asset($childreanBook->image) }}"
                            class="viewDetailBtn btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        @if (auth()->check())
                        <a href="#"
                        data-title="{{ $childreanBook->title }}"
                        data-price="{{ $childreanBook->price }}"
                        data-image="{{ asset($childreanBook->image) }}"
                        data-id="{{ $childreanBook->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        @else
                            <button class="btn btn-sm text-dark p-0" onclick="showLoginMessage()">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            @endif
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div> --}}
