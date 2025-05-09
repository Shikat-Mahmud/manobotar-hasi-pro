<!DOCTYPE html>
<html lang="en">


<head>
    <title>এডমিন লগইন</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content />
    <meta name="keywords" content />
    <meta name="author" content="CodedThemes" />

    <link rel="icon"
        href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico"
        type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <form method="POST" action="{{ route('admin-login') }}">
        @csrf

        <div class="auth-wrapper">
            <div class="auth-content">
                <div class="auth-bg">
                    <span class="r"></span>
                    <span class="r s"></span>
                    <span class="r s"></span>
                    <span class="r"></span>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <a href="{{ route('home') }}">
                                @php
                                    $general = generalSettings();
                                @endphp
                                @if (isset($general->logo))
                                    <img class="img-fluid logo-dark"
                                        style="width: auto !important; height: 70px !important; padding: 5px !important; margin-top: 10px !important;"
                                        src="{{ asset('storage/' . $general->logo) }}" alt="Logo">
                                @else
                                    <img class="img-fluid logo-dark"
                                        style="width: auto !important; height: 70px !important; padding: 5px !important; margin-top: 10px !important;"
                                        src="{{ asset('images/demo_logo.png') }}" alt="Logo">
                                @endif
                            </a>
                        </div>
                        <h3 class="mb-4">এডমিন লগইন</h3>
                        <div class="mt-3">
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" placeholder="ইমেইল" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;" />
                        </div>
                        <div class="mt-4">
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" placeholder="পাসওয়ার্ড" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #FF0000;" />
                        </div>
                        <br>
                        <button class="btn btn-primary shadow-2 mb-4">লগইন</button>
                        <!-- <p class="mb-2 text-muted">
                            @if (Route::has('password.request'))
<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
@endif
                        </p> -->
                        <!-- <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}">Signup</a></p> -->
                        <p class="mb-0 text-muted"><span class="text-danger">*</span> শুধুমাত্র এডমিন লগইনের জন্য</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('/assets/js/vendor-all.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/js/pcoded.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "maxOpened": 3
        };

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @elseif (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @elseif (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @elseif (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>

</html>
