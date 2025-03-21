<div class="container-fluid py-4" id="highly-recomended">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Highly Recomended Books</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel d-flex flex-wrap">
                @foreach ($books->skip(5)->take(5) as $book)
                    <div class="card product-item border-0 flex-grow-1" style="max-width: 200px; margin: 0 20px;">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset($book->image) }}" alt="">
                        </div>
                        <div
                            class="card-body border-left border-right text-center p-0 pt-4 pb-3 flex-grow-1 d-flex flex-column">
                            <h6 class="text-truncate mb-3">{{ $book->title }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>Rs.{{ $book->price }}</h6>
                                <h6 class="text-muted ml-2"><del>Rs.99.00</del></h6>
                            </div>
                            <div class="flex-grow-1"></div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="#" data-title="{{ $book->title }}" data-price="{{ $book->price }}"
                                data-description="{{ $book->description }}" data-image="{{ asset($book->image) }}"
                                data-rating="{{ $book->rating }}" class="viewDetailBtn btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            @if (auth()->check())
                                <a href="#" data-title="{{ $book->title }}" data-price="{{ $book->price }}"
                                    data-image="{{ asset($book->image) }}" data-id="{{ $book->id }}"
                                    class="addToCartBtn btn btn-sm text-dark p-0">
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            @else
                                <button class="btn btn-sm text-dark p-0" onclick="showLoginMessage()">
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
