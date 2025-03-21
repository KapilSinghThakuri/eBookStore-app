<div class="lovedBooks">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Top 10 Coming Soon Books</span></h2>
    </div>
    @foreach ($books->take(5) as $book)
        <div class="books">
            <a href="#"> <img src="{{ asset($book->image) }}" alt="book1" height="230px" width="250px"> </a>
            <div class="description"> {{ $book->description }} </div>
        </div>
    @endforeach()
</div>
