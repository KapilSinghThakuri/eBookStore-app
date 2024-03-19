
@extends('eBookStore.adminPanel.layout')
@section('body')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <ul id="saveForm_errlist"></ul>
            <div id="success_message"></div>
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">
                    Edit Category
                    <a href="{{ url('/AdminDashboard/Category/index')}}" class="btn btn-primary float-right rounded">Back</a>
                    </h2>
                </div>
                <div class="card-body">

                    <form method="POST" id="category_update">
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" name="name" value="{{ $categoryId->name }}" class="form-control name">
                            <input type="hidden" name="id" value="{{ $categoryId->id }}">
                        </div>
                        <button type="submit" id="category_update_btn" class="btn btn-outline-success rounded">Update</button>
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
        $('#category_update').on('submit', function (event) {
            event.preventDefault();
            var categoryId = $(this).find('input[name="id"]').val();
            var formData = $(this).serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'PUT',
                url: '/AdminDashboard/Category/' + categoryId + '/Update',
                data: formData,
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        console.log(response.message);
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


