@extends('eBookStore.adminPanel.layout')
@section('body')

<div class="container-fluid" m-3>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="mt-2" id="successMessage"></div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="font-weight-semi-bold" style="font-size: 2rem;">Books Details
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-outline-primary rounded float-end">Back</a>
                    <input type="text" name="searchBook" class="border border-info rounded-pill float-end text-center mr-3" placeholder="Search Book" style="font-size: 1.3rem; height: 40px; width: 200px;">
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">S no.</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Title</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Price</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Quantity</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($totalBooks as $book)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>
                                <a href="#" class="removeBtn btn btn-outline-danger rounded" data-book-id= "{{ $book->id }}">Remove</a>
                                <a href="/AdminDashboard/Book/{{ $book->id }}/Edit" class="btn btn-outline-success rounded">Edit</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $totalBooks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.removeBtn').on('click', function (event) {
            event.preventDefault();
            var removeBtn = $(this);
            var bookId = removeBtn.data('book-id');

            // Update button text to indicate removal
            removeBtn.text('Removing..').prop('disabled', true);

            $.ajax({
                url: '/AdminDashboard/Book/' + bookId + '/Destroy',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == 200) {
                        console.log(response.message);
                        // Remove the corresponding row from the table
                        removeBtn.closest('tr').remove();

                        // Show success message
                        $('#successMessage').addClass('alert alert-success').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    removeBtn.text('Remove').prop('disabled', false);
                    $('#successMessage').addClass('alert alert-danger').text('Error removing book. Please try again.');
                }
            });
        });
    });
</script>
@endsection