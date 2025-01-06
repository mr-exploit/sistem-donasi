@extends('auth.app')

@section('title', 'Reset-Password - MSG')

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
                                <div class="modal-body">
                                    <h2 class="text-center mb-5">Reset Password</h2>
                                    @include('layouts.message')
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                        <input type="hidden" name="token" value="{{ request()->query('verify') }}">

                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="newpassword" placeholder="Re-type password" name="password_confirmation">
                                        </div>
                                        <button type="submit" class="btn btn-grays w-100">Send Reset Link</button>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="me-3 text-link navit" href="{{ url('login') }}">Back to Signin</a>
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