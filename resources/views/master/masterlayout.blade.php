<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NoBar | @yield("subtitle")</title>
</head>

<!-- Font Awesome -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>

<!-- SELECT2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Custom Style -->
<link rel="stylesheet" href="{{ url('/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ url('/css/magnific-popup.css') }}">
{{-- <link rel="stylesheet" href="{{ ('/css/fontawesome-all.min.css') }}"> --}}
<link rel="stylesheet" href="{{ url('/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ url('/css/odometer.css') }}">
<link rel="stylesheet" href="{{ url('/css/aos.css') }}">
<link rel="stylesheet" href="{{ url('/css/slick.css') }}">
<link rel="stylesheet" href="{{ url('/css/default.css') }}">
<link rel="stylesheet" href="{{ url('/css/style.css') }}">
<link rel="stylesheet" href="{{ url('/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.1/css/dataTables.foundation.min.css')}}">

<style>
</style>
<body>
    @yield("navbar")
    @yield("body")
</body>

<!-- JQuery Minified -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

<!-- SELECT2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom JS -->
<script src="{{ url('/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('/js/jquery.odometer.min.js') }}"></script>
<script src="{{ url('/js/jquery.appear.js') }}"></script>
<script src="{{ url('/js/slick.min.js') }}"></script>
<script src="{{ url('/js/ajax-form.js') }}"></script>
<script src="{{ url('/js/wow.min.js') }}"></script>
<script src="{{ url('/js/aos.js') }}"></script>
<script src="{{ url('/js/plugins.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>
<script src="{{ url("/js/script.js") }}"></script>
<script src="{{url('https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.13.1/js/dataTables.foundation.min.js')}}"></script>

@yield("pageScript")

</html>