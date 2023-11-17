<!-- navegacion izquierda -->
        <!-- Heading -->
        <img src="{{ asset('img/brand/favicon.png') }}"  width="100" height="200" alt="...">
        <h6 class="navbar-heading text-muted">Gestion usuario</h6>
        <ul class="navbar-nav">
        
          
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{url ('/home')}}">
              <i class="ni ni-tv-2 text-primary"></i> Pagina principal
            </a>
          </li>
          @if(auth()->user()->role == 'docente')
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/especialidades') }}">
              <i class="ni ni-archive-2 text-blue"></i> Mis Reservass
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
           <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor --> <!-- divisor -->
          
          @endif
          <li class="nav-item">
            <a class="nav-link " href="{{url('/bitacora')}}">
              <i class="ni ni-bullet-list-67 text-red"></i> bitacora
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}"
             onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
             >
              <i class="fas fa-sign-in-alt"></i> Cerrar sesion
            </a>
            <Form action="{{route('logout')}}" method="POST" style="display:none;"id="formLogout">
            @csrf 
            </Form>
          </li>
        </ul>
        <!-- divisor -->
        <hr class="my-3">
        <!-- Heading 
        <h6 class="navbar-heading text-muted">Documentacion</h6>-->
        <!-- Navigation 
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="./examples/upgrade.html">
              <i class="ni ni-send text-dark"></i> Upgrade to PRO
            </a>
          </li>
        </ul>-->