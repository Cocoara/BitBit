<head>
    <title>Inicio</title>
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

    .margetop {
        margin-top: 20px;
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
</style>
<script src="<?php echo base_url('assets/js/canvas.js') ?>"></script>
<section>

    <div class="container-fluid margetop">
        <div class="row d-flex justify-content-center">
            <?php foreach ($incidencies as $incidencies_item) : ?>
                <div class="card text-center shadow">
                    <div class="card-header"><?php echo $incidencies_item['desc_averia'] ?></div>
                    <div class="card-body">
                        <img id="actualImage" src="<?php echo $incidencies_item['canvasImage'] ?>" />
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

                </div>
                &nbsp;


                <div class="modal fade" id="detalles<?php echo $incidencies_item['id_incidencia'] ?>" tabindex="-1" aria-labelledby="detallesLabel" aria-hidden="true">
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

                <!--  -->


                <div class="modal fade" id="editar<?php echo $incidencies_item['id_incidencia'] ?>" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarLabel"><?php echo $incidencies_item['Diagnostico_prev'] ?></h5>



                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="<?php echo base_url("editarReparacion") ?>" class="ml-5 mr-5" id="form" method="POST">

                                <div class="flex-container">
                                    <div class="flex-item-left">

                                        <label for="estado">Estado: </label>
                                        <select class="form-control mb-2" name="estado" id="estado">

                                            <option disabled <?php if ($incidencies_item['id_Estado'] == $incidencies_item['id_Estado']) { ?>selected="true" <?php }; ?> value="<?php echo $incidencies_item['id_Estado'] ?>">
                                                <?php if ($incidencies_item['id_Estado'] != null) {
                                                    echo $estados[$incidencies_item['id_Estado'] - 1]['Descrip'];
                                                }
                                                if ($incidencies_item['id_Estado'] == null) {
                                                    echo $estados[0]['Descrip'];
                                                } ?> </option>


                                            <?php foreach ($estados as $estados_item) : ?>
                                                <option value="<?php echo $estados_item['id_Estado'] ?>"><?php echo $estados_item['Descrip'] ?></option>
                                            <?php endforeach; ?>

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

                                        <div class="modal-footer">
                                            <input class="btn btn-success" type="submit" id="guardar" value="Guardar" />
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>




                                    <div class="flex-item-right">








                                        <div id="sidebar">
                                            <div class="colorButtons">
                                                <h3>Color</h3>
                                                <input type="color" id="colorpicker" value="#000000" class="colorpicker">
                                            </div>
                                            <div class="colorButtons">
                                                <input type="color" hidden value="#ffffff" id="bgcolorpicker" class="colorpicker">
                                            </div>



                                            <div class="buttonSize">
                                                <h3>Size (<span id="showSize">5</span>)</h3>
                                                <input type="range" min="1" max="50" value="5" step="1" id="controlSize">
                                            </div>

                                            <div class="canvasSize">

                                                <div class="input-group">

                                                    <input type="number" hidden id="sizeX" class="form-control" placeholder="sizeX" value="800" class="size">
                                                </div>
                                                <div class="input-group">

                                                    <input type="number" hidden id="sizeY" class="form-control" placeholder="sizeY" value="800" class="size">
                                                </div>
                                                <input hidden type="button" class="updateSize btn btn-success" value="Update" id="canvasUpdate">
                                            </div>
                                            <!-- <div class="Storage">
                                                <input type="button" value="Save" class="btn btn-warning" id="save">

                                            </div> -->

                                            <div class="Clear">
                                                <input type="button" value="Clear" class="btn btn-danger mt-2" id="clear">

                                            </div>

                                            <div id="canvas">&nbsp;</div>

                                        </div>


                                        <script>
                                            // SETTING ALL VARIABLES

                                            var actualImage = document.getElementById("actualImage").src;
                                           
                                            var isMouseDown = false;
                                            var canvas = document.createElement('canvas');
                                            var form = document.getElementById("form");
                                            var body = document.getElementsByTagName("body")[0];
                                            var where = document.getElementById("canvas");
                                            var ctx = canvas.getContext('2d');

                                            var image = new Image();
                                            image.onload = function() {
                                                ctx.drawImage(image, 0, 0);
                                            };
                                            image.src = actualImage;

                                            var linesArray = [];
                                            currentSize = 5;
                                            var currentColor = "rgb(0,0,0)";
                                            var currentBg = "white";




                                            // INITIAL LAUNCH

                                            createCanvas();

                                            // BUTTON EVENT HANDLERS

                                            document.getElementById('canvasUpdate').addEventListener('click', function() {
                                                createCanvas();
                                                redraw();
                                            });

                                            document.getElementById('clear').addEventListener('click', function() {
                                                clearCanvas();
                                            });
                                            
                                            document.getElementById('colorpicker').addEventListener('change', function() {
                                                currentColor = this.value;
                                            });

                                            document.getElementById('controlSize').addEventListener('change', function() {
                                                currentSize = this.value;
                                                document.getElementById("showSize").innerHTML = this.value;
                                            });


                                            document.getElementById('guardar').addEventListener('click', save);


                                            // REDRAW 

                                            function clearCanvas(){
                                                ctx.clearRect(0, 0, canvas.width, canvas.height);
                                            }

                                            function redraw() {
                                                for (var i = 1; i < linesArray.length; i++) {
                                                    ctx.beginPath();
                                                    ctx.moveTo(linesArray[i - 1].x, linesArray[i - 1].y);
                                                    ctx.lineWidth = linesArray[i].size;
                                                    ctx.lineCap = "round";
                                                    ctx.strokeStyle = linesArray[i].color;
                                                    ctx.lineTo(linesArray[i].x, linesArray[i].y);
                                                    ctx.stroke();
                                                }
                                            }

                                            // DRAWING EVENT HANDLERS

                                            canvas.addEventListener('mousedown', function() {
                                                mousedown(canvas, event);
                                            });
                                            canvas.addEventListener('mousemove', function() {
                                                mousemove(canvas, event);
                                            });
                                            canvas.addEventListener('mouseup', mouseup);

                                            // CREATE CANVAS

                                            function createCanvas() {
                                                canvas.id = "canvas";
                                                canvas.width = '500';
                                                canvas.height = "400";
                                                canvas.style.zIndex = 8;
                                                canvas.style.position = "absolute";
                                                canvas.style.border = "1px solid";
                                                canvas.style.margin = "30px";
                                                ctx.fillStyle = currentBg;
                                                ctx.fillRect(0, 0, canvas.width, canvas.height);
                                                where.appendChild(canvas);
                                            }



                                            // SAVE FUNCTION

                                            function save() {

                                                    var canvasImage = canvas.toDataURL("image/png");
                                                    console.log(canvasImage);
                                                    var blobImage = document.createElement('input');
                                                    blobImage.type = 'text';
                                                    blobImage.name = 'canvasImage';
                                                    blobImage.style.visibility = "hidden";
                                                    blobImage.value = canvasImage;
                                                    form.appendChild(blobImage);
                                            
                                            }


                                            // function isCanvasBlank(canvas) {
                                            //     const context = canvas.getContext('2d');

                                            //     const pixelBuffer = new Uint32Array(
                                            //         context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
                                            //     );

                                            //     return !pixelBuffer.some(color => color !== 0);
                                            // }

                                            // GET MOUSE POSITION

                                            function getMousePos(canvas, evt) {
                                                var rect = canvas.getBoundingClientRect();
                                                return {
                                                    x: evt.clientX - rect.left,
                                                    y: evt.clientY - rect.top
                                                };
                                            }

                                            // ON MOUSE DOWN

                                            function mousedown(canvas, evt) {
                                                var mousePos = getMousePos(canvas, evt);
                                                isMouseDown = true
                                                var currentPosition = getMousePos(canvas, evt);
                                                ctx.moveTo(currentPosition.x, currentPosition.y)
                                                ctx.beginPath();
                                                ctx.lineWidth = currentSize;
                                                ctx.lineCap = "round";
                                                ctx.strokeStyle = currentColor;

                                            }

                                            // ON MOUSE MOVE

                                            function mousemove(canvas, evt) {

                                                if (isMouseDown) {
                                                    var currentPosition = getMousePos(canvas, evt);
                                                    ctx.lineTo(currentPosition.x, currentPosition.y)
                                                    ctx.stroke();
                                                    // store(currentPosition.x, currentPosition.y, currentSize, currentColor);
                                                }
                                            }

                                            // ON MOUSE UP

                                            function mouseup() {
                                                isMouseDown = false
                                                // store()
                                            }
                                        </script>















                                    </div>
                                </div>















                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>