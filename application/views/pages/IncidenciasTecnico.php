<head>
    <title>Incidencias</title>
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


    .card {
        margin: 20px;
    }


    .colorButtons {
        display: block;
        margin: 20px 0;
    }

    canvas {
        cursor: crosshair;
    }

    div#sidebar {
        position: relative;
        bottom: 0;
        width: 100px;
        padding: 20px 20px;
    }

    canvas#canvas {
        left: 150px;
        top: 45px;
    }

    .input-group {
        margin-bottom: 10px;
    }

    .toolsButtons .btn {
        width: 48%;
    }

    .sizeButtons .btn {
        width: 48%;
    }

    .colorpicker {
        background: transparent;
        height: 40px;
    }

    .flex-container {
        display: flex;
        flex-direction: row;
        text-align: center;
    }

    .flex-item-left {
        padding: 10px;
        flex: 30%;
    }

    .flex-item-right {

        padding: 10px;
        flex: 70%;
    }


    /* Responsive layout - makes a one column-layout instead of two-column layout */
    @media (max-width: 800px) {
        .flex-container {
            flex-direction: column;
        }

        #canvas {
            display: none;
        }

        div#sidebar {
            display: none;
        }

    }

    .alert-success {
        color: #155724 !important;
        background-color: #d4edda !important;
        ;
        border-color: #c3e6cb !important;
        ;
    }

    .tarjeta {
        border-radius: 5px;
        margin: 10px;
        min-height: 87px;
    }

    .tarjeta:hover .deleteFile {
        display: block
    }


    .labelFiles {
        background-color: indigo;
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 1rem;
    }

    .deleteFile {
        display: none;
    }
</style>
<section>
    <?php
    if ($this->session->flashdata('success')) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
    unset($_SESSION['success']);
    ?>
    <?php
    if ($this->session->flashdata('error')) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
    unset($_SESSION['error']);
    ?>
    <div class="container-fluid margetop worker-container">

        <div class="container container-flex w-100" style="padding-top:30px">

                <div class="card-body">
                    <label for="buscador">Buscar incidencias:</label>
                    <input onkeyup="buscar()" class="form-control" type='text' id="search" placeholder='Buscar por título'>
                </div>

        </div>

        <div class="row d-flex justify-content-center" id="incidencias">
            <!-- <pre><?php print_r($incidencies) ?></pre> -->

            <?php foreach ($incidencies as $incidencies_item) : ?>


                <div class="card text-center shadow" id="cardColor<?php echo $incidencies_item['id_incidencia'] ?>" data-issue-id="<?php echo $incidencies_item['id_incidencia'] ?>">
                    <div class="card-header"><?php echo $incidencies_item['desc_averia'] ?></div>
                    <div class="card-body">
                        <img id="actualImage" style="width:150px" src="<?php echo $incidencies_item['canvasImage'] ?>" />
                        <p class="card-text">
                            <?php echo $incidencies_item['Diagnostico_prev'] ?>
                        </p>

                        <hr>


                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detalles<?php echo $incidencies_item['id_incidencia'] ?>">
                            Detalles
                        </button>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?php echo $incidencies_item['id_incidencia'] ?>">
                            Editar
                        </button>

                    </div>
                    <div class="card-footer text-muted">Fecha de entrada: <?php echo $incidencies_item['Fecha_entrada'] ?></div>

                    <div class="card-modals">
                        <!-- Details -->
                        <div class="modal fade modal-detail" id="detalles<?php echo $incidencies_item['id_incidencia'] ?>" tabindex="-1" aria-labelledby="detallesLabel" aria-hidden="true">
                            <div class=" modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detallesLabel"><?php echo $incidencies_item['Diagnostico_prev'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-text">
                                            UUID: <?php echo $incidencies_item['uuid'] ?>
                                        </p>
                                        <p class="card-text">
                                            MARCA: <?php echo $incidencies_item['Marca'] ?>
                                        </p>
                                        <p class="card-text">
                                            MODELO: <?php echo $incidencies_item['Modelo'] ?>
                                        </p>
                                        <p class="card-text">
                                            NUMERO DE SERIE: <?php echo $incidencies_item['Numero_serie'] ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit -->
                        <div class="modal fade modal-edit" id="editar<?php echo $incidencies_item['id_incidencia'] ?>" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarLabel"><?php echo $incidencies_item['Diagnostico_prev'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="<?php echo base_url("editarReparacion") ?>" class="ml-5 mr-5" id="form<?php echo $incidencies_item['id_incidencia'] ?>" method="POST" onsubmit="event.preventDefault(); saveForm(this);">
                                        <div class="flex-container">
                                            <div class="flex-item-left">
                                                <label for="estado">Estado: </label>
                                                <select class="form-control mb-2" name="estado" id="estado">

                                                    <?php $selected_option = ''; ?>

                                                    <?php foreach ($estados as $estados_item) : ?>
                                                        <?php $selected_option = $estados_item['id_Estado'] == $incidencies_item['id_Estado'] ? 'selected' : ''; ?>

                                                        <option value="<?php echo $estados_item['id_Estado'] ?>" <?php echo $selected_option; ?>>
                                                            <?php echo $estados_item['Descrip'] ?>
                                                        </option>
                                                    <?php endforeach; ?>

                                                    <?php if ($incidencies_item['id_Estado'] == '') { ?>

                                                        <script type="text/javascript">
                                                            document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-danger');
                                                        </script>
                                                    <?php } ?>

                                                    <?php if ($incidencies_item['id_Estado'] == 1) { ?>

                                                        <script type="text/javascript">
                                                            document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-light');
                                                        </script>
                                                    <?php } ?>

                                                    <?php if ($incidencies_item['id_Estado'] == 2) { ?>

                                                        <script type="text/javascript">
                                                            document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-warning');
                                                        </script>
                                                    <?php } ?>

                                                    <?php if ($incidencies_item['id_Estado'] == 3) { ?>

                                                        <script type="text/javascript">
                                                            document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-info');
                                                        </script>
                                                    <?php } ?>

                                                    <?php if ($incidencies_item['id_Estado'] == 4) { ?>

                                                        <script type="text/javascript">
                                                            document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-success');
                                                        </script>
                                                    <?php } ?>

                                                </select>


                                                <input name="id_incidencia" value="<?php echo $incidencies_item['id_incidencia'] ?>" hidden />
                                                <label for="fecha_entrada">Fecha de entrada de la incidencia: </label>
                                                <input name="fecha_entrada" id="fecha_entrada" readonly class="form-control mb-2" value="<?php echo $incidencies_item['Fecha_entrada'] ?>" placeholder="Fecha de entrada de la incidencia" />
                                                <label for="desc_averia">Descripción de la avería: </label>
                                                <textarea name="desc_averia" id="desc_averia" class="form-control mb-2" placeholder="Descripción de la avería"><?php echo $incidencies_item['desc_averia'] ?></textarea>

                                                <label for="uuid">UUID: </label>
                                                <input name="uuid" id="uuid" readonly class="form-control mb-2" value="<?php echo $incidencies_item['uuid'] ?>" placeholder="UUID" />

                                                <label for="Marca">Marca: </label>
                                                <input name="Marca" id="Marca" class="form-control mb-2" value="<?php echo $incidencies_item['Marca'] ?>" placeholder="Marca" />

                                                <label for="Modelo">Modelo: </label>
                                                <input name="Modelo" id="Modelo" class="form-control mb-2" value="<?php echo $incidencies_item['Modelo'] ?>" placeholder="Modelo" />

                                                <label for="Numero_serie">Número de serie: </label>
                                                <input name="Numero_serie" id="Numero_serie" class="form-control mb-2" value="<?php echo $incidencies_item['Numero_serie'] ?>" placeholder="Número de serie" />

                                                <label for="Diagnostico_prev">Diagnóstico previo: </label>
                                                <input name="Diagnostico_prev" id="Diagnostico_prev" class="form-control mb-2" value="<?php echo $incidencies_item['Diagnostico_prev'] ?>" placeholder="Diagnóstico previo" />

                                                <label for="Telf">Teléfono: </label>
                                                <input name="Telf" id="Telf" class="form-control mb-2" value="<?php echo $incidencies_item['Telf'] ?>" placeholder="Teléfono" />

                                                <label for="tiempo_reparcionrca">Tiempo de reparación: </label>
                                                <input name="tiempo_reparcion" id="tiempo_reparcion" class="form-control mb-2" value="<?php echo $incidencies_item['tiempo_reparcion'] ?>" placeholder="Tiempo de reparación" />

                                                <label for="descripcion_gestor">Descripción del Gestor: </label>
                                                <input name="descripcion_gestor" id="descripcion_gestor" class="form-control mb-2" value="<?php echo $incidencies_item['descripcion_gestor'] ?>" placeholder="Descripción del Gestor" />

                                                <label for="material">Material incidencia: </label>
                                                <textarea name="material" id="material" class="form-control mb-2" placeholder="Material incidencia"><?php echo $incidencies_item['material'] ?></textarea>


                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success save-form">Guardar</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                            <div class="flex-item-right">
                                                <div id="sidebar">
                                                    <div class="flex-container">
                                                        <div class="flex-item-left">
                                                            <div class="colorButtons">
                                                                <h3>Color</h3>
                                                                <input type="color" id="colorpicker<?php echo $incidencies_item['id_incidencia'] ?>" value="#000000" class="colorpicker">
                                                            </div>
                                                            <div class="buttonSize">
                                                                <h3>Size (<span class="size-value" id="showSize<?php echo $incidencies_item['id_incidencia'] ?>">5</span>)</h3>
                                                                <input type="range" min="1" max="50" value="5" step="1" id="controlSize<?php echo $incidencies_item['id_incidencia'] ?>">
                                                            </div>
                                                            <div class="Clear">
                                                                <input type="button" value="Clear" class="btn btn-danger mt-2" id="clear<?php echo $incidencies_item['id_incidencia'] ?>">

                                                            </div>
                                                        </div>

                                                        <div class="flex-item-right">
                                                            <div class="canvas-container" id="canvas"></div>
                                                            <input type="hidden" name="canvasImage" class="canvas-image" />




                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="flex-container">
                                                    <div class="flex-item-left">


                                                    </div>

                                                    <div class="flex-item-right">
                                                        <?php
                                                        if (isset($ficheros)) {
                                                        ?>
                                                            <div class="row d-flex justify-content-center">
                                                                <?php
                                                                foreach ($ficheros as $fichero) :
                                                                    if ($fichero['id_incidencia'] == $incidencies_item['id_incidencia']) {
                                                                        if ($fichero['extension'] == 'png' || $fichero['extension'] == 'jpg') { ?>
                                                                            <a href="#" id="deleteFichero" onclick="delete_contato('<?php echo $fichero['id'] ?>')">
                                                                                <div class="tarjeta text-center shadow" style="width:100px;background-image:url(http://localhost/BitBit/imagen/<?php echo  $fichero['id_incidencia'] . '/' . $fichero['id_fichero'] ?>);background-size:90px;background-repeat:no-repeat;">

                                                                                    <img width="20px" class="deleteFile" src="<?php echo base_url('assets/img/delete.png'); ?>" />

                                                                                </div>
                                                                            </a>
                                                                        <?php } else if ($fichero['extension'] == 'txt') { ?>
                                                                            <a href="#" onclick="delete_contato('<?php echo $fichero['id'] ?>')">
                                                                                <div class="tarjeta text-center shadow deleteFile" style="width:100px">
                                                                                    <img width="48px" src="<?php echo base_url('assets/img/archivo.png'); ?>" />
                                                                                </div>
                                                                            </a>
                                                                <?php
                                                                        }
                                                                    }
                                                                endforeach;
                                                                ?>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                    <div class="flex-container">
                                        <div class="flex-item-left">
                                        </div>
                                        <div class="flex-item-right">
                                            <form method="post" action="<?php echo base_url('do_upload') ?>" enctype="multipart/form-data">
                                                <input name="id_incidencia_file" value="<?php echo $incidencies_item['id_incidencia'] ?>" hidden />

                                                <!-- <input id="upload" type='file' name='files[]'> <br /><br /> -->

                                                <div class="form-group" id="grpFiles">
                                                    <div>
                                                        <label for="iduserfile">Añadir archivos:</label>
                                                        <a href="javascript:void(0);" onclick="addFileToUpload()" title="Add file" id="addFile" style="margin:10px;margin-right:80px;margin-left:15px" class="btn btn-info ">
                                                            <i class="fa  fa-plus-square fa-2x"></i></a>
                                                        <input type="file" id="files" name="files[]" required="required" />
                                                    </div>

                                                </div>
                                                <input class="btn btn-primary" type='submit' value='Subir archivos' name='upload' />
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="text/javascript">
    var maxField = 5; //Input files increment limitation
    var x = 1; //Initial file counter is 1

    var fieldFile =
        '<a href="javascript:void(0);" onclick="removeFileToUpload(this)" class="btn btn-info" style="margin-right:30px;margin:10px" id="remove_button" ' +
        'class="btn btn-info" title="Remove file">' +
        '<span>&nbsp;Eliminar archivo</span>' +
        '</a>' + //New input file and remove icon 
        '<input type="file" id="files" name="files[]" />';

    function removeFileToUpload(obj) {
        event.preventDefault();
        $(obj).parent('div').remove(); //Remove file html
        x--; //Decrement file counter
    }

    function addFileToUpload() {
        if (x <= maxField) { //Check maximum number of input files
            var fieldHTML = '<div style="margin-left:50px">Archivo ' + x + ':' + fieldFile + '</div>';
            x++; //Increment file counter
            $('#grpFiles').append(fieldHTML); // Add input file 
        }
    }
</script>

<script>
    function delete_contato(id) {
        if (confirm('¿Quieres eliminar el archivo?')) {
            console.log(id);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('EditarReparacion_controller/delete_fichero/') ?>" + id,
                data: {
                    id: id,
                },
                // dataType: "JSON",
                success: function(data) {},
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    $(document).ready(function() {
        $('#deleteFichero').click(function() {
            $(this).parent().remove();
            return false;
        });

    });
</script>

<script>
    window.onload = function() {
        createCanvas();
        // DRAWING EVENT HANDLERS
    };

    function createCanvas() {
        var cards = document.querySelectorAll('.worker-container .card');
        // console.log('cards', cards);
        for (var i = 0; i < cards.length; i++) {
            // Current card & issue id
            const card = cards[i];
            const issueId = card.dataset.issueId;

            // Edit modal
            const editModalElem = card.querySelector('.card-modals .modal-edit');
            // Image element
            const imageElem = card.querySelector('.card-body img');
            const imageData = imageElem.src;

            // Get canvas container & form
            const canvasContainer = editModalElem.querySelector('.canvas-container');
            const formElem = editModalElem.querySelector('form');
            // console.log(formElem);

            // Create canvas
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            // Add image to canvas
            let canvasImage = new Image();
            canvasImage.onload = function() {
                ctx.drawImage(canvasImage, 0, 0);
            };
            canvasImage.src = imageData;

            // Append canvas to canvas container

            canvas.id = `canvas-image-${issueId}`;
            // canvas.id = 'canvas-image-' + issueId;
            canvas.width = '500';
            canvas.height = "400";
            canvas.style.zIndex = 8;
            canvas.style.position = "sticky";
            canvas.style.border = "1px solid";
            canvas.style.margin = "30px";
            ctx.fillStyle = currentBg;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            canvasContainer.appendChild(canvas);


            // Add listeners
            canvas.addEventListener('mousedown', function() {
                onMouseDown(canvas, ctx, event);
            });
            canvas.addEventListener('mousemove', function() {
                mousemove(canvas, ctx, event);
            });
            canvas.addEventListener('mouseup', mouseup);


            const clearBtn = editModalElem.querySelector('.Clear');
            const colorPicker = editModalElem.querySelector('.colorButtons input');
            const controlSize = editModalElem.querySelector('.buttonSize input');
            const sizeValue = editModalElem.querySelector('.size-value');
            // const saveBtn = editModalElem.querySelector('.save-form');
            // saveBtn.addEventListener('click', save(canvas, formElem, event));


            clearBtn.addEventListener('click', function() {
                clearCanvas(canvas, ctx);
            });

            colorPicker.addEventListener('change', function() {
                currentColor = this.value;
            });

            controlSize.addEventListener('change', function() {
                currentSize = this.value;
                sizeValue.innerHTML = this.value;
                // console.log('controlsize');
            });


        }
    }





    let isMouseDown = false;
    let currentSize = 5;
    let currentColor = 'rgb(0, 0, 0)';
    let currentBg = 'white';


    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }

    // ON MOUSE DOWN
    function onMouseDown(canvas, ctx, evt) {
        var mousePos = getMousePos(canvas, evt);
        isMouseDown = true;
        var currentPosition = getMousePos(canvas, evt);
        ctx.moveTo(currentPosition.x, currentPosition.y)
        ctx.beginPath();
        ctx.lineWidth = currentSize;
        ctx.lineCap = "round";
        ctx.strokeStyle = currentColor;
        // console.log('onMouseDown is fired');

    }

    // ON MOUSE MOVE
    function mousemove(canvas, ctx, evt) {
        // console.log('mousemove is fired');
        if (isMouseDown) {
            var currentPosition = getMousePos(canvas, evt);
            ctx.lineTo(currentPosition.x, currentPosition.y)
            ctx.stroke();
            // console.log('mousemove is fired when mouse is down');

        }
    }

    // ON MOUSE UP
    function mouseup() {
        isMouseDown = false;
        // console.log('mouseup is fired');
    }

    function clearCanvas(canvas, ctx) {
        // console.log('clearCanvas is fired');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function getMousePos(canvas, evt) {
        // console.log('getMousePos is fired');
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }


    function saveForm(formElem) {
        const canvas = formElem.querySelector('.canvas-container canvas');
        const canvasInputImage = formElem.querySelector('.canvas-image');
        var canvasImage = canvas.toDataURL("image/png");
        canvasInputImage.value = canvasImage;
        formElem.submit();
    }
</script>


<script>
    function buscar() {
        var input, filter, cards, cardContainer, title, i;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("incidencias");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-header");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>