<title>Reparaciones</title>
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
        margin-top: 150px;
    }
</style>
<section>

    <div class="container-fluid margetop h-100">
        <div class="row d-flex justify-content-center">
            <?php foreach ($incidencies as $incidencies_item) : ?>
                <div class="card text-center">
                    <div class="card-header"><?php echo $incidencies_item['desc_averia'] ?></div>
                    <div class="card-body">
                        <!-- <h5 class="card-title"><?php echo $incidencies_item[''] ?></h5> -->
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
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarLabel"><?php echo $incidencies_item['Diagnostico_prev'] ?></h5>



                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                           
                            <form action="<?php echo base_url("editarReparacion") ?>" class="ml-5 mr-5" method="POST">

                            <label for="estado">Estado: </label>
                                <select class="form-control mb-2" name="estado" id="estado" >
                                
                                    <option disabled selected value="<?php echo $incidencies_item['id_Estado'] ?>"><?php if($incidencies_item['id_Estado']!=null){ echo $estados[$incidencies_item['id_Estado']-1]['Descrip'];}if($incidencies_item['id_Estado']==null){ echo $estados[0]['Descrip'];} ?> </option>


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
                                    <input class="btn btn-success" type="submit" value="Guardar" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>