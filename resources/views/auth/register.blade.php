@extends('auth.app')

@section('title', 'Register - TON MASTER')

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
                                    <h2 class="text-center mb-5">Create Account TON MASTER</h2>
                                    @include('layouts.message')
                                    <form action="" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="firstnamecreate" placeholder="firstname" name='firstname' required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="lastnamecreate" placeholder="lastname" name="lastname" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="emailcreate" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="referalCode" placeholder="Submit Refferal Code" name='refferalCode'>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="passwordcreate" placeholder="Create Password" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="passwordcreate" placeholder="Re-type Password" name="confirm_password">
                                        </div>

                                        <button type="submit" class="btn btn-grays w-100">Register</button>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="me-3 text-link navit" href="{{ url('login') }}">Already have an account? Sign in</a>
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