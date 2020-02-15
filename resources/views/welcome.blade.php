<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lucky Draw</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- <link href='http://mywebfont.appspot.com/css?font=zawgyi' rel='stylesheet' type='text/css'> -->

        <!-- Styles -->
        <style>
            .zawgyi {
                font-family:Zawgyi-One;
            }

            html, body {
                /* background-color: #fff; */
                /* color: #636b6f; */
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 400;
                height: 100vh;
                margin: 0;
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


            
            /* Particles */
            /* ---- reset ---- */ body{ margin:0; font:normal 75% Arial, Helvetica, sans-serif; } canvas{ display: block; vertical-align: bottom; } /* ---- particles.js container ---- */ #particles-js{ position:absolute; width: 100%; height: 100%; background-color: #b61924; background-image: url(""); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%; } /* ---- stats.js ---- */ .count-particles{ background: #000022; position: absolute; top: 48px; left: 0; width: 80px; color: #13E8E9; font-size: .8em; text-align: left; text-indent: 4px; line-height: 14px; padding-bottom: 2px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; } .js-count-particles{ font-size: 1.1em; } #stats, .count-particles{ -webkit-user-select: none; margin-top: 5px; margin-left: 5px; } #stats{ border-radius: 3px 3px 0 0; overflow: hidden; } .count-particles{ border-radius: 0 0 3px 3px; }
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
        </style>
    </head>
    <body>
        <!-- particles.js container --> 
        <div id="particles-js"></div>

        <div class="flex-center position-ref full-height">
            <!-- Loading -->
            <div class="content" id="lucky_draw" style="display: none;">
                <div class="spinner"></div>
                <h1>THE WINNER IS</h1>
            </div>

            @if(request()->path() === '/')
                <!-- Lucky draw -->
                <div class="content" id="lucky_draw" style="display: block;">
                    <h2>Lucky Draw #{{ session('lucky_draw_number') }}</h2>
                    <div class="title animated infinite pulse delay-2s zawgyi">
                        <!-- Lucky Draw #20 -->
                        {{ $lucky_draw_item->name }}
                    </div>

                    @if(session('lucky_draw_number') > 0)
                        <div class="container">
                            <!-- <button type="button" class="btn btn-light">Draw</button> -->
                            <a href="/winner-is" type="button" class="btn btn-light" id="find-winner">Find winner</a>
                        </div>
                    @endif
                </div>
            @endif

            @if(request()->path() === 'winner-is')
                <!-- Winner -->
                <div class="content" style="display: block;" id="winner">
                    <h1>[ {{ $lucky_draw_item->name }} ]</h1>
                    <div class="title animated infinite pulse delay-2s">
                        {{ $winner->name }} ( {{ $winner->store_dept }} )
                    </div>
                    
                    <div class="container">
                        <a href="/next" type="button" class="btn btn-light">Next</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
        <!-- stats.js lib --> 
        <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
        <script>
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $('#find-winner').click(function(){
                
            });
        </script>
    </body>
</html>
