<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Yeni Mesaj - 314 Agency</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #000;
            color: #fff;
            padding: 40px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
            background-color: #000;
        }

        .logo {
            width: 120px;
            margin: 20px auto;
        }

        .brand {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand img {
            height: 40px;
        }

        .content {
            margin-top: 40px;
            text-align: left;
        }

        .footer {
            margin-top: 60px;
            font-size: 12px;
            color: #aaa;
        }

        .social {
            margin-top: 20px;
        }

        .social img {
            width: 20px;
            margin: 0 5px;
        }
    </style>
</head>

<body style="font-family: 'Outfit', sans-serif; background-color: #000; color: #fff; padding: 40px; margin: 0;">
    <div class="container" style="max-width: 600px; margin: auto;">

        
        <div style="width: 100%; display: flex; justify-content: flex-start; margin-bottom: 20px;">
            <a href="https://www.314agency.com" target="_blank">
                <img src="{{ asset('assets/mail/be.svg') }}" alt="BE Creative" style="height: 40px;">
            </a>
        </div>

        
        <div style="width: 100%; text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('assets/mail/logo.svg') }}" alt="314 Agency" style="height: 100px;">
        </div>

        
        <div class="content" style="text-align: left; margin-bottom: 40px; text-align:center;">   
            <h2 style="color: #fff; font-size:50px;"><strong>Teşekkürler</strong></h2>
            <p style="line-height: 1.6;">Sayın {{ $form['first_name'] }} {{ $form['last_name'] }} mesajınızı aldık.</p>
            <p style="line-height: 1.8;"> En yakın zamanda sizinle iletişime geçeceğiz</p>
        </div>

        {{-- ROW 4: Footer --}}
        <div class="footer" style="text-align: center; font-size: 12px; color: #aaa;">
            <div class="social" style="margin-bottom: 10px;">
                @if (!empty($settings->facebook_url))
                    <a href="{{ $settings->facebook_url }}" target="_blank">
                        <img src="{{ asset('assets/mail/icon-facebook.svg') }}" style="width: 20px; margin: 0 5px;">
                    </a>
                @endif

                @if (!empty($settings->instagram_url))
                    <a href="{{ $settings->instagram_url }}" target="_blank">
                        <img src="{{ asset('assets/mail/icon-instagram.svg') }}" style="width: 20px; margin: 0 5px;">
                    </a>
                @endif

                @if (!empty($settings->site_phone))
                    <a href="https://wa.me/{{ $settings->site_phone }}" target="_blank">
                        <img src="{{ asset('assets/mail/icon-whatsapp.svg') }}" style="width: 20px; margin: 0 5px;">
                    </a>
                @endif

            </div>

            Sizin için her yenileniyoruz ve her gün daha çok çalışıyoruz.<br>
            <a href="https://www.314agency.com" style="color: #aaa; text-decoration: none;">www.314agency.com</a>
        </div>

    </div>
</body>

</html>