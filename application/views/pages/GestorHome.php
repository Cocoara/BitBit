<head>
    <title>Pagina principal</title>
    <style>
        .hidden {
            display: none;
        }

        .readmore {
            margin: 0 5px;
        }

        .owl-theme .owl-nav {
        margin-top: 10px!important;
        font-size: 50px!important;
        text-align: center!important;
        -webkit-tap-highlight-color: transparent!important;
    }
    </style>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

<section class="blog_section" style="padding-top:30px">
    <div class="container">

        <div class="blog_content">
            <div class="owl-carousel owl-theme">

                <?php foreach ($noticias as $noticia) : ?>
                    <div class="card p-5" width="300px">
                        <div class="blog_item">
                            <div class="blog_image">
                                <?php if (!$noticia['file_url'] == NULL) { ?>
                                    <img class="img-fluid" src="<?php echo base_url() . "assets/uploads/files/" . $noticia['file_url']; ?>" alt="Card image cap">
                                <?php } else {
                                } ?>
                                <span><i class="icon ion-md-create"></i></span>
                            </div>
                            <div class="blog_details">
                                <div style="max-width: 300px;width:300px" class="blog_title text-center">
                                    <p style="max-width: 300px;width:300px"><?php echo $noticia['titulo'] ?></p>
                                </div>
                                <div class="blog_title text-center">
                                    <p class="text-center"> <?php echo $noticia['data'] ?></p>
                                </div>
                                <div class="blog_title text-center">
                                    <p class="text-center content">
                                    <div class="content"> <?php echo $noticia['contenido'] ?></div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        dots: false,
        nav: true,
        autoplay: true,
        smartSpeed: 3000,
        autoplayTimeout: 7000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    $(function() {

        var maxL = 200;

        $('.content').each(function() {

            var text = $(this).text();
            if (text.length > maxL) {

                var begin = text.substr(0, maxL),
                    end = text.substr(maxL);

                $(this).html(begin)
                    .append($('<a class="readmore"/>').attr('href', '#').html('read more...'))
                    .append($('<div class="hidden" />').html(end));


            }


        });

        $(document).on('click', '.readmore', function() {
            // $(this).next('.readmore').fadeOut("400");
            $(this).next('.hidden').slideToggle(400);
        })


    })
</script>