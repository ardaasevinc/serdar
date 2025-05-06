@extends('layouts.site')

@section('content')
    @include('components.page-header')
    <section class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">


                    <p>
                        6698 sayılı Kişisel Verilerin Korunması Kanunu (“Kanun”) kapsamında, 314 Agency olarak kişisel
                        verilerinizin korunmasına büyük önem veriyoruz.
                        İşbu Aydınlatma Metni; kişisel verilerinizin hangi amaçlarla toplandığı, hangi hukuki sebeplerle
                        işlendiği, kimlere aktarılabileceği ve hangi haklara sahip olduğunuz konusunda sizleri
                        bilgilendirmek
                        amacıyla hazırlanmıştır.
                    </p>
                    <p>
                        Kişisel verileriniz; hizmet ve ürünlerimizin sunulabilmesi, sizlerle iletişime geçilebilmesi,
                        taleplerinizin yerine getirilebilmesi ve yasal yükümlülüklerin yerine getirilmesi amacıyla, Kanun’un
                        5.
                        ve 6. maddelerinde belirtilen kişisel veri işleme şartlarına uygun olarak toplanmakta ve
                        işlenmektedir.
                    </p>
                    <p>
                        Toplanan kişisel verileriniz, hizmetin gereklilikleri haricinde hiçbir şekilde üçüncü kişilerle
                        paylaşılmamakta olup, gerekli tüm teknik ve idari güvenlik önlemleri alınmaktadır.
                    </p>
                    <p>
                        KVKK kapsamında, kişisel verilerinizle ilgili olarak <strong>veri sorumlusu</strong> sıfatıyla
                        <strong>314 Agency</strong>’ye başvurarak;
                    <ul>
                        <li>Kişisel verilerinizin işlenip işlenmediğini öğrenme,</li>
                        <li>İşlenmişse buna ilişkin bilgi talep etme,</li>
                        <li>Verilerin aktarıldığı üçüncü kişileri öğrenme,</li>
                        <li>Eksik ya da yanlış işlenmişse düzeltilmesini isteme,</li>
                        <li>Kanunda öngörülen şartlar çerçevesinde silinmesini veya yok edilmesini talep etme</li>
                    </ul>
                    haklarına sahipsiniz.
                    </p>
                    <p>
                        Detaylı bilgi ve başvuru için <a
                            href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</a> adresinden
                        bizimle iletişime geçebilirsiniz.
                    </p>

                    <br><br><br>
                    <p>
                        6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) kapsamında, 314 Agency tarafından sunulan
                        hizmetlere ilişkin olarak kişisel verilerimin;
                    <ul>
                        <li>Hizmetlerin sunulması,</li>
                        <li>Tarafıma bilgilendirme yapılması,</li>
                        <li>Ticari ileti gönderilmesi,</li>
                        <li>İstatistiksel analiz ve raporlama yapılması</li>
                    </ul>
                    amaçlarıyla işlenmesine, saklanmasına ve yasal gereklilikler doğrultusunda üçüncü kişilerle
                    paylaşılmasına <strong>açık rıza veriyorum.</strong>
                    </p>
                    <p>
                        Bu onay, tarafımca özgür iradeyle verilmiş olup, dilediğim zaman <a
                            href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</a> adresine başvurarak geri çekme hakkım
                        bulunmaktadır.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- KVKK End -->
@endsection