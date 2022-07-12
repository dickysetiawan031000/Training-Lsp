<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>LSP | Training-Project</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">

    {{-- Css Bootsraps --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- SideBar Bootstraps --}}
    <link href="/css/sidebar.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->
    <link href="/css/sidebars.css" rel="stylesheet">

    {{-- Data Tables --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.css" />


</head>

<body>


    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-6">
                @include('layouts.sidebar')
            </div>

            <div class="col-md-10 col-sm-6">
                <main class="">
                    @yield('container')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/js/sidebar.js"></script>

    @stack('js')
</body>

</html>