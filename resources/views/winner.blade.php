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
                background: url(../img/golden_gift.jpg) no-repeat center center fixed;
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
                font-size: 62px;
                /* font-size: 9em; */
            }
            .img_title {
                font-size: 82px !important;
            }

            .second-title {
                font-size: 70px;
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

            .circletag img{
                /* display: block; */
                width: 40%;
                /* height: 500px; */
                /* background: #E6E7ED; */
                -moz-border-radius: 20px;
                -webkit-border-radius: 20px;
                /* background-image: url(no.png); */
                /* background-position:50% 50%;
                background-repeat:no-repeat; */
            }

            .circletag2 img{
                /* display: block; */
                width: 50%;
                /* height: 500px; */
                /* background: #E6E7ED; */
                -moz-border-radius: 20px;
                -webkit-border-radius: 20px;
                /* background-image: url(no.png); */
                /* background-position:50% 50%;
                background-repeat:no-repeat; */
            }

            /* .circletag img{
                margin-top:7px;
            } */

            .ml15 {
                font-weight: 800;
                font-size: 5.8em;
                text-transform: uppercase;
                letter-spacing: 0.5em;
            }

            .ml15 .word {
                display: inline-block;
                line-height: 1em;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="background-color: rgb(0, 0, 0, 0.6);">
            <!-- Loading -->
            <div class="content" id="loading_screen" style="display: none;">
                <!-- <div class="spinner"></div> -->
                <!-- <h1>THE WINNER IS</h1> -->
                <h1 class="ml15">
                    <p class="animated delay-anime zoomInDown delay-1s">WINNER</p>
                    <p class="animated delay-anime zoomInUp delay-2s">IS</p>
                </h1>
            </div>

            @if(request()->path() === '/')
                <!-- Lucky draw -->
                <div class="content" id="lucky_draw" style="display: block; z-index: 1">
                    <h2>Lucky Draw #{{ session('lucky_draw_number') }}</h2>
                    @if($lucky_draw_item->picture)
                    <div class="title animated infinite pulse zawgyi">
                        {{ $lucky_draw_item->name }}
                    </div>
                    <div class="circletag2">
                            <img src="/img/{{ $lucky_draw_item->picture }}">
                    </div>
                    @else
                    <div class="title animated infinite pulse zawgyi">
                        {{ $lucky_draw_item->name }}
                    </div>
                    @endif

                    @if(session('lucky_draw_number') > 0)
                        <div class="container">
                            <button type="button" class="btn btn-light" id="find-winner">Find winner</button>
                        </div>
                    @endif
                </div>
            @endif

            @if(request()->path() === 'winner-is' && $winner)
                <!-- Winner -->
                <div class="content" style="display: block; z-index: 1" id="winner">
                    <h1 class="zawgyi" style="font-size: 45px;">*** {{ $lucky_draw_item->name }} ***</h1>
                    <div class="circletag" style="margin-bottom: 10px">
                            <img src="/img/{{ $lucky_draw_item->picture }}">
                    </div>
                    <div class="second-title d-flex">
                    
                    <?php
                            $keywords = preg_split("/[\s,]+/",  $winner->name );
                            $p = 0;
                            foreach($keywords as $word)
                            {
                                $p += 1;
                                echo '<p class="animated ml-3 mr-3 delay-anime bounceIn delay-'. $p .'s">' . $word . ' ' . '</p>' ;
                                
                            }
                    ?>
                    
                    <p class="animated delay-anime fadeIn delay-5s">( {{ $winner->position }} )</p> 
                    </div>
                    
                    @if(session('lucky_draw_number') > 1)
                        <div class="container">
                            <a href="/next" type="button" class="btn btn-light">Next</a>
                        </div>  
                    @else
                        <div class="container">
                            <a href="/other-prices" type="button" class="btn btn-light">Every other winners!</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <canvas class="background"></canvas>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <!-- <script src="/js/particles.min.js"></script> -->
        <script>
            $('#find-winner').click(function(){
                $('#lucky_draw').hide();
                $('#loading_screen').show();
                setTimeout(function(){
                    // $('#lucky_draw').show();
                    $('#loading_screen').hide();
                    window.location.href = window.location.origin + '/winner-is'
                }, 5000);
            });

            // anime.timeline({loop: true})
            //     .add({
            //         targets: '.ml15 .word',
            //         scale: [3,1],
            //         opacity: [0,1],
            //         easing: "easeOutCirc",
            //         duration: 2400,
            //         delay: function(el, i) {
            //         return 2500 * i;
            //         }
            //     });

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
