<head>
    <title>Mis reparaciones</title>
</head>
<style>
    @media (max-width: 576px) {
        .xs {
            color: red;
            font-weight: bold;
        }
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) and (max-width:768px) {
        .sm {
            color: red;
            font-weight: bold;
        }
    }

    /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
    @media (min-width: 768px) and (max-width:992px) {
        .md {
            color: red;
            font-weight: bold;
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width:1200px) {
        .lg {
            color: red;
            font-weight: bold;
        }
    }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .xl {
            color: red;
            font-weight: bold;
        }
    }

   
</style>


<section>

    <div class="container-fluid margetop ">
        <div class="row d-flex justify-content-center">
            <?php foreach ($noticias as $noticia) : ?>
                
                <div id="cardColor" class="card  text-center mt-5">
                    <div class="card-header"><?php echo $noticia['titulo'] ?></div>
                    <div class="card-body">
                        
                        <p class="card-text">
                        <?php echo $noticia['contenido'] ?>
                        </p>

                    </div>
                    <div class="card-footer text-muted">Fecha: <?php echo $noticia['data'] ?></div>
                </div>
                &nbsp;

            <?php 
        endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal -->