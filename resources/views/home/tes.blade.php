@extends('layouts.frontend_layout')

@section('title')
Tes MBTI
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
                    <li>Tes</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        @if($message = Session::get('failed'))
                        <div class="col-10 offset-1 alert alert-danger text-center">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="col-10 offset-1">
                            <h1>Tes Persona</h1>
                        </div>
                    </div>
                    <div class='row info-box justify-content-center'>

                        <div class="col-lg-10 mb-4">
                            Di bawah ini ada 60 nomor. Masing-masing nomor memiliki dua pernyataan yang bertolak
                            belakang
                            pernyataan kanan dan kiri. Pilihlah salah satu pernyataan yang paling sesuai dengan diri
                            Anda dengan
                            mengklik
                            tombol berisi pernyataan yang sesuai dengan anda. <strong>Anda HARUS memilih salah satu yang dominan
                                serta mengisi semua nomor.</strong> 
                        </div>
                    </div>
                    <form action='{{ route('hasil-tes') }}' method='POST'>
                        @csrf
                        <div class="col-md-10 offset-md-1 persona-button">
                            <hr class="my-3">
                            <div class="alert alert-secondary" role="alert">           
                                <p class="text-center font-monospace"><i class="fas fa-info-circle"></i> Jika anda tes kepribadian untuk sebuah perusahaan yang sudah berpartner dengan kami masukkan nama anda dan token yang telah diberikan oleh perusahaan.</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control rounded-start" placeholder="Masukkan Token" id="token" name="token" aria-label="Token">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control rounded-end" placeholder="Masukkan Nama Anda" name="nama_peserta_tes" aria-label="Nama">
                                </div>
                            </div>

                            <hr class="my-3">
                            @foreach ($soal_tes as $soal)
                            <div class="row justify-content-center">
                                <div class="btn-group align-self-stretch" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="{{ 'soal['.$soal->id.']' }}"
                                        id="{{ $soal->id.'A' }}" autocomplete="off" value="{{ $soal->type1 }}" required>
                                    <label class="btn btn-outline-warning col-6"
                                        for="{{ $soal->id.'A' }}">{{ $soal->statement1 }}</label>

                                    <input type="radio" class="btn-check" name="{{ 'soal['.$soal->id.']' }}"
                                        id="{{ $soal->id.'B' }}" autocomplete="off" value="{{ $soal->type2 }}" required>
                                    <label class="btn btn-outline-warning col-6"
                                        for="{{ $soal->id.'B' }}">{{ $soal->statement2 }}</label>
                                </div>
                                <hr class="my-3">
                            </div>
                            @endforeach
                            <div class="row justify-content-center">
                                <button class="col-md-5" type="submit">Selesai</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection