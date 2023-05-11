  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h3>Sistema integrado <strong>TEDU EMPRENDE</strong> </h3>
         $ {{session('saldoCuenta')}} <small>disponibles en su billetera electrónica</small>

      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-shopping-basket"></i>
          @if (isset($carro))
            <span class="badge badge-warning navbar-badge">{{count($carro)}}</span>
          @else
            <span class="badge badge-warning navbar-badge">0</span>
          @endif 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Sus registros seleccionados son:</span>
          @if (isset($carro))
            @foreach ($carro as $item)
            <div class="dropdown-divider"></div>
            <a href="{{url('market/ver/'.Crypt::encrypt($item->id))}}" class="dropdown-item">
              <i class="fa fa-shopping-bag mr-2"></i> {{$item->cantidad}} {{substr($item->nombre,0,20)}}...
              <span class="float-right text-muted text-sm"></span>
            </a>
            @endforeach
          @endif  
          <div class="dropdown-divider"></div>
          <a href="{{route('micarrito')}}" class="dropdown-item dropdown-footer"><strong><span class='badge badge-warning'>Ir a comprar</span></strong></a>                 
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-credit-card"></i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Avisos importantes!!</span>
          <div class="dropdown-divider"></div>
                   
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-usd mr-2"></i> {{session('saldoCuenta')}} dólares en su billetera
            <span class="float-right text-muted text-sm"></span>
          </a>
          
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      -->
    </ul>




   </nav>
  <!-- /.navbar -->
