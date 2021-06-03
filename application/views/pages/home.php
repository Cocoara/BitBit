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

        .row {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    </style>
</head>

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="BitBit cargando..." height="60" width="60">
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" >
        <div class="carousel-item active">
            <img class="d-block h-50 w-100" src="<?php echo base_url("assets/img/car1.png"); ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="<?php echo base_url("assets/img/car2.jpg"); ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="<?php echo base_url("assets/img/girl.jpg"); ?>" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section>
    <div class="flex-container">

        <div class="row ">
            <div class="col-2 ">

            </div>
            <div class="col-8 ">

                <?php foreach ($infoCards as $card) : ?>
                    <div class="card">
                        <?php if(!$card['image'] == NULL){?>
                        <img src="<?php echo base_url() . "assets/uploads/homeimages/" . $card['image']; ?>" style="width: 80px;margin:30px" class="card-img-top" />
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $card['title'] ?></h5>
                            <p class="card-text">
                            <?php echo $card['content'] ?>
                            </p>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
            <div class="col-2 ">

            </div>
        </div>
    </div>

</section>