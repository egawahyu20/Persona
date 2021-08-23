@extends('layouts.frontend_layout')

@section('title')
Home
@endsection

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Ketahui diri kamu lebih jauh bersama Persona</h1>
                <h2>Pelajari kepribadianmu dan mulailah berkembang!</h2>
                <div>
                    <a href="{{ url('tes') }}" class="btn-get-started scrollto">Mulai Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="{{ asset('frontend/img/hero-img.svg') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                    <img src="{{ asset('frontend/img/about-img.svg') }}" class="img-fluid" alt="" data-aos="zoom-in">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <h3 data-aos="fade-up">Persona</h3>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Adalah sebuah platform untuk mengetahui kepribadian berdasarkan Myers-Briggs Type Indicator, 
                        Persona sangat berguna bagi masyarakat dan perusahaan yang ingin memanfaatkan hasil tes kepribadian MBTI.
                    </p>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-users"></i>
                            <h4>Masyarakat</h4>
                            <p>Persona dapat digunakan untuk mengetahui dan mempelajari kepribadian, kemudian berkembanglah sesuai kepribadian yang kamu miliki</p>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <i class="fas fa-industry"></i>
                            <h4>Perusahaan</h4>
                            <p>Persona dapat anda gunakan untuk mengetahui kepribadian pelamar atau karyawan untuk menentukan posisi yang optimal bagi mereka di perusahaan anda.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Layanan Kami</h2>
                <p>Berikut adalah layanan yang kami tawarkan</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                        <h4 class="title"><a href="">Layanan Tes Gratis</a></h4>
                        <p class="description">Semua orang dapat menggunakan tes ini dengan gratis</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
                        <h4 class="title"><a href="">Tes Mudah Dan Cepat</a></h4>
                        <p class="description">Tes sangat mudah dilakukan hanya dengan mengklik pilihan yang sesuai diri kamu dan hasil akan keluar seketika setelah menyelesaikan tes</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-chart-line"></i></div>
                        <h4 class="title"><a href="">Rekomendasi Pengembangan Diri</a></h4>
                        <p class="description">Setelah melakukan tes kamu dapat mengikuti saran dari kami untuk semakin berkembang.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-building"></i></div>
                        <h4 class="title"><a href="">Partnership Perusahaan</a></h4>
                        <p class="description">Terbuka dukungan bagi Perusahaan yang ingin memanfaatkan layanan kami dengan mendaftarkan perusahaan anda</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </div>

            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Bagaimana untuk melakukan tes MBTI di Persona? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Tinggal tekan tombol "Mulai sekarang" di atas dan mulai menyelesaikan tes yang berisi quisioner dan hasil tes akan keluar
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Bagaimana jika perusahaan kami ingin memanfaatkan aplikasi anda? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Perusahaan yang ingin menggunakan fasilitas kami tinggal melakukan registrasi di website Persona kemudian selesaikan pendafataran.
                            Setelah di verifikasi oleh admin maka perusahaan akan bisa membuat token yang dapat digunakan untuk mengumpulkan data user yang melakukan tes menggunakan token perusahaan tersebut.
                        </p>
                    </div>
                </li>

            </ul>

        </div>
    </section><!-- End F.A.Q Section -->

</main><!-- End #main -->

@endsection