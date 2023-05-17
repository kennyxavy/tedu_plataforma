@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Mis solicitudes de retiros
@endsection

@section('contenedor')
    <div>
        <a href="{{ route('monedero.retiro') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>
            Añadir</a>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha</th>
                <th>Banco</th>
                <th>Tipo de Cuenta</th>
                <th>Número de Cuenta</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Archivo</th>
                <th>Transacción EGR</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->banco_benificiario }}</td>
                    <td>{{ $item->tipo_cta }}</td>
                    <td>{{ $item->num_cta_bancaria }}</td>
                    <td>{{ $item->valor }}</td>
                    @if ($item->transferido == 1)
                        <td><span class='badge badge-success'>Aprobado</span></td>
                    @else
                        <td><span class='badge badge-warning'>Pendiente</span></td>
                    @endif
                    <td><a href="{{ url('archivo_banco/' . $item->rutaarchivo) }}" class="btn btn-warning pull-center"
                            target="_blank"><i class="fa fa-download"></i> </a></td>
                    <td>{{ $item->transaccionid }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
