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

    <link rel="stylesheet" href="all">

    <link href="/css/login.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-4 me-3">Sign Up</p>
                    </div>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <!-- email input -->
                        <div class="form-floating mb-4">
                            <input type="text" id="username" name="email" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" />
                            <label class="form-label" for="username">Email address</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" />
                            <label class="form-label" for="name">Full Name</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" id="phone_number" name="phone_number"
                                class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="phone_number">Phone Number</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" id="address" name="address" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" />
                            <label class="form-label" for="address">Address</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Have an account?
                                <a href="/login" class="link-danger text-decoration-none">Login</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. Training-LSP-Dicky Setiawan.
            </div>
            <!-- Copyright -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>



</body>

</html>