
<?php $__env->startSection('titulo'); ?>
<a href="<?php echo e(route('productos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
Actualizar producto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <div class="flash-message">
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>

            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close"
                    data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!-- end .flash-message -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de actualización</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form role="form" method="POST" action="<?php echo e(route('productos.editar.nuevo')); ?>" accept-charset="UTF-8"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">

                        <div class="col-sm-12">
                            <div class="row">

                                <div class="col-sm-9">
                                    <?php echo $errors->first('nombre','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="hidden" value="<?php echo e($datos[0]->id); ?>" name="idproducto"
                                            id="idproducto">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="<?php echo e($datos[0]->nombre); ?>" placeholder="Ingrese nombre del producto"
                                            maxlength="100" required>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#exampleModal">Imagen</button>
                                </div>
                                <div class="col-sm-4">
                                    <label for="categoria">Categoria</label>
                                    <?php echo $errors->first('categoria','<span
                                        class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <select class="form-control" id="categoria" name="categoria">
                                            <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($datos[0]->categoria_id==$item->id): ?>
                                            <option value=<?php echo e($item->id); ?> selected><?php echo e($item->nombre); ?></option>
                                            <?php else: ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="subcategoria">SubCategoria</label>
                                    <?php echo $errors->first('subcategoria','<span
                                        class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <select class="form-control" id="subcategoria" name="subcategoria">
                                            <?php $__currentLoopData = $subcategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($datos[0]->subcategoria_id==$item->id): ?>
                                            <option value=<?php echo e($item->id); ?> selected><?php echo e($item->nombre); ?></option>
                                            <?php else: ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="publicar">Publicar</label>
                                    <?php echo $errors->first('publicar','<span
                                        class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <select class="form-control" id="publicar" name="publicar">
                                            <?php if($datos[0]->publicado==1): ?>
                                            <option value="1" selected>SI</option>
                                            <option value="0">NO</option>
                                            <?php else: ?>
                                            <option value="1">SI</option>
                                            <option value="0" selected>NO</option>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="plan">Anulado</label>
                                    <?php echo $errors->first('anulado','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <select class="form-control" id="anulado" name="anulado">
                                            <?php if($datos[0]->anulado==0): ?>
                                            <option value="1">SI</option>
                                            <option value="0" selected>NO</option>
                                            <?php else: ?>
                                            <option value="1" selected>SI</option>
                                            <option value="0">NO</option>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>




                                <div class="col-sm-12">
                                    <label for="plan">Descripción</label>
                                    <?php echo $errors->first('descripcion','<span
                                        class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="descripcion" id="descripcon"
                                            rows="6"><?php echo e($datos[0]->detalle); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="otros">Otros detalles</label>
                                    <?php echo $errors->first('otros','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="otros" id="otros"
                                            rows="6"><?php echo e($datos[0]->detalletecnico); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $errors->first('marca','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" id="marca" name="marca"
                                            value="<?php echo e($datos[0]->marca); ?>" placeholder="Ingrese nombre de la marca"
                                            maxlength="100" required>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $errors->first('costo','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" id="costo" name="costo"
                                            value="<?php echo e($datos[0]->costo); ?>" placeholder="Ingrese costo" maxlength="100"
                                            required>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $errors->first('precio','<span class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" id="precio" name="precio"
                                            value="<?php echo e($datos[0]->precio); ?>" placeholder="Ingrese precio" maxlength="100"
                                            required>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $errors->first('descuentoreferencia','<span
                                        class="help-block text-danger">:message</span>'); ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" id="descuentoreferencia"
                                            name="descuentoreferencia" value="<?php echo e($datos[0]->descuentoreferencia); ?>"
                                            placeholder="Descuento x Ref." maxlength="100" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <?php if(isset($datos[0]->rutaimagen)): ?>
                                    <label for="plan">Editar la imagen #1 del producto</label>
                                    <?php else: ?>
                                    <label for="plan">Agregue una imagen #1 del producto</label>

                                    <?php endif; ?>

                                    <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>


                                    <div class="container ">
                                        <div class="row">
                                                
                                            <div class="col-sm-12 justify-content-center pb-2"  style="position:relative; left:35%">
                                                <?php if(isset($datos[0]->rutaimagen)): ?>

                                                <a href="#" id="pop">

                                                    <img id="imageresource"
                                                        src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen)); ?>" width="200"
                                                        height="100" class="img-fluid" alt="Responsive image">
                                                </a>


                                                <?php endif; ?>
                                            </div>
                                      </div>
                                    </div>


                                    <div class="col-sm-8"  >
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo" name="archivo">

                                            <div class="col-sm-1" >
                                                <!-- <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($datos[0]->id).'/1')); ?>"
                                                    class="btn btn-danger pull-center"
                                                    onclick="return confirm('Estas seguro de eliminar el registro?')"><i
                                                        class="fas fa-trash"></i> </a> -->
                                            </div>
                                        </div>



                                    </div>

                                </div>
                                <div class="col-sm-12">

                                    <?php if(isset($datos[0]->rutaimagen2)): ?>
                                    <label for="plan">Editar la imagen #2 del producto</label>
                                    <?php else: ?>
                                    <label for="plan">Agregue una imagen #2 del producto</label>

                                    <?php endif; ?>

                                    <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>


                                    <div class="container">
                                        <div class="row ">
                                                
                                            <div class="col-sm-12 pb-2"  style="position:relative; left:35%">
                                                <?php if(isset($datos[0]->rutaimagen2)): ?>

                                                <a href="#" id="pop">

                                                    <img id="imageresource"
                                                        src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen2)); ?>" width="200"
                                                        height="100" class="img-fluid" alt="Responsive image" >
                                                </a>


                                                <?php endif; ?>
                                            </div>
                                      </div>
                                    </div>


                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo2" name="archivo2">

                                            <div class="col-sm-1">
                                            <?php if(isset($datos[0]->rutaimagen2)): ?>
                                                <!-- <a href="<?php echo e(url('productos/eliminar/'.Crypt::encrypt($item->id).'/'.Crypt::encrypt($datos[0]->rutaimagen2) )); ?>" -->
                                                <!-- <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($item->id).'/2')); ?>" -->
                                                <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($datos[0]->id).'/2')); ?>"
                                                    class="btn btn-danger pull-center"
                                                    onclick="return confirm('Estas seguro de eliminar el registro?')"><i
                                                        class="fas fa-trash"></i> </a>
                                            <?php endif; ?>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                               <div class="col-sm-12">

                                    <?php if(isset($datos[0]->rutaimagen3)): ?>
                                    <label for="plan">Editar la imagen #3 del producto</label>
                                    <?php else: ?>
                                    <label for="plan">Agregue una imagen #3 del producto</label>

                                    <?php endif; ?>

                                    <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>


                                    <div class="container justify-content-center">
                                        <div class="row">
                                                
                                            <div class="col-sm-12 pb-2"  style="position:relative; left:35%">
                                                <?php if(isset($datos[0]->rutaimagen3)): ?>

                                                <a href="#" id="pop">

                                                    <img id="imageresource"
                                                        src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen3)); ?>" width="200"
                                                        height="100" class="img-fluid" alt="Responsive image">
                                                </a>


                                                <?php endif; ?>
                                            </div>
                                      </div>
                                    </div>


                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo3" name="archivo3">

                                            <div class="col-sm-1">
                                            <?php if(isset($datos[0]->rutaimagen3)): ?>
                                                <!-- <a href="<?php echo e(url('productos/eliminar/'.Crypt::encrypt($item->id).'/'.Crypt::encrypt($datos[0]->rutaimagen3) )); ?>}" -->
                                                <!-- <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($item->id).'/3')); ?>" -->
                                                <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($datos[0]->id).'/3')); ?>"
                                                    class="btn btn-danger pull-center"
                                                    onclick="return confirm('Estas seguro de eliminar el registro?')"><i
                                                        class="fas fa-trash"></i> </a>
                                            <?php endif; ?>
                                            </div>
                                        </div>



                                    </div>

                                </div>
                                <div class="col-sm-12">

                                    <?php if(isset($datos[0]->rutaimagen4)): ?>
                                    <label for="plan">Editar la imagen #4 del producto</label>
                                    <?php else: ?>
                                    <label for="plan">Agregue una imagen #4 del producto</label>

                                    <?php endif; ?>

                                    <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>


                                    <div class="container justify-content-center">
                                        <div class="row">
                                                
                                            <div class="col-sm-12 pb-2"   style="position:relative; left:35%">
                                                <?php if(isset($datos[0]->rutaimagen4)): ?>

                                                <a href="#" id="pop">

                                                    <img id="imageresource"
                                                        src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen4)); ?>" width="200"
                                                        height="100" class="img-fluid" alt="Responsive image">
                                                </a>


                                                <?php endif; ?>
                                            </div>
                                    </div>
                                    </div>


                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo4" name="archivo4">

                                            <div class="col-sm-1">
                                            <?php if(isset($datos[0]->rutaimagen4)): ?>
                                                <!-- <a href="<?php echo e(url('productos/eliminar/'.Crypt::encrypt($item->id).'/'.Crypt::encrypt($datos[0]->rutaimagen4) )); ?>" -->
                                                <!-- <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($item->id).'/4' )); ?>" -->
                                                <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($datos[0]->id).'/4' )); ?>"
                                                    class="btn btn-danger pull-center"
                                                    onclick="return confirm('Estas seguro de eliminar el registro?')"><i
                                                        class="fas fa-trash"></i> </a>
                                            <?php endif; ?>
                                            </div>
                                        </div>



                                    </div>

                                    </div>
                                    <div class="col-sm-12">

                                            <?php if(isset($datos[0]->rutaimagen5)): ?>
                                            <label for="plan">Editar la imagen #5 del producto</label>
                                            <?php else: ?>
                                            <label for="plan">Agregue una imagen #5 del producto</label>

                                            <?php endif; ?>

                                            <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>


                                            <div class="container">
                                                <div class="row ">
                                                        
                                                    <div class="col-sm-12 pb-2"  style="position:relative; left:35%">
                                                        <?php if(isset($datos[0]->rutaimagen5)): ?>

                                                        <a href="#" id="pop">

                                                            <img id="imageresource"
                                                                src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen5)); ?>" width="200"
                                                                height="100" class="img-fluid" alt="Responsive image" >
                                                        </a>


                                                        <?php endif; ?>
                                                    </div>
                                            </div>
                                            </div>


                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                    <input class="form-control" type="file" id="archivo5" name="archivo5">

                                                    <div class="col-sm-1">

                                                    <?php if(isset($datos[0]->rutaimagen5)): ?>
                                                        <!-- <a href="<?php echo e(url('productos/eliminar/'.Crypt::encrypt($item->id).'/'.Crypt::encrypt($datos[0]->rutaimagen5) )); ?>" -->
                                                        <!-- <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($item->id).'/5' )); ?>" -->
                                                        <a href="<?php echo e(url('productos/eliminarfoto/'.Crypt::encrypt($datos[0]->id).'/5' )); ?>"
                                                            class="btn btn-danger pull-center"
                                                            onclick="return confirm('Estas seguro de eliminar el registro?')"><i
                                                                class="fas fa-trash"></i> </a>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>



                                            </div>

                                            </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i>
                        Guardar</button>
                </div>
            </form>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imagen del producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen)); ?>" class="img-fluid"
                        alt="Responsive image">
                    <img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen2)); ?>" class="img-fluid"
                        alt="Responsive image">
                    <img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen3)); ?>" class="img-fluid"
                        alt="Responsive image">
                    <img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen4)); ?>" class="img-fluid"
                        alt="Responsive image">
                    <img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen5)); ?>" class="img-fluid"
                        alt="Responsive image">

                </div>
            </div>
            <div class="modal-footer">

            </div>
            <!-- Creates the bootstrap modal where the image will appear -->
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                        </div>
                        <div class="modal-body">

                            <img src="" id="imagepreview" style="width: 400px; height: 264px;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--   bootstrap modal end -->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
<script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>
<script>
const csrftoken = document.head.querySelector("[name~=csrf-token][content]").content;
document.getElementById('categoria').addEventListener('change', (e) => {
    fetch("<?php echo e(url('buscarsubcategoria')); ?>", {
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': csrftoken // <--- aquí el token
        },
        credentials: "same-origin",
        method: 'POST',
        body: JSON.stringify({
            texto: e.target.value
        })

    }).then(response => {
        return response.json()
    }).then(data => {
        var opciones = "<option value=''>Escoger subcategoria</option>";
        console.log(data);
        for (let i in data.lista) {
            opciones += '<option value=' + data.lista[i].id + '>' + data.lista[i].nombre + '</option>';
        }
        document.getElementById("subcategoria").innerHTML = opciones;
    }).catch(error => console.error(error));
})


$("#pop").on("click", function() {
    $('#imagepreview').attr('src', $('#imageresource').attr(
        'src')); // here asign the image to the modal when the user click the enlarge link
    $('#imagemodal').modal(
        'show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Productos\editar.blade.php ENDPATH**/ ?>