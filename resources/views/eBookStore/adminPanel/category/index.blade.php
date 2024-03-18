@extends('eBookStore.adminPanel.layout')
@section('body')

<div class="container-fluid" m-3>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="font-weight-semi-bold" style="font-size: 2rem;">Category Details
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-outline-primary rounded float-end">Back</a>
                    <input type="text" name="searchBook" class="border border-info rounded-pill float-end text-center mr-3" placeholder="Search Category" style="font-size: 1.3rem; height: 40px; width: 200px;">
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">S no.</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Category Title</th>
                            <!-- <th style="background-color: rgba(128, 128, 128, 0.5);">Price</th> -->
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($totalCategories as $category)
                          <tr>
                            <td>{{ $loop -> index+1 }}</td>
                            <td>{{ $category -> name }}</td>
                            <!-- <td></td> -->
                            <td>
                                <a href="" class="btn btn-outline-danger rounded">Remove</a>
                                <a href="" class="btn btn-outline-success rounded">Edit</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $totalCategories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection