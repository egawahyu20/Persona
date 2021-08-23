@extends('layouts.frontend_layout')

@section('title')
Login
@endsection

@section('pagecss')
<link href="{{ asset('frontend/css/floating-labels.css') }}" rel="stylesheet">
@endsection

@section('content')

<main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Login</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
          <div class="col-8 offset-2">
            <div class="input-float">
                <form class="persona-button persona-form" action="{{ url('auth') }}" method="post">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if($message = Session::get('failed'))
                    <div class="alert alert-danger text-center">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="text-center mb-3">
                        <h5 class="card-title"> <strong>Login</strong> </h5>
                        <p class="card-text">Senang bertemu kembali</p>
                    </div>
                    @csrf
                    <div class="col-8 offset-2">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="col-8 offset-2">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="text-center">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
