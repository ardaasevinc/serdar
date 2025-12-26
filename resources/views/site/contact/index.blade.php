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

                                <div class="col-md-12 text-start">
                                    <label for="kvkkCheckbox" style="font-size: 14px;">
                                        <input type="checkbox" id="kvkkCheckbox" name="kvkk_agreement"
                                            onclick="handleKvkkClick(event)" />
                                        KVKK Aydınlatma Metni’ni okudum, kişisel verilerimin işlenmesine açık rıza
                                        gösteriyorum.
                                    </label>
                                </div><br><br>
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
    <!--Contact Info Start-->
    <section class="contact-info">
        <div class="container">
            <div class="contact-info__wrapper">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="contact-info__item">
                            <div class="contact-info__item__icon"><span class="icon-place"></span></div>
                            <h3 class="contact-info__item__title">Adres</h3>
                            <p class="contact-info__item__text">
                                Ferhatpaşa Mahallesi Çalışkan Çıkmazı Sokak No:10 <br> Çatalca/İstanbul
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="contact-info__item">
                            <div class="contact-info__item__icon"><span class="icon-phone"></span></div>
                            <h3 class="contact-info__item__title">İletişim</h3>
                            <p class="contact-info__item__text">
                                <a href="mailto:needhelp@company.com">{{$settings?->site_email}}</a>
                                <a href="tel:+92880048720">+{{$settings?->site_phone}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-7">
                        <div class="contact-info__item">
                            <div class="contact-info__item__icon"><span class="icon-schedule"></span></div>
                            <h3 class="contact-info__item__title">Çalışma Saatleri</h3>
                            <p class="contact-info__item__text">
                                Ptesi - Cuma : 8:00 - 00:00 pm<br> Pazar: KAPALI
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Info End-->
    <!--Google Map Start-->
    <section class="google-map">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.406683276997!2d28.48921981222507!3d41.14747647121178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55ab42c922469%3A0x295d99f157f3736a!2zRmVyaGF0cGHFn2EsIMOHYWzEscWfa2FuIMOHayBTayBObzoxMCwgMzQ4ODggw4dhdGFsY2EvxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1744972520937!5m2!1str!2str"
            class="google-map__one" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!--Google Map End-->

<div id="kvkkModal"
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:9999;">


        <div
            style="position:relative; width:90%; max-width:700px; margin:5% auto; background:transparent; padding:20px; border-radius:8px;">
           

            <iframe src="{{ route('site.kvkk') }}" style="width:100%; height:400px; border:none;"></iframe>

            <div class="contact-one__btn-box" style="text-align:right; margin-top:15px;">
                <button type="button" class="ogency-btn" onclick="acceptKvkk()">Okudum Anladım</button>
            </div>
        </div>
    </div>

    <script>
        let allowKvkkCheck = false;

        function handleKvkkClick(event) {
            if (!allowKvkkCheck) {
                event.preventDefault(); // checkbox işaretlenemesin
                document.getElementById('kvkkModal').style.display = 'block';
            }
        }

        function acceptKvkk() {
            allowKvkkCheck = true;
            document.getElementById('kvkkCheckbox').checked = true;
            document.getElementById('kvkkModal').style.display = 'none';
        }
    </script>



    @include('components.success')





@endsection