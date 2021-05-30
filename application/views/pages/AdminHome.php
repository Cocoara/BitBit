<head>
    <title>Inicio</title>
    <style>
        .card {
            flex-direction: row;
            align-items: center;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .card-title {
            font-weight: bold;
        }

        .card img {
            width: 30%;
            border-top-right-radius: 0;
            border-bottom-left-radius: calc(0.25rem - 1px);
        }

        @media only screen and (max-width: 768px) {
            a {
                display: none;
            }

            .card-body {
                padding: 0.5em 1.2em;
            }

            .card-body .card-text {
                margin: 0;
            }

            .card img {
                width: 50%;
            }

            .onlyPc {
                display: none;
            }
        }

        @media only screen and (max-width: 1200px) {
            .card img {
                width: 40%;
            }
        }

        .row{
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    </style>
</head>

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="BitBit cargando..." height="60" width="60">
</div>


<!-- <section class="onlyPc">
    <div class="home-slider owl-carousel js-fullheight">
        <div class="slider-item js-fullheight" style="background-image:url(<?php echo base_url("assets/img/car1.png"); ?>);">
            <div class="overlay"></div>
            <div class="container justify-content-center ">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate text-center justify-content-center align-items-center ">
                        <div class="text w-100">
                            <h1 class="mb-3">Reparación</h1>
                            <h2>De equipos y dispositivos</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item js-fullheight" style="background-image:url(<?php echo base_url("assets/img/car2.jpg"); ?>);">
            <div class="overlay"></div>
            <div class="container justify-content-center">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate ">
                        <div class="text w-100 text-center">
                            <h1 class="mb-3">A tu Alcance</h1>
                            <h2>Cerca de ti</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item js-fullheight" style="background-image:url(<?php echo base_url("assets/img/car3.jpg"); ?>);">
            <div class="overlay"></div>
            <div class="container justify-content-center">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h1 class="mb-3">Confianza</h1>
                            <h2>Y respaldo</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->




<section>
    <div class="flex-container">

        <div class="row">
            <div class="col-2 ">

            </div>
            <div class="col-8 ">


                <div class="card">
                    <img src="<?php echo base_url("assets/img/monito.gif"); ?>" style="width: 80px;margin:30px" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Reparación de equipos, dispositivos, y otros sistemas informáticos </h5>
                        <p class="card-text">
                            BitBit le ofrece un servicio de diagnóstico y reparación de ordenadores y sistemas, solucionando de forma inmediata cualquier duda o incidencia que le pueda surgir . Asistencia informática personalizada en nuestras instalaciones
                        </p>

                    </div>

                </div>


                <div class="card">
                    <img src="<?php echo base_url("assets/img/ubication.gif"); ?>" style="width: 80px;margin:30px" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">¡A tu alcance!</h5>
                        <p class="card-text">
                            ¡La reparación de un equipo informático en tu ciudad!
                        </p>

                    </div>
                </div>

                <div class="card">
                    <img src="<?php echo base_url("assets/img/trust.gif"); ?>" style="width: 80px;margin:30px" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Reparación de equipos, dispositivos, y otros sistemas informáticos </h5>
                        <p class="card-text">
                            BitBit le ofrece un servicio de diagnóstico y reparación de ordenadores y sistemas, solucionando de forma inmediata cualquier duda o incidencia que le pueda surgir . Asistencia informática personalizada en nuestras instalaciones
                        </p>

                    </div>
                </div>


            </div>
            <div class="col-2 ">

            </div>
        </div>
    </div>

    </div>
    <!-- <script src="<?php echo base_url("assets/js/owl.carousel.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/main.js"); ?>"></script> -->
</section>