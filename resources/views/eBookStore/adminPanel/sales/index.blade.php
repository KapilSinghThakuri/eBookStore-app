@extends('eBookStore.adminPanel.layout')
@section('body')

<div class="container-fluid" m-3>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="font-weight-semi-bold text-center" style="font-size: 2rem;">Weekly Sales Details
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-outline-primary rounded float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">S no.</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Sales</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Total Amount</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Date</th>
                            <th style="background-color: rgba(128, 128, 128, 0.5);">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection