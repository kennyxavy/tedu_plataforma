
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('productos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Registrar nuevo producto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <div class="flash-message"> 
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
             <?php if(Session::has('alert-' . $msg)): ?> 
        
             <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de registro</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('productos.crear.nuevo')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">
            
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $errors->first('nombre','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" placeholder="Ingrese nombre del producto" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="categoria">Categoria</label> 
                            <?php echo $errors->first('categoria','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="categoria" name="categoria">
                                    <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="subcategoria">SubCategoria</label> 
                            <?php echo $errors->first('subcategoria','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="subcategoria" name="subcategoria">
                                    <?php $__currentLoopData = $subcategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-sm-2">
                            <label for="plan">Gratis?</label> 
                            <?php echo $errors->first('free','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="free" name="free">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-2">
                            <label for="publicar">Publicar</label> 
                            <?php echo $errors->first('publicar','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="publicar" name="publicar">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="plan">Anulado</label> 
                            <?php echo $errors->first('anulado','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="anulado" name="anulado">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Descripción</label> 
                            <?php echo $errors->first('descripcion','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <textarea class="form-control" name="descripcion" id="descripcon"  rows="7"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="otros">Otros detalles</label> 
                            <?php echo $errors->first('otros','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <textarea class="form-control" name="otros" id="otros"  rows="6"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('marca','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo e(old('marca')); ?>" placeholder="Marca" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('costo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="costo" name="costo" value="<?php echo e(old('costo')); ?>" placeholder="Ingrese costo" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('precio','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo e(old('precio')); ?>" placeholder="Ingrese precio" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('descuentoreferencia','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="descuentoreferencia" name="descuentoreferencia" value="<?php echo e(old('descuentoreferencia')); ?>" placeholder="Descuento x Ref." maxlength="100" required>                               
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="archivo">Agregue imagen 1 del producto</label> 
                            <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo" name="archivo">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo2">Agregue imagen 2 del producto</label> 
                            <?php echo $errors->first('archivo2','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo2" name="archivo2">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Agregue imagen 3 del producto</label> 
                            <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo3" name="archivo3">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo4">Agregue imagen 4 del producto</label> 
                            <?php echo $errors->first('archivo4','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo4" name="archivo4">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo5">Agregue imagen 5 del producto</label> 
                            <?php echo $errors->first('archivo5','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo5" name="archivo5">
                               
                            </div>
                        </div>
                        
                        
                    </div>
                </div>             
            </div>
            
          </div>
          <!-- /.card-body -->
    
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </form>
    </div>
    </div>
    
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
<script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>
<script>
    const csrftoken=document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('categoria').addEventListener('change',(e)=>{
        fetch("<?php echo e(url('buscarsubcategoria')); ?>",{
            headers:{
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': csrftoken// <--- aquí el token
            },
            credentials: "same-origin",
            method:'POST',
            body:JSON.stringify({texto:e.target.value})
            
        }).then(response=>{
            return response.json()
        }).then(data=>{
            var opciones="<option value=''>Escoger subcategoria</option>";
            console.log(data);
            for (let i in data.lista) {
               opciones+='<option value='+data.lista[i].id+'>'+data.lista[i].nombre+'</option>';
            }
            document.getElementById("subcategoria").innerHTML=opciones;
        }).catch(error => console.error(error));
    })
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Productos\crear.blade.php ENDPATH**/ ?>