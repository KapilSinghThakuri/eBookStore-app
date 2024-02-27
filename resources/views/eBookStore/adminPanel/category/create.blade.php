@include('eBookStore.adminPanel.layout')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">
                    Add Category
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-primary float-right">Back</a>
                    </h2>
                </div>
                <div class="card-body">

                    <form method="POST" id="category_store">
                        @csrf
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" name="name" class="form-control name">
                        </div>
                        <button type="submit" id="category_add" class="btn btn-success save_data">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#category_store').on('submit', function(event) {
        event.preventDefault();
        var formData = {
                'name' : $(".name").val(),
            };
        $.ajax({
            url: '{{ route("/AdminDashboard/Category/Store") }}',
            method: 'post',
            data: formData,
            success: function (response) {
                console.log("Hello world!");
                alert('Category Added Successfully!!!');
            },
            error: function (){
                alert('Error occurred!!!');
            }
        });
    });
});
</script>
