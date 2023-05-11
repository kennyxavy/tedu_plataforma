@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('cabecera')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    <strong>Pago de comisiones a socios inscritos a Plan PRO</strong>
@endsection

@section('contenedor')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('pagossocios.pagar') }}" class="btn btn-success float-left" onclick="ejecuta(event)"><i
                    class="fas fa-plus-circle"></i> Pagar</a>
        </div>
    </div>
    <br>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                        class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>DNI</th>
                <th>MiCodigo</th>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>A pagar</th>
                <th>Saldo Final</th>
                <th>Último pago el</th>
                <th>Plan</th>
                <th>Detalle</th>

            </tr>
        </thead>
        <tbody>
            @php
                $saldofinal = 0;
            @endphp
            @foreach ($datos as $item)
                <tr>

                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->codmentor }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->misaldo }}</td>
                    <td>{{ $item->retornapago }}</td>
                    <td>{{ $item->saldofinal }}</td>
                    <td>{{ $item->ultimopago }}</td>
                    <td>{{ $item->plan }}</td>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                            onclick="callmodal('{{ $item->id }}','{{ $item->nombre }}')"
                            class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
                </tr>
                @php
                    $saldofinal = $saldofinal + $item->retornapago;
                @endphp
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-12">
            <h3><strong>Total a pagar a socios: $ {{ round($saldofinal, 2) }} por cartera virtual.</strong>
            </h3>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="nombremedico"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nivel</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Comisión ganada</th>
                            </tr>
                        </thead>
                        <tbody id="detallehonorarios">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-abajo')
    <script>
        function ejecuta(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute(
                'href'
            ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            //console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: 'Atención!!',
                icon: 'question',
                text: '¿Estás seguro de proceder al pago a las billeteras virtuales de los socios presentados en la tabla?. Se recuerda que este proceso no tiene retorno de anulación por lo que inmediatamente se reflejará en la cartera virtual de los usuarios.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    //Swal.fire('Abonado a las carteras virtuales de los socios', '', 'success')
                    window.location.href = urlToRedirect
                } else if (result.isDenied) {
                    Swal.fire('No se ha generado ningun cambio', '', 'info')
                }
            })
        }
    </script>
    <script>
        function callmodal(ingreso, nommedico) {
            $("#detallehonorarios").children().remove();
            document.getElementById("nombremedico").innerHTML = "Comisiones ganadas de - <strong>" + nommedico +
                "</strong>";
            var d = "";
            var total = 0;
            $.ajax({
                url: "{{ route('pagossocios.buscar') }}",
                dataType: "json",
                data: {
                    ningreso: ingreso
                },
                success: function(data) {
                    console.log(data);

                    for (let i = 0; i < data.lista.length; i++) {

                        d += '<tr>' +
                            '<td>' + data.lista[i].nivel + '</td>' +
                            '<td>' + data.lista[i].dni + '</td>' +
                            '<td>' + data.lista[i].name + '</td>' +
                            '<td>' + parseFloat(data.lista[i].comision).toFixed(2) + '</td>' +
                            '</tr>'
                        total = total + parseFloat(Math.round(data.lista[i].comision, 2));
                        //console.log(d);

                    }
                    d += '<tr>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td><strong>TOTAL DE PAGO</strong></td>' +
                        '<td><strong>' + total + '</strong></td>' +
                        '</tr>';

                    $("#detallehonorarios").append(d);
                }
            });

            $('#myModal').modal();
        }
    </script>
@endsection
