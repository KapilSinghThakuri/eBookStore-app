@extends('eBookStore.layout.main')

@section('main')

<!-- Register section start -->
<div class="container-fluid mt-5 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12">

                <div class="card bg-primary" id="register-card">
                    <div class="card-header" style="text-align: center; color: black; font-size: 2.2rem; font-weight:550;">
                        Sign up
                    </div>
                    <div class="card-body" >
                        <form action="" method="" title="Register">
                            <div class="form-group mb-4">
                                <label for="" class="text-white">Full Name</label>
                                <input type="text" name="" class="form-control bg-primary text-white" placeholder="Enter your full name">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="text-white">Email</label>
                                <input type="text" name="" class="form-control bg-primary text-white" placeholder="Enter your Email">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="text-white">Password</label>
                                <input type="text" name="" class="form-control bg-primary text-white" placeholder="Create Strong Password">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="text-white">Re-Password</label>
                                <input type="text" name="" class="form-control bg-primary text-white" placeholder="Enter Password to Confirm">
                            </div>
                            <div class="register-btn d-flex justify-content-center">
                                <button type="" class="btn btn-secondary" id="register-btn">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="already-register mt-2 d-flex justify-content-center text-white">
                        Already Registered?
                            <a href="{{ url('/login') }}" class="text-white ml-2">Signin</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Register section end -->


@endsection