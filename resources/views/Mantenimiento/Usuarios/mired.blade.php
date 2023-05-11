@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Mi red de usuarios
@endsection

@section('contenedor')

<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
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
          
            @foreach ($datos as $item)
              <tr>
                  <td>{{$item->nivel}}</td>
                  <td>{{$item->dni}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->micodigo}}</td>
                  <td>{{$item->plan}}</td>
                  <td>{{$item->registrado}}</td>
                  <td>{{$item->mentor}}</td>
              </tr>
            @endforeach
          
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
@endsection
@section('script-abajo')
<script>
const graf = {!! json_encode($datos) !!};
const miusuario={!! json_encode(Auth()->user()->micodigo) !!};
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
@endsection