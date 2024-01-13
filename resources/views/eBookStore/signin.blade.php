
@extends('eBookStore.layout.main')

@section('main')

<!-- Login section start -->

    <div class="container" >
        <div class="wrapper" style="background-color: #D19C97;">
            <form action="">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <!--Using emmet(.input-box),Result= <div class="input-box"></div> -->
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <!--using emmet (button.btn), result=<button class="btn"></button> -->
                <button type="submit" class="btn">Login</button>

                <div class="sign-with">
                    <p>Or login with</p>
                    <a href="#" class="google" > <i class='bx bxl-google'></i> 
                    Continue with Google </a>
                </div>


                <div class="register-link">
                    <p>Don't have an account? <a href="{{ url('/register') }}">Register</a> </p>
                </div>
            </form>
        </div>
    </div>
<!-- Login section end -->

@endsection