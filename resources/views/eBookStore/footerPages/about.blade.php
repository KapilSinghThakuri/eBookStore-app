@extends('eBookStore.layout.main')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h1 class="text-center mt-3" style="color: #ba6a62;">eBookStore</h1>
            <h5 class="text-center mb-3" style="font-size: 1rem; font-weight: 500;">"Your Choice, Your Pride"</h5>

        <div class="container-fluid d-flex">
            <img class="img-fluid" style="border-radius: 6px; max-width: 100%;" src="{{ url('eBookStore/img/uniqueCover.jpeg')}}" alt="Cover Image">
        </div>

            <div class = "AboutUs m-5">
                <div>
                    <h5 class = "text-primary"> About Us </h5>
                    <p>
                        Knowledge is priceless and books are the best means from which you can attain this knowledge.
                        Reading is believed to empower people, offer them education, and give them an opportunity to live for 
                        a moment in someone else’s shoes. Books are also a critical asset to improvement in one’s life while 
                        it also offers an occasional escape to fictional worlds inhabited by interesting characters of the books.
                        <br><br>
                        We are the team working hard to make reading more accessible.
                    </p>
                </div>
                <div class="mt-5">
                    <h3 class="text-center">"READ, LEAD & SUCCEED"</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
