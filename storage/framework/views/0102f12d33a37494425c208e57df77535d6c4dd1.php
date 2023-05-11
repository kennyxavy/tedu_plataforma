
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Mi red de usuarios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="flash-message"> 
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php if(Session::has('alert-' . $msg)): ?> 

   <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   <?php endif; ?> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div> <!-- end .flash-message -->

<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nivel</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Codigo</th>  
            <th>Plan</th>  
            <th>Registrado</th>
            <th>Mentor</th>
          </tr>
          </thead>
          <tbody>
          
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($item->nivel); ?></td>
                  <td><?php echo e($item->dni); ?></td>
                  <td><?php echo e($item->name); ?></td>
                  <td><?php echo e($item->micodigo); ?></td>
                  <td><?php echo e($item->plan); ?></td>
                  <td><?php echo e($item->registrado); ?></td>
                  <td><?php echo e($item->mentor); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </tbody>
      </table>
    </div>
    <div class="col-sm-12">
        <figure class="highcharts-figure">
          <div id="miredusuarios"></div>
          <p class="highcharts-description">
              
          </p>
        </figure>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script>
const graf = <?php echo json_encode($datos); ?>;
const miusuario=<?php echo json_encode(Auth()->user()->micodigo); ?>;
      var niveles=new Array();
      
      var agrupado=new Array();
      
      graf.forEach(element => {
          niveles.push(element['mentor'],element['micodigo']);
          agrupado.push(niveles);
          niveles=[];
      });
     
console.log(miusuario);

Highcharts.addEvent(
    Highcharts.Series,
    'afterSetOptions',
    function (e) {
        var colors = Highcharts.getOptions().colors,
            i = 0,
            nodes = {};

        if (
            this instanceof Highcharts.Series.types.networkgraph &&
            e.options.id === 'lang-tree'
        ) {
            e.options.data.forEach(function (link) {

                if (link[0] === miusuario) {
                    nodes[miusuario] = {
                        id: miusuario,
                        marker: {
                            radius: 30
                        }
                    };
                    nodes[link[1]] = {
                        id: link[1],
                        marker: {
                            radius: 15
                        },
                        color: colors[i++]
                    };
                    
                } else if (nodes[link[0]] && nodes[link[0]].color) {
                    nodes[link[1]] = {
                        id: link[1],
                        color: nodes[link[0]].color
                    };
                }
            });

            e.options.nodes = Object.keys(nodes).map(function (id) {
                return nodes[id];
            });
        }
    }
);

Highcharts.chart('miredusuarios', {
    chart: {
        type: 'networkgraph',
        height: '50%'
    },
    title: {
        text: 'Mi red de usuarios TEDU - PREMIUM'
    },
    subtitle: {
        text: 'Gráfica de nodos de redes de usuarios'
    },
    plotOptions: {
        networkgraph: {
            keys: ['from', 'to'],
            layoutAlgorithm: {
                enableSimulation: true,
                friction: -0.9
            }
        }
    },
    series: [{
        accessibility: {
            enabled: false
        },
        dataLabels: {
            enabled: true,
            linkFormat: ''
        },
        id: 'lang-tree',
        data: agrupado
    }]
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Usuarios\mired.blade.php ENDPATH**/ ?>