@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Aprobar solicitudes de recargas por aprobar
@endsection

@section('contenedor')
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
                <th>DNI</th>
                <th>Solicita</th>
                <th>Detalle</th>
                <th>Valor</th>
                <th>Banco</th>
                <th>Estado</th>
                <th>Archivo</th>
                <th>Aprobar</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->solicitante }}</td>
                    <td>{{ $item->detalle }}</td>
                    <td>{{ $item->valor }}</td>
                    <td>{{ $item->bancoprocedencia }}</td>
                    @if ($item->aprobado == 1)
                        <td><span class='badge badge-success'>Aprobado</span></td>
                    @else
                        <td><span class='badge badge-warning'>Pendiente</span></td>
                    @endif
                    <td><a href="{{ url('archivo_banco/' . $item->rutaarchivo) }}" class="btn btn-warning pull-center"
                            target="_blank"><i class="fa fa-download"></i> </a></td>
                    @if ($item->aprobado == 1)
                        <td></td>
                    @else
                        <td><a href="{{ url('recargas/aprobarsol/' . Crypt::encrypt($item->id)) }}"
                                class="btn btn-info pull-center"><i class="fa fa-check-square"></i> </a></td>
                    @endif
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
