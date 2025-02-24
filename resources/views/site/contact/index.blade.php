@extends('layouts.site')

@section('content')
@include('components.page-header')

<!-- Contact Start -->
<section class="contact-two">
    <div class="container wow fadeInUp animated" data-wow-delay="300ms">
        <div class="section-title text-center">
            <h5 class="section-title__tagline section-title__tagline--has-dots">Bizimle İletişime Geçin</h5>
            <h2 class="section-title__title">Sorularınızı Bekliyoruz</h2>
        </div>
        <div class="contact-one__left text-center">
            <div class="contact-one__form-box">
                <form action="{{ route('contact.store') }}" method="POST" class="contact-one__form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Adınız" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Soyadınız" name="last_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-one__input-box">
                                <input type="email" placeholder="E-posta Adresiniz" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Telefon Numaranız" name="phone_number" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Konu" name="subject" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-one__input-box text-message-box">
                                <textarea name="message" placeholder="Mesajınızı Yazın" required></textarea>
                            </div>
                            <div class="contact-one__btn-box">
                                <button type="submit" class="ogency-btn">Mesaj Gönder</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->
@if (session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                  <i class="bi bi-success"></i>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successToast = new bootstrap.Toast(document.getElementById('successToast'));
            successToast.show();
        });
    </script>
@endif

@endsection
