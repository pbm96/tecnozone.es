<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger tecnozone" href="{{route('home')}}"><span
                    class="tecno">TECNO</span><span class="foryou">ZONE</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto p-1">
                <li class="nav-item pt-1 dropdown ">
                    <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" id="categorias_link">Categorias</a>
                    <div class="dropdown-menu dropdown-primary " id="categorias_nav">
                    </div>
                </li>
                <li class="nav-item pt-1">
                    <a class="nav-link js-scroll-trigger" href="{{route('sobre_mi')}}">Sobre mi</a>
                </li>

                @guest()
                    <li class="nav-item pt-1">
                        <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Acceder</a>
                    </li>

                @else

                    <li class="nav-item avatar dropdown pl-4">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="perfil_link"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{auth()->user()->imagen==null?'https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg':auth()->user()->imagen}}"
                                 class="rounded-circle z-depth-0 imagen_perfil" alt="avatar image">
                        </a>
                        <div class="dropdown-menu dropdown-primary " id="perfil_nav">
                            @if(auth()->user()->superadmin != 1 && auth()->user()->admin !=1)
                                <a class="dropdown-item" href="{{route('perfil_user',auth()->user()->id)}}">Mi
                                    usuario</a>
                            @else

                                <a class="dropdown-item" href="{{route('perfil_superadmin',auth()->user()->id)}}">Panel
                                    Administrador</a>

                            @endif
                            <a class="dropdown-item " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <div class="md-form my-0 ml-3 " id="buscador">

                {!! Form::Open(['route' => 'buscar','method'=>'GET',]) !!}
                <input class="form-control mr-sm-2 caja_buscador" type="text" placeholder="Buscar..."
                       value="{{old('buscar')}}" name="buscar" aria-label="Search">
                {!!  Form::close() !!}

            </div>
            <div id="icono_buscador">
                <i class="fa fa-search text-white ml-3 icono_buscador " aria-hidden="true"></i>
            </div>
        </div>
    </div>

</nav>

