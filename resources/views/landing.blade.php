@extends('layout.landing-app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="hero-content-wrapper">
        <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Selamat Datang di, SITRASTU UNIBA Madura!</h2>
        <p class="mb-30 wow fadeInUp" data-wow-delay=".4s">SITRASTU (Sistem Tracer Study UNIBA Madura) adalah sebuah sistem yang dirancang untuk membantu para alumni Universitas KH. Bahaudin Mudhary Madura dalam mencari informasi terkait dengan lulusan dari UNIBA madura.</p>
        <a href="/login" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s">Get Started <i class="lni lni-chevron-right"></i> </a>
      </div>
    </div>
    <div class="col-lg-6 align-self-end">
      <div class="hero-image wow fadeInUp" data-wow-delay=".5s">
        <img src="assets/img/hero/hero-5/hero-img.svg" alt="">
      </div>
    </div>
  </div>
</div>
@endsection