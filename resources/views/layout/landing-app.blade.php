<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SITRASTU UNIBA</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap-5.0.0-beta1.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/LineIcons.2.0.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tiny-slider.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/lindy-uikit.css"/>
  </head>
  <body>

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-5 start ========================= -->
    <section id="home" class="hero-section-wrapper-5">

      <!-- ========================= header-6 start ========================= -->
      <header class="header header-6">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="/">
                    {{-- <img src="assets/img/logo/logo.svg" alt="Logo" /> --}}
                    <h4>SITR<span>ASTU.</span></h4>
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent6" aria-controls="navbarSupportedContent6" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>
  
                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent6">
                    <ul id="nav6" class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a class="page-scroll active" href="#home">Beranda</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#about">Tentang</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#contact">Kontak</a>
                      </li>
                      <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/login">LogIn</a></li>
                          <li><hr class="dropdown-divider" /></li>
                          <li><a class="dropdown-item" href="/register">SignUp</a></li>
                      </ul>
                      </li>
                    </ul>
                  </div>
                  <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
              </div>
            </div>
            <!-- row -->
          </div>
          <!-- container -->
        </div>
        <!-- navbar area -->
      </header>
      <!-- ========================= header-6 end ========================= -->

      <!-- ========================= hero-5 start ========================= -->
      <div class="hero-section hero-style-5 img-bg" style="background-image: url('assets/img/hero/hero-5/hero-bg.svg')">
        @yield('content')
      </div>
      <!-- ========================= hero-5 end ========================= -->
    </section>
    <!-- ========================= hero-section-wrapper-6 end ========================= -->

    <!-- ========================= about style-4 start ========================= -->
    <section id="about" class="about-section about-style-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-5 col-lg-6">
            <div class="about-content-wrapper">
              <div class="section-title mb-30">
                <h3 class="mb-25 wow fadeInUp" data-wow-delay=".2s">SITRASTU (SISTEM TRACER STUDY UNIBA MADURA)</h3>
                <p class="wow fadeInUp" data-wow-delay=".3s"> Sistem Tracer Study di UNIBA Madura bertujuan untuk mengevaluasi dan meningkatkan profil lulusan melalui pengumpulan data mengenai kesesuaian pengetahuan dan keterampilan yang diperoleh dengan pekerjaan mereka. Informasi lebih lanjut dapat ditemukan dalam dokumen terkait yang tersedia di situs resmi Uniba Madura.</p>
              </div>
              <a href="https://unibamadura.ac.id/" target="_blank" class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".5s">Learn More</a>
            </div>
          </div>
          <div class="col-xl-7 col-lg-6">
            <div class="about-image text-lg-right wow fadeInUp" data-wow-delay=".5s">
              <img src="{{ asset('assets') }}/img/about/about-4/about-img.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= about style-4 end ========================= -->

    <!-- ========================= testimonial style-4 start ========================= -->
    <section id="testimonial" class="testimonial-section testimonial-style-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center mb-60">
              <h3 class="wow fadeInUp" data-wow-delay=".2s">Alumni Yang Berprestasi</h3>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="single-testimonial wow fadeInUp" data-wow-delay=".2s">
              <div class="content-wrapper">
                <div class="info">
                  <div class="image">
                    <img src="{{ asset('assets') }}/img/testimonial/testimonial-4/Profil-wa.png" alt="">
                  </div>
                  <div class="text">
                    <h6>Alumni lain</h6>
                    <p>Pekerjaan</p>
                  </div>
                </div>
                <div class="content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Leo duis augue commodo neque auctor nisl, libero nunc, egestas. Pellentesque senectus.</p>
                  <div class="quote">
                    <i class="lni lni-quotation"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-testimonial wow fadeInUp" data-wow-delay=".4s">
              <div class="content-wrapper">
                <div class="info">
                  <div class="image">
                    <img src="{{ asset('assets') }}/img/testimonial/testimonial-4/Profil-nab.png" alt="">
                  </div>
                  <div class="text">
                    <h6>Nabil Muflih Hanan</h6>
                    <p>Fullstack Developer</p>
                  </div>
                </div>
                <div class="content">
                  <p>Seorang alumni yang berprestasi, telah berhasil diterima bekerja di salah satu perusahaan terbesar di indonesia, yaitu Bank Rakyat Indonesia, sebagai full stack developer.</p>
                  <div class="quote">
                    <i class="lni lni-quotation"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="single-testimonial wow fadeInUp" data-wow-delay=".6s">
              <div class="content-wrapper">
                <div class="info">
                  <div class="image">
                    <img src="{{ asset('assets') }}//img/testimonial/testimonial-4/Profil-wa.png" alt="">
                  </div>
                  <div class="text">
                    <h6>Alumni lain</h6>
                    <p>Pekerjaan</p>
                  </div>
                </div>
                <div class="content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Leo duis augue commodo neque auctor nisl, libero nunc, egestas. Pellentesque senectus.</p>
                  <div class="quote">
                    <i class="lni lni-quotation"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= testimonial style-4 end ========================= -->

    <!-- ========================= contact-style-3 start ========================= -->
    <section id="contact" class="contact-section contact-style-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
            <div class="section-title text-center mb-50">
              <h3 class="mb-15">Kontak</h3>
              <p>Silahkan, jika ada keluhan atau masalah pada website ini hubungi kami dibawah ini!</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="contact-form-wrapper">
              <form action="{{ asset('assets') }}/php/contact.php" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="name" name="name" class="form-input" placeholder="Name">
                      <i class="lni lni-user"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="email" id="email" name="email" class="form-input" placeholder="Email">
                      <i class="lni lni-envelope"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="number" name="number" class="form-input" placeholder="Number">
                      <i class="lni lni-phone"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <input type="text" id="subject" name="subject" class="form-input" placeholder="Subject">
                      <i class="lni lni-text-format"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-input">
                      <textarea name="message" id="message" class="form-input" placeholder="Message" rows="6"></textarea>
                      <i class="lni lni-comments-alt"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-button">
                      <button type="submit" class="button"> <i class="lni lni-telegram-original"></i> Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="left-wrapper">
              <div class="row">
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-phone"></i>
                    </div>
                    <div class="text">
                      <p>+6287899035174</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-envelope"></i>
                    </div>
                    <div class="text">
                      <p><a href="">nabilmuflihhanan@gmail.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= contact-style-3 end ========================= -->

    <!-- ========================= footer style-4 start ========================= -->
    <footer class="footer footer-style-4">
      <div class="container">
        <div class="widget-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                <div class="logo">
                  <a href="https://unibamadura.ac.id/" target="_blank"> <img src="{{ asset('assets') }}/img/logo/logo-inversblack.png" alt=""> </a>
                </div>
                <p class="desc">Dari Madura untuk Indonesia</p>
                <ul class="socials">
                  <li> <a href="#0"> <i class="lni lni-facebook-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-twitter-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-instagram-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-linkedin-original"></i> </a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
                <h6>Quick Link</h6>
                <ul class="links">
                  <li> <a href="#home">Home</a> </li>
                  <li> <a href="#about">About</a> </li>
                  <li> <a href="#contact">Contact</a> </li>
                  <li> <a href="/login">LogIn</a> </li>
                  <li> <a href="/register">SigIn</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                <h6>Program Studi</h6>
                <ul class="links">
                  <li>FST (Fakultas Sains dan Teknologi)</li>
                  <li>FEB (Fakultas Ekonomi dan Bisnis)</li>
                  <li>FH (Fakultas Hukum)</li>
                  <li>FBA (Fakultas Bahasa Asing)</li>
                  <li>FILKOM (Fakultas Ilmu Komunikasi)</li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">

            </div>
          </div>
        </div>
        <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
          <p>Copyright &copy; 2025 | Design and Developed by <a href="https:instagram.com/ebil.rap" rel="nofollow" target="_blank">ebilrap.</a></p>
        </div>
      </div>
    </footer>
    <!-- ========================= footer style-4 end ========================= -->

    <!-- ========================= scroll-top start ========================= -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
    <!-- ========================= scroll-top end ========================= -->
		

    <!-- ========================= JS here ========================= -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets') }}/js/bootstrap-5.0.0-beta1.min.js"></script>
    <script src="{{ asset('assets') }}/js/contact-form.js"></script>
    <script src="{{ asset('assets') }}/js/tiny-slider.js"></script>
    <script src="{{ asset('assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
  <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'8fb42acf5b420e7a',t:'MTczNTc1MTg5My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
