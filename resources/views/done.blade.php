<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lucky Draw</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,700" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href='http://mywebfont.appspot.com/css?font=zawgyi' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <style>
            .zawgyi {
                font-family:Zawgyi-One;
            }

            html, body {
                /* background-color: red; */
                /* color: #636b6f; */
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 700;
                height: 100vh;
                margin: 0;
                /* background: url(../img/photo-1549374009-e3e38ae654d3.jpeg) bottom center no-repeat, */
                background: url(../img/rawpixel-445788-unsplash.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
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
                /* font-size: 9em; */
            }

            .second-title {
                font-size: 45px;
                /* font-size: 9em; */
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            {
                margin-bottom: 30px;
            }
        </style>

        <link rel="stylesheet" href="/css/animate.css">

        <!-- Spinners -->
        <style>
            .spinner {
                /* position: absolute;
                left: 50%;
                top: 50%; */
                height:60px;
                width:60px;
                margin:0px auto;
                -webkit-animation: rotation .6s infinite linear;
                -moz-animation: rotation .6s infinite linear;
                -o-animation: rotation .6s infinite linear;
                animation: rotation .6s infinite linear;
                border-left:6px solid rgba(0,174,239,.15);
                border-right:6px solid rgba(0,174,239,.15);
                border-bottom:6px solid rgba(0,174,239,.15);
                border-top:6px solid rgb(255, 255, 255);
                border-radius:100%;
            }

            @-webkit-keyframes rotation {
                from {-webkit-transform: rotate(0deg);}
                to {-webkit-transform: rotate(359deg);}
            }
            @-moz-keyframes rotation {
                from {-moz-transform: rotate(0deg);}
                to {-moz-transform: rotate(359deg);}
            }
            @-o-keyframes rotation {
                from {-o-transform: rotate(0deg);}
                to {-o-transform: rotate(359deg);}
            }
            @keyframes rotation {
                from {transform: rotate(0deg);}
                to {transform: rotate(359deg);}
            }

            .background {
                position: absolute;
                display: block;
                top: 0;
                left: 0;
                z-index: 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content" style="display: block; z-index: 1">
                <h2>Now we have every</h2>
                <div class="title zawgyi">
                    WINNERS
                </div>
                <h2>Please Go and Check </h2>
                
                <div class="second-title animated infinite pulse delay-2s zawgyi">
                    "luckydraw.medicarehb.com/winners"
                </div>
            </div>
        </div>

        <canvas class="background"></canvas>

        <!-- <script src="/js/particles.min.js"></script> -->
        <script>
            // window.onload = function() {
            //     Particles.init({
            //         selector: '.background',
            //         color: '#0c630c',
            //         maxParticles: 130,
            //         connectParticles: true,
            //         responsive: [
            //             {
            //             breakpoint: 768,
            //             options: {
            //                 maxParticles: 80
            //             }
            //             }, {
            //             breakpoint: 375,
            //             options: {
            //                 maxParticles: 50
            //             }
            //             }
            //         ]
            //     });
            // };
        </script>
    </body>
</html>
