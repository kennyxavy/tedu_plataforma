@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Usuarios registrados en el sistema
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

                <th>DNI</th>
                <th>Nombre</th>
                <th>MiCodigo</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Referido</th>
                <th>F.Ingreso</th>
                <th>Perfil</th>
                <th>Plan</th>
                <th>Editar</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($datos as $item)
                <tr>

                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->nombres . ' ' . $item->apellidos }}</td>
                    <td>{{ $item->micodigo }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->celular }}</td>
                    <td>{{ $item->codmentor }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->categoria }}</td>
                    <td>{{ $item->plan }}</td>
                    <td><a href="{{ url('usuarios/editar/' . $item->id) }}" class="btn btn-warning pull-center"><i
                                class="fas fa-user-edit"></i> </a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
