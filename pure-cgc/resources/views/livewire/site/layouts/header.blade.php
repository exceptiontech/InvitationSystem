<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    @include('meta::manager', @$meta)
    <link rel="shortcut icon" type="image" href="{{ url('uploads/logo.png') }}"/>
    <link rel="icon" href="{{url('new/images/favicon.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="images/x-icon" href="{{url('new/images/favicon.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="max-image-preview:large"/>
    <link rel="canonical" href="https://pure-soft.com/"/>
    <meta property="og:locale" content="ar_AR"/>
    <meta property="og:site_name"
          content="أمن البرمجيات ،برامج الشركات، مواقع الكترونيه - تطبيقات الهواتف المحمولة كل ماتريده في مجال الانترنت والبرمجيات"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title"
          content="أمن البرمجيات ،برامج الشركات، مواقع الكترونيه - تطبيقات الهواتف المحمولة كل ماتريده في مجال الانترنت والبرمجيات"/>
    <meta property="og:description"
          content="بيورسوفت - تصميم وبرمجة المواقع – استضافة المواقع – تهيئة وتحسين المواقع لمحركات البحث SEO منصات تعليمية - واجهات لنشاطك – التسويق اونلاين لنشاطك - تطبيقات الهواتف المحموله"/>
    <meta property="og:url" content="https://pure-soft.com/"/>
    <meta property="og:image" content="{{ url('uploads/logo.png') }}"/>
    <meta property="og:image:secure_url" content="{{ url('uploads/logo.png') }}"/>
    <meta name="twitter:card" content="بيورسوفت"/>
    <meta name="twitter:title"
          content="بيورسوفت - تصميم وبرمجة المواقع – استضافة المواقع – تهيئة وتحسين المواقع لمحركات البحث SEO منصات تعليمية - واجهات لنشاطك – التسويق اونلاين لنشاطك - تطبيقات الهواتف المحموله"/>
    <meta name="twitter:creator" content="بيورسوفت"/>
    <meta name="twitter:image" content="{{ url('uploads/logo.png') }}"/>
    <meta name="twitter:description"
          content="بيورسوفت - تصميم وبرمجة المواقع – استضافة المواقع – تهيئة وتحسين المواقع لمحركات البحث SEO منصات تعليمية - واجهات لنشاطك – التسويق اونلاين لنشاطك - تطبيقات الهواتف المحموله"/>
    <meta name="robots" content="index, follow"/>
    <meta name="author" content="بيورسوفت"/>
    <meta name="format-detection" content="بيورسوفت"/>
    <title>بيورسوفت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @livewireStyles
    <link rel="stylesheet" href="{{url('new/vendor/icons/line-awesome/css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{url('new/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{url('new/css/ticon.css')}}">
    <link rel="stylesheet" href="{{url('new/css/gicon.css')}}"/>
    <link rel="stylesheet" href="{{url('new/css/linearicons.css')}}"/>
    <link href="{{url('new/css/animate.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('new/vendor/icons/themify/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{url('new/vendor/owl-carousel/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{url('new/vendor/magnific-popup/magnific-popup.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('new/css/nice-select.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('new/css/stylearabic.css')}}"/>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=6500dbdf4b7fd100192a46f0&product=custom-share-buttons&source=platform"></script>
</head>
<body>
<?php /*<!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PZ8D9C6');</script>
            <!-- End Google Tag Manager -->
          <meta content="" name="description">
          <meta content="" name="keywords">
          <title>{{__('ms_lang.Pure Soft')}}|أمن البرمجيات ،برامج الشركات، مواقع الكترونيه - تطبيقات الهواتف المحمولة كل ماتريده في مجال الانترنت والبرمجيات</title>

          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <script type="application/ld+json">
            {"@context":"https:\/\/schema.org","@graph":[{"@type":"BreadcrumbList","@id":"https:\/\/pure-soft.com\/#breadcrumblist","itemListElement":[{"@type":"ListItem","@id":"https:\/\/pure-soft.com\/#listItem","position":1,"item":{"@type":"WebPage","@id":"https:\/\/pure-soft.com\/","name":"\u0627\u0644\u0631\u0626\u064a\u0633\u064a\u0629","description":"\u062a\u0635\u0645\u064a\u0645 \u0645\u0648\u0627\u0642\u0639 \u2013 \u0627\u0633\u062a\u0636\u0627\u0641\u0629 \u0645\u0648\u0627\u0642\u0639 \u2013 \u062a\u0647\u064a\u0626\u0629 \u0627\u0644\u0645\u0648\u0627\u0642\u0639 \u0644\u0645\u062d\u0631\u0643\u0627\u062a \u0627\u0644\u0628\u062d\u062b SEO \u0645\u0646\u0627\u0635\u0627\u062a \u062a\u0639\u0644\u064a\u0645\u064a\u0629 - \u0648\u0627\u062c\u0647\u0627\u062a \u0644\u0646\u0634\u0627\u0637\u0643 \u2013 \u0627\u0644\u062a\u0633\u0648\u064a\u0642 \u0627\u0648\u0646\u0644\u0627\u064a\u0646 \u0644\u0646\u0634\u0627\u0637\u0643 Branding \u0645\u0646 \u0627\u0644\u0635\u0641\u0631 \u062a\u0633\u0648\u064a\u0642 \u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a","url":"https:\/\/pure-soft.com\/"}}]},{"@type":"Organization","@id":"https:\/\/pure-soft.com\/#organization","name":"Rocket Marketing Agency","url":"https:\/\/pure-soft.com\/","logo":{"@type":"ImageObject","url":"https:\/\/pure-soft.com\/wp-content\/uploads\/2022\/01\/8748-Converted-png.png","@id":"https:\/\/pure-soft.com\/#organizationLogo","width":731,"height":441},"image":{"@id":"https:\/\/pure-soft.com\/#organizationLogo"},"contactPoint":{"@type":"ContactPoint","telephone":"+201027551729","contactType":"Customer Support"}},{"@type":"WebPage","@id":"https:\/\/pure-soft.com\/#webpage","url":"https:\/\/pure-soft.com\/","name":"\u062e\u062f\u0645\u0627\u062a \u0627\u0646\u062a\u0631\u0646\u062a \u0645\u062a\u0643\u0627\u0645\u0644\u0629-\u062a\u0635\u0645\u064a\u0645 \u0645\u0648\u0627\u0642\u0639 \u0648\u062a\u0637\u0628\u064a\u0642\u0627\u062a-\u062a\u0633\u0648\u064a\u0642 \u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a","description":"\u062a\u0635\u0645\u064a\u0645 \u0645\u0648\u0627\u0642\u0639 \u2013 \u0627\u0633\u062a\u0636\u0627\u0641\u0629 \u0645\u0648\u0627\u0642\u0639 \u2013 \u062a\u0647\u064a\u0626\u0629 \u0627\u0644\u0645\u0648\u0627\u0642\u0639 \u0644\u0645\u062d\u0631\u0643\u0627\u062a \u0627\u0644\u0628\u062d\u062b SEO \u0645\u0646\u0627\u0635\u0627\u062a \u062a\u0639\u0644\u064a\u0645\u064a\u0629 - \u0648\u0627\u062c\u0647\u0627\u062a \u0644\u0646\u0634\u0627\u0637\u0643 \u2013 \u0627\u0644\u062a\u0633\u0648\u064a\u0642 \u0627\u0648\u0646\u0644\u0627\u064a\u0646 \u0644\u0646\u0634\u0627\u0637\u0643 Branding \u0645\u0646 \u0627\u0644\u0635\u0641\u0631 \u062a\u0633\u0648\u064a\u0642 \u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a","inLanguage":"ar","isPartOf":{"@id":"https:\/\/pure-soft.com\/#website"},"breadcrumb":{"@id":"https:\/\/pure-soft.com\/#breadcrumblist"},"image":{"@type":"ImageObject","url":"https:\/\/pure-soft.com\/wp-content\/uploads\/2022\/01\/111.png","@id":"https:\/\/pure-soft.com\/#mainImage","width":1024,"height":593},"primaryImageOfPage":{"@id":"https:\/\/pure-soft.com\/#mainImage"},"datePublished":"2018-11-19T19:50:38+00:00","dateModified":"2023-02-26T12:09:13+00:00"},{"@type":"WebSite","@id":"https:\/\/pure-soft.com\/#website","url":"https:\/\/pure-soft.com\/","name":"\u062a\u0633\u0648\u064a\u0642 \u0644\u0644\u062d\u0644\u0648\u0644 \u0627\u0644\u0628\u0631\u0645\u062c\u064a\u0629 \u0648 \u0627\u0644\u062a\u0633\u0648\u064a\u0642 \u0627\u0644\u0631\u0642\u0645\u064a","description":"\u0648\u0643\u0627\u0644\u0629 \u062e\u062f\u0645\u0627\u062a \u0631\u0642\u0645\u064a\u0629 \u0634\u0627\u0645\u0644\u0629","inLanguage":"ar","publisher":{"@id":"https:\/\/pure-soft.com\/#organization"},"potentialAction":{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https:\/\/pure-soft.com\/?s={search_term_string}"},"query-input":"required name=search_term_string"}}]}
          </script>
          <!-- Favicons -->
          <link href="{{url('site/img/favicon.png')}}" rel="icon">
          <link href="{{url('site/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

          <!-- Google Fonts -->
          {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet"> --}}
          {{-- <link href="{{ url('site/fonts/alfont_com_NeoSansW23-Regular.ttf') }}" rel="stylesheet"> --}}
          {{-- <link href="{{ url('site/fonts/Noto_Kufi_Arabic/NotoKufiArabic-VariableFont_wght.ttf') }}" rel="stylesheet">
          <style>
            @font-face {
            font-family: "Noto_Kufi_Arabic";
            src: url("{{ url('site/fonts/Noto_Kufi_Arabic/NotoKufiArabic-VariableFont_wght.ttf') }}");
            src: url("{{ url('site/fonts/Noto_Kufi_Arabic/NotoKufiArabic-VariableFont_wght.ttf') }}") format("woff"),
            url("{{ url('site/fonts/Noto_Kufi_Arabic/NotoKufiArabic-VariableFont_wght.ttf') }}") format("opentype"),
            }
          </style>
          <!-- Vendor CSS Files -->
          <link href="{{url('site/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
          <link href="{{url('site/vendor/aos/aos.css')}}" rel="stylesheet">
        @if(app()->getLocale() =='ar') --}}

          {{-- <link href="{{url('site/css/bootstrap.rtl.min.css')}}" rel="stylesheet"> --}}
          {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> --}}
        {{-- @else
          <link href="{{url('site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        @endif
          <link href="{{url('site/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
          <link href="{{url('site/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
          <link href="{{url('site/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
          <link href="{{url('site/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
          <!-- Template Main CSS File -->
          <link href="{{url('site/css/style.css')}}" rel="stylesheet"> --}}











         <!--
         <div class="info" id="info">
            <div class="container">
              <div class="row row-info">
                <div class="col-md-6">
                  <div class="details">
                    <div class="btn">
                      <button class="btn rounded-pill">تواصل معنا</button>
                    </div>
                    <div class="phone">
                      <a href="tel:01117818079">01117818079</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="images">
                    {{-- <img src="{{url('site/vendor/images/logo .png')}}" alt="" /> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
         -->


        */ ?>










