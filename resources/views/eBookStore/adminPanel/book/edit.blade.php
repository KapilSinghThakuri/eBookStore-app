
@extends('eBookStore.adminPanel.layout')
@section('body')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <ul id="saveForm_errlist"></ul>
            <div id="success_message"></div>
            <div class="card mb-4">
                <div class="card-header">
                    <h2 style="text-align: center;">
                    Edit Books
                    <a href="{{ url('/AdminDashboard/Book/index')}}" class="btn btn-primary float-right rounded">Back</a>
                    </h2>
                </div>
                <div class="card-body">

                    <form method="POST" id="book_update">
                        <div class="form-group">
                            <label>Book Title:</label>
                            <input type="text" name="title" value="{{ $bookDetails->title }}" class="form-control Booktitle">
                        </div>
                        <div class="form-group">
                            <label>Book description:</label>
                            <input type="text" name="description" value="{{ $bookDetails->description }}" class="form-control Bookdescription">
                        </div>
                        <div class="form-group">
                            <label>Book author:</label>
                            <input type="text" name="author" value="{{ $bookDetails->author }}" class="form-control Bookauthor">
                        </div>
                        <div class="form-group">
                            <label>Book price:</label>
                            <input type="text" name="price" value="{{ $bookDetails->price }}" class="form-control Bookprice">
                        </div>
                        <div class="d-flex flex-column form-group">
                            <label>Existing Book Image: </label>
                            <img src="{{ url($bookDetails->image) }}" style="width: 80px; height: auto; margin-bottom: 10px;">
                            <input type="file" name="image" class="form-control Bookimage">
                        </div>
                        <div class="form-group">
                            <label>Book quantity:</label>
                            <input type="text" name="quantity" value="{{ $bookDetails->quantity }}" class="form-control Bookquantity">
                        </div>
                        <div class="form-group">
                            <label>Book rating:</label>
                            <input type="text" name="rating" value="{{ $bookDetails->rating }}" class="form-control Bookrating">
                        </div>
                        <input type="hidden" name="id" value="{{ $bookDetails->id }}">
                        <button type="submit" id="book_update_btn" class="btn btn-outline-success rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#book_update').on('submit', function (event) {
            event.preventDefault();
            var bookId = $(this).find('input[name="id"]').val();
            var formData = $(this).serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'PUT',
                url: '/AdminDashboard/Book/' + bookId + '/Update',
                data: formData,
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        console.log(response.success);
                    }
                    else{
                        console.log(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    console.log('Error occurred while updating category.');
                }
            });
        });
    })
</script>
@endsection


