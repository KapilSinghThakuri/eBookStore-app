@extends('eBookStore.adminPanel.layout')
@section('body')
    <style type="text/css">
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            position: relative;
        }
        .card-header .back-btn {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
        }
        .card-body {
            padding: 40px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .btn-add {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admindashboard')}}" class="back-btn">&#8592; Back</a>
                        Add User
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add-user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="name" class="form-control" id="username" placeholder="Enter username">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-add">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection