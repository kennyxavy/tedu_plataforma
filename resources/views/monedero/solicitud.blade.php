@extends('themes/lte/layaout')
@section('titulo')
    <a href="{{ route('recargas') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Solicitud de recarga de dinero
@endsection

@section('contenedor')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de solicitud</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="{{ route('recargas.crear.nuevo') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {!! $errors->first('detalle', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="detalle" name="detalle"
                                                value="{{ old('detalle') }}" placeholder="Ingrese detalle de solicitud"
                                                maxlength="100" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('procedencia', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="procedencia" name="procedencia"
                                                value="{{ old('procedencia') }}" placeholder="Banco procedencia"
                                                maxlength="100" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        {!! $errors->first('costo', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="costo" name="costo"
                                                value="{{ old('costo') }}" placeholder="Ingrese valor" maxlength="100"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        {!! $errors->first('archivo', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo" name="archivo"
                                                required>
                                        </div>
                                        <small>Por favor, adjuntar el documento o imagen del comprobante de transferencia o
                                            deposito.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-danger"><i class="fas fa-save"></i>
                            Generar Solicitud</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('script-abajo')
    <script src="{{ asset('editor/ckeditor.js') }}"></script>
@endsection
