
@extends('eBookStore.layout.main')

@section('main')

<!-- Login section start -->

    <div class="container" >
        <div class="wrapper" style="background-color: #D19C97;">

            <form action="">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username or " required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" id="login-btn">Login</button>

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