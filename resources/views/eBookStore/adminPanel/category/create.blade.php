@include('eBookStore.adminPanel.layout')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <!-- @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif -->
            <ul id="saveForm_errlist"></ul>
            <div id="success_message"></div>
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">
                    Add Category
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-primary float-right">Back</a>
                    </h2>
                </div>
                <div class="card-body">

                    <form method="POST" id="category_store">
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" name="name" class="form-control name">
                            <!-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                        </div>
                        <button type="submit" id="category_add" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="{{ asset('eBookStore/backendJS/category.js') }}"></script> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).ready(function () {
    $(document).on('click','#category_add', function(event) {
        event.preventDefault();
        // console.log('Hello World!!!');
        var formData = {
            'name': $('.name').val(),
        }
        // console.log(formData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/AdminDashboard/Category/Store",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == 400) {
                    $('#saveForm_errlist').html("");
                    $('#saveForm_errlist').addClass('alert alert-danger');
                    $.each(response.errors, function (key, error_values){
                        $('#saveForm_errlist').append('<li>'+error_values+'</li>');
                    });
                }
                else{
                    $('#success_message').html("");
                    $('#success_message').text(response.message);
                    $('#success_message').addClass('alert alert-success');
                    $('#category_store').find('input').val("");
                }
            }
        });
    });
});
</script>
