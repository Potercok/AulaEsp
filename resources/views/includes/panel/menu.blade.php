<!-- navegacion izquierda -->
        <!-- Heading -->
        <img src="{{ asset('img/brand/favicon.png') }}"  width="100" height="200" alt="...">
        <h6 class="navbar-heading text-muted">Gestion usuario</h6>
        <ul class="navbar-nav">
        
          
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{url ('/home')}}">
              <i class="ni ni-tv-2 text-primary"></i> Página principal
            </a>
          </li>
          
          @if(auth()->user()->role == 'docente')
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/especialidades') }}">
                <i class="ni ni-archive-2 text-blue"></i> Mis Reservas
              </a>
            </li>
          @endif

          
          <!--<li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i> Mi perfil
            </a>
          </li>-->
          <!-- divisor 
          <li class="nav-item">
            <a class="nav-link " href="./examples/tables.html">
              <i class="ni ni-bullet-list-67 text-red"></i> Tables
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/login.html">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>-->
          @if(auth()->user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link " href="/docentes">
              <i class="ni ni-badge text-success"></i> Docentes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin">
              <i class="ni ni-key-25 text-info"></i> Todas las reservas
            </a>
          </li>
           <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor -->
          
          @endif
          <li class="nav-item">
            <a class="nav-link " href="{{url('/bitacora')}}">
              <i class="ni ni-bullet-list-67 text-red"></i> Bitácora
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}"
             onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
             >
              <i class="fas fa-sign-in-alt"></i> Cerrar sesión
            </a>
            <Form action="{{route('logout')}}" method="POST" style="display:none;"id="formLogout">
            @csrf 
            </Form>
          </li>
        </ul>
        <!-- divisor -->
        <hr class="my-3">
    