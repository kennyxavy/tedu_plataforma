@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Solicitud de retiro
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
    <div>
        <h4>Saldo a la fecha: $ {{ session('saldoCuenta') }}</h4>
    </div>

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-11">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Atención
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="callout callout-info">
                            <h5>Estimado usuario</h5>

                            <p>Las solicitudes de retiro tienen un costo adicional, por lo que el valor de su depósito sera
                                menor al retirado.</p>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de solicitud de retiro</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="{{ route('monedero.solicitudretiro') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="cantidad">Cantidad a retirar</label>
                                        {!! $errors->first('cantidad', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="cantidad" name="cantidad"
                                                value="" placeholder="Cantidad a retirar">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="saldo">Saldo disponible</label>

                                        {!! $errors->first('saldo', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="saldo" name="saldo"
                                                value={{ session('saldoCuenta') }} readonly>
                                            {{-- <input type="text" class="form-control" id="saldo" name="saldo"
                                                value={{ session('saldoCuenta') }} readonly> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! $errors->first('archivo', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo" name="archivo"
                                                required>
                                        </div>
                                        <small>Por favor, adjuntar factura del usuario dueño de la cuenta</small>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-block btn-outline-primary"><i
                                            class="fas fa-save"></i> Generar solicitud</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
