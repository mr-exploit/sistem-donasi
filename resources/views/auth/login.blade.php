@extends('auth.app')

@section('title', 'Login - TON MINING')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 ">
            <div class="card card-whitebgcsm border-0 shadow-lg  my-5">
                <div class="card-body p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="">
                                    </div>
                                    <div class="d-flex justify-content-center flex-row text-center gap-2 mb-5">
                                        <h2>Welcome to </h2>
                                        <h2 style="color:#007646"> LazisNu </h2>
                                        <h2>Kota Batam</h2>
                                    </div>
                                    <h2 style="color: #007646;" class="mb-4">Login</h2>
                                    @include('layouts.message')
                                    <form action="" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" style="color:#858E85;font-weight:bold; text-size: 1.5rem;" class="mb-4">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name='email'>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" style="color: #858E85; font-weight:bold; text-size:1.5rem;"
                                                class="mb-4">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name='password'>
                                        </div>
                                        <button type="submit" class="btn btn-grays w-100" style="background-color:#007646;color:#ffffff;">Sign in</button>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="me-3 text-link navit" href="{{ url('reset-password') }}" style="text-decoration: none;">Forgot Password?</a>
                                            <a class="me-3 text-link navit" href="{{ url('register') }}" style="text-decoration:none;">Create account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection