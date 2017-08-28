<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url("http://uupload.ir/files/zwez_arda.jpg");
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 15px 30px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: rgba(20, 20, 26, 0.5);
            }

            .m-b-md {
                margin-bottom: 30px;
                color: #fafafa
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Arda Security
                </div>

                <div class="links">
                    <a href="<?php echo e(URL::to('admin/login')); ?>">Login</a>
                    <a href="<?php echo e(URL::to('admin/register')); ?>">Register</a>
                    <a href="<?php echo e(URL::to('docs')); ?>">About Arda</a>
                </div>
            </div>
        </div>
    </body>
</html>
