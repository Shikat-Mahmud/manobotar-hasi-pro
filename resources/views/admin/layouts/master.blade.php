<!DOCTYPE html>
<html lang="en">


<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Saikat Mahmud">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    @if (isset(generalSettings()->favicon))
        <link rel="icon" href="{{ asset('storage/' . generalSettings()->favicon) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    @endif

    {{-- datatable --}}
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/jsvectormap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/css2.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/tabler-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-preset.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/notification/css/notification.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">  --}}

    {{-- toaster --}}
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif;
        }

        .highlight {
            background-color: yellow;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }
    </style>

    @stack('styles')
</head>


@include('admin.partials.header')

<!-- universal search start -->
<div class="pc-container" style="display: none; min-height: 0 !important;">
    <div class="pc-content">
        <div class="row">
            <div id="search-results" class="col">
            </div>
        </div>
    </div>
</div>
<!-- universal search end -->

<!-- main content start -->
@yield('content')
<!-- main content end -->

<!-- @include('admin.partials.footer') -->


<script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
<!--Data Table-->
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>


{{-- sweetalert --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    document.querySelectorAll('.btnDelete').forEach(function(btn) {
        btn.addEventListener('click', function() {
            swal({
                title: "আপনি কি নিশ্চিত?",
                text: "একবার মুছে ফেললে, আপনি এটি পুনরুদ্ধার করতে পারবেন না!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "বাদ দিন",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary"
                    },
                    confirm: {
                        text: "ডিলিট",
                        value: true,
                        visible: true,
                        className: "btn btn-danger"
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.closest('.deleteForm').submit();
                }
            });
        });
    });
</script>


{{-- datatable --}}
<script>
    $(document).ready(function() {
        $("#example").DataTable();
    });
</script>
{{-- backbutton --}}
<script>
    function goBack() {
        window.history.back();
    }
</script>
{{-- datatable --}}
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>

<script data-cfasync="false" src="{{ asset('js/plugins/email-decode.min.js') }}"></script>
<script src="{{ asset('js/plugins/apexcharts.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/jsvectormap.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/world.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/world-merc.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/pages/dashboard-sales.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/popper.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/simplebar.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/fonts/custom-font.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/pcoded.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/feather.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('js/plugins/rocket-loader.min.js') }}" data-cf-settings="90f9e57eb6fda3c0ef534197-|49" defer>
</script>

<script src="{{ asset('js/popper.min.js') }}"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{ asset('js/bootstrap.min.js') }}"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>



<!-- Toastr JS -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
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

<script>
    $(document).ready(function() {
        $('#search-button').on('click', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var query = $('#search-input').val();

            $.ajax({
                url: '{{ route('admin.search') }}', // Use route helper
                method: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    var containerDiv = $('.pc-container');
                    var resultsDiv = $('#search-results');
                    resultsDiv.empty(); // Clear previous results

                    if (response.length === 0) {
                        containerDiv.hide(); // Hide the container div if no results
                        resultsDiv.append('<p>No results found</p>');
                    } else {
                        containerDiv.show(); // Show the container div if there are results

                        // Iterate over the response and append the results
                        response.forEach(function(result) {
                            var resultHtml = '<div style="margin-bottom: 30px;">';
                            resultHtml += '<h4>' + result.model +
                            '</h4>'; // Model name
                            resultHtml +=
                                '<div class="table-responsive"><table class="table table-bordered"><tbody>';

                            for (var key in result) {
                                if (result.hasOwnProperty(key) && key !== 'model') {
                                    var value = result[key];

                                    // Highlight the search term
                                    var regex = new RegExp('(' + query + ')', 'gi');
                                    value = String(value).replace(regex,
                                        '<span style="background-color: yellow;">$1</span>'
                                        );

                                    // Check if the key is 'photo', 'image' or any other image-related attribute
                                    if (key === 'photo' || key === 'image' || key
                                        .includes('photo') || key.includes('image')
                                        ) {
                                        var imagePath = '{{ asset('storage') }}/' +
                                            result[key];
                                        resultHtml +=
                                            '<tr><th class="text-uppercase">' +
                                            key + '</th><td><img src="' +
                                            imagePath + '" alt="' + result[key] +
                                            '" style="max-width: 100px;"></td></tr>';
                                    } else {
                                        resultHtml +=
                                            '<tr><th class="text-uppercase">' +
                                            key + '</th><td>' + value +
                                            '</td></tr>';
                                    }
                                }
                            }

                            resultHtml += '</tbody></table></div></div>';
                            resultsDiv.append(resultHtml);
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>


@stack('scripts')
</body>

</html>
