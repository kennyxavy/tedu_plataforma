@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Configuraciones Generales
@endsection

@section('contenedor')
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-11">
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
                    <h3 class="card-title">Formulario de parametrización para Productos de Market Place</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="{{ route('configuraciones.guardar') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="porcentajeventa">% de ganancia sobre la venta</label>
                                        {!! $errors->first('porcentajeventa', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajeventa"
                                                name="porcentajeventa" value="{{ $datos->porcentajeganancia }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cgye">$ Costo de envío Guayaquil</label>
                                        {!! $errors->first('cgye', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="cgye" name="cgye"
                                                value="{{ $datos->costoenvio1 }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cotras">$ Costo de envío otras provincias</label>
                                        {!! $errors->first('cotras', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="cotras" name="cotras"
                                                value="{{ $datos->costoenvio2 }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="porcentajeretiro">% de afectación por retiro</label>
                                        {!! $errors->first('porcentajeretiro', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajeretiro"
                                                name="porcentajeretiro" value="{{ $datos->porcentajeretiro }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="porcentajementor">% comisión mentor ventas</label>
                                        {!! $errors->first('porcentajementor', '<span class="help-block text-danger">:message</span>') !!}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajementor"
                                                name="porcentajementor" value="{{ $datos->porcentajementor }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <!--
                            <div class="col-sm-4">
                                <label for="porcentajedescventa">% de descuento por referencia venta</label>
                                {!! $errors->first('porcentajedescventa', '<span class="help-block text-danger">:message</span>') !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                        <input type="text" class="form-control" id="porcentajedescventa" name="porcentajedescventa" value="{{ $datos->porcentajedescventa }}" placeholder="" >
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-block btn-outline-primary"><i
                                            class="fas fa-save"></i> Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
