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
                <h2>Hasil Tes</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Hasil Tes</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="section-title">
                <p>{{ $hasil }} (<i>{{$mbtiData->alias}}</i>)</p>
            </div>
            <div>
                <h5 class="fw-bold">Pemusatan perhatian</h5>
                <div class="row">
                    <div class="col">Introvert (I)</div>
                    <div class="col text-end">(E) Extrovert</div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $indeksMBTI['I'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['I'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['I'] }}%</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $indeksMBTI['E'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['E'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['E'] }}%</div>
                </div>
            </div>
            <div>
                <h5 class="fw-bold">Cara memahami informasi dari luar</h5>
                <div class="row">
                    <div class="col">Sensing (S)</div>
                    <div class="col text-end">(N) Intuition</div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $indeksMBTI['S'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['S'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['S'] }}%</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $indeksMBTI['N'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['N'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['N'] }}%</div>
                </div>
            </div>
            <div>
                <h5 class="fw-bold">Cara menarik kesimpulan dan keputusan</h5>
                <div class="row">
                    <div class="col">Thinking (T)</div>
                    <div class="col text-end">(F) Feeling</div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $indeksMBTI['T'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['T'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['T'] }}%</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $indeksMBTI['F'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['F'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['F'] }}%</div>
                </div>
            </div>
            <div>
                <h5 class="fw-bold">Cara menghadapi dunia luar</h5>
                <div class="row">
                    <div class="col">Judging (J)</div>
                    <div class="col text-end">(P) Perceiving</div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $indeksMBTI['J'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['J'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['J'] }}%</div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $indeksMBTI['P'] }}%;"
                        aria-valuenow="{{ $indeksMBTI['P'] }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $indeksMBTI['P'] }}%</div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Development Section ======= -->
    <section class="section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Karakteritik</h2>
                <p>Berikut adalah karakterisitik {{ $hasil }}</p>
            </div>
                <div class="text-center">
                        @foreach ($mbtiData->character as $char)
                        <h3><i class="fas fa-angle-double-right"></i> {{$char->characteristic}}</h3>
                        @endforeach  
                </div>
        </div>
    </section><!-- End Services Section -->

    <section class="inner-page">
        <div class="container">
                        <div class="section-title">
                <h2>Pengembangan</h2>
                <p>Berikut adalah saran pengembangan dari kami</p>
            </div>
            <div class="row">
                <div class="col-8">
                    <ul class="list-group">
                        <li class="list-group-item bg-gradient active" aria-current="true" style="background-color:  #eb5d1e; border-color: #eb5d1e;">Pengembangan Diri</li>
                        @foreach ($mbtiData->development as $dev)
                        <li class="list-group-item"><i class="fas fa-angle-double-right"></i> {{$dev->development_suggestion}}</li>
                        @endforeach  
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-group">
                        <li class="list-group-item bg-gradient border-warning active" style="background-color:  #eb5d1e; border-color: #eb5d1e;" aria-current="true">Pengembangan karir</li>
                        @foreach ($mbtiData->carrier as $carrier)
                        <li class="list-group-item">{{$carrier->carrier_suggestion}}</li>
                        @endforeach  
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
