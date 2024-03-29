@extends('templates.main')
@section('titulo_pagina', 'Panel-admin')

@section('estilos')
@endsection


@section('contenido')
    <div class="container contenido">

        <ul class="nav nav-tabs md-tabs" id="myTabEx" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="mis_posts_tab" data-toggle="tab" href="#mis_posts" role="tab"
                   aria-controls="mis_posts" aria-selected="true">Mis Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="borradores_tab" data-toggle="tab" href="#borradores" role="tab"
                   aria-controls="borradores" aria-selected="true">Borradores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="crear_post_tab" data-toggle="tab" href="#crear_post" role="tab"
                   aria-controls="crear_post" aria-selected="false">Crear Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mi_perfil_tab" data-toggle="tab" href="#mi_perfil" role="tab"
                   aria-controls="mi_perfil" aria-selected="false">Mi perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="usuarios_tab" data-toggle="tab" href="#usuarios" role="tab"
                   aria-controls="usuarios" aria-selected="false">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="comentarios_tab" data-toggle="tab" href="#comentarios" role="tab"
                   aria-controls="comentarios" aria-selected="false">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="categorias_tab" data-toggle="tab" href="#categorias" role="tab"
                   aria-controls="categorias" aria-selected="false">Categorias</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link confirm" href="{{route('resetear_visitas')}}"
                   data-confirm="Se resetearan todas las visitas, Quieres continuar?" id="reset_visitas"
                   data-toggle='popover' data-placement='right' data-content='Resetear visitas posts'><i
                            class="fa fa-undo"></i></a>
            </li>
        </ul>
        <div class="tab-content pt-5" id="myTabContentEx">
            <div class="tab-pane fade active show col-sm-12" id="mis_posts" role="tabpanel"
                 aria-labelledby="mis_posts_tab">
                <section class="mt-5">
                    <div class="container-fluid grey lighten-4">
                        <div class="row pt-3">
                            <div class="col-lg-12 col-12 mt-1 ">
                                <section class="section extra-margins pb-3 text-center text-lg-left">
                                    @if(isset($posts_publicados))
                                        @foreach($posts_publicados->chunk(3) as $postchunck)
                                            <div class="row text-center">
                                                @foreach($postchunck as $post)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card text-left card_secundaria ">
                                                            <div class="view overlay">
                                                                <img src="{{$post->imagen_principal}}"
                                                                     class="card-img-top imagen_post_secundario" alt="">
                                                                <a href="{{route('vista_post',[$post->categoria->nombre_categoria,$post->slug])}}">
                                                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body mx-4 p-0">
                                                                <a href=""
                                                                   class="teal-text text-center text-uppercase font-small">
                                                                </a><h6 class="mb-3 mt-3"><a href=""
                                                                                             class="teal-text text-center text-uppercase font-small">
                                                                        <strong>{{$post->categoria->nombre_categoria}}</strong>
                                                                    </a><a class="dark-grey-text font-small">
                                                                        - {{$post->fecha}}</a>
                                                                </h6>
                                                                <div class=" titulo_caja_pequeña">
                                                                    <h5 title="{{$post->titulo_post}}"
                                                                        id="titulo_card_pequeña">
                                                                        <strong>{{$post->titulo_post}}</strong>
                                                                    </h5>
                                                                </div>
                                                                <hr>
                                                                <div class="caja_subtitulo_pequeñas">
                                                                    <p class="dark-grey-text mb-4 "
                                                                       id="subtitulo_card_pequeña">{{$post->subtitulo_post}}</p>
                                                                </div>
                                                                <p class="text-right mb-0 text-uppercase font-small spacing font-weight-bold">
                                                                    <a class=" p-2 confirm"
                                                                       data-confirm="Quieres Eliminar el post?"
                                                                       href="{{route('eliminar_post',$post->id)}}"><i
                                                                                class="fa fa-trash text-danger fa-2x "></i></a>
                                                                    <a class=" p-2"
                                                                       href="{{route('modificar_post_vista',$post->id)}}"><i
                                                                                class="fa fa-pencil text-info fa-2x"></i></a>
                                                                    <a href="{{route('vista_post',[$post->categoria->nombre_categoria,$post->slug])}}">leer
                                                                        más
                                                                        <i class="fa fa-chevron-circle-right"
                                                                           aria-hidden="true"></i>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach

                                </section>
                                <div class="row justify-content-around">
                                    <div class="">{{ $posts_publicados->render() }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <div class="tab-pane fade col-sm-12" id="borradores" role="tabpanel"
                 aria-labelledby="borradores_tab">
                <section class="mt-5">
                    <div class="container-fluid grey lighten-4">
                        <div class="row pt-3">
                            <div class="col-lg-12 col-12 mt-1 ">
                                <section class="section extra-margins pb-3 text-center text-lg-left">
                                    @if(isset($borradores))
                                        @foreach($borradores->chunk(3) as $postchunck)
                                            <div class="row text-center">
                                                @foreach($postchunck as $post)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card text-left card_secundaria ">
                                                            <div class="view overlay">
                                                                <img src="{{$post->imagen_principal}}"
                                                                     class="card-img-top imagen_post_secundario" alt="">
                                                                <a href="{{route('vista_post',[$post->categoria->nombre_categoria,$post->slug])}}">
                                                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body mx-4 p-0">
                                                                <a href=""
                                                                   class="teal-text text-center text-uppercase font-small">
                                                                </a><h6 class="mb-3 mt-3"><a href=""
                                                                                             class="teal-text text-center text-uppercase font-small">
                                                                        <strong>{{$post->categoria->nombre_categoria}}</strong>
                                                                    </a><a class="dark-grey-text font-small">
                                                                        - {{$post->fecha}}</a>
                                                                </h6>
                                                                <div class=" titulo_caja_pequeña">
                                                                    <h5 title="{{$post->titulo_post}}"
                                                                        id="titulo_card_pequeña">
                                                                        <strong>{{$post->titulo_post}}</strong>
                                                                    </h5>
                                                                </div>
                                                                <hr>
                                                                <div class="caja_subtitulo_pequeñas">
                                                                    <p class="dark-grey-text mb-4 "
                                                                       id="subtitulo_card_pequeña">{{$post->subtitulo_post}}</p>
                                                                </div>
                                                                <p class="text-right mb-0 text-uppercase font-small spacing font-weight-bold">
                                                                    <a class=" p-2 confirm"
                                                                       data-confirm="Quieres Eliminar el post?"
                                                                       href="{{route('eliminar_post',$post->id)}}"><i
                                                                                class="fa fa-trash text-danger fa-2x "></i></a>
                                                                    <a class=" p-2"
                                                                       href="{{route('modificar_post_vista',$post->id)}}"><i
                                                                                class="fa fa-pencil text-info fa-2x"></i></a>
                                                                    <a href="{{route('vista_post',[$post->categoria->nombre_categoria,$post->slug])}}">leer
                                                                        más
                                                                        <i class="fa fa-chevron-circle-right"
                                                                           aria-hidden="true"></i>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach

                                </section>
                                <div class="row justify-content-around">
                                    <div class="">{{ $borradores->render() }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <!-- Crear entrada-->
            <div class="tab-pane fade" id="crear_post" role="tabpanel" aria-labelledby="crear_post_tab">
                {!! Form::Open(['route' => 'guardar_post','method'=>'POST', 'enctype'=> 'multipart/data', 'files' => true ,'class'=>'']) !!}
                <div class="row justify-content-end mr-5">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="publicado" name="publicado" value="1">
                        <label class="form-check-label" for="publicado">Publicar</label>
                    </div>
                </div>
                <div class="input-group mb-3 col-sm-12">
                    <div class="col-sm-7">
                        <label for="imagen_principal">Imagen principal</label>
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input" name="imagen_principal" id="imagen_principal"
                                   aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="imagen_principal">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <label for="categoria">Categoria Entrada</label>
                        {!! Form::select('categoria_id',$categorias_select,null,['class'=>'form-control mt-2 browser-default custom-select','required','id'=>'categoria']) !!}

                        @if ($errors->has('categoria'))
                            <span class="invalid-feedback mr-5">
            <strong>{{ $errors->first('categoria') }}</strong>
        </span>
                        @endif
                    </div>
                </div>
                <label for="titulo_post">Titulo Entrada</label>
                <input type="text" name="titulo_post" id="titulo_post"
                       class="form-control {{ $errors->has('titulo_post') ? ' invalid' : '' }}"
                       value="{{old('titulo_post')}}"
                       required>
                @if ($errors->has('titulo_post'))
                    <span class="invalid-feedback mr-5">
            <strong>{{ $errors->first('titulo_post') }}</strong>
        </span>
                @endif

                <label for="subtitulo_post" class="mt-2">Subtitulo Entrada</label>
                <input type="text" name="subtitulo_post" id="subtitulo_post"
                       class="form-control {{ $errors->has('subtitulo_post') ? ' invalid' : '' }}"
                       value="{{old('subtitulo_post')}}"
                       required>
                @if ($errors->has('subtitulo_post'))
                    <span class="invalid-feedback mr-5">
            <strong>{{ $errors->first('subtitulo_post') }}</strong>
        </span>
                @endif

                <label for="descripcion_post" class="mt-2">Texto Entrada</label>
                <textarea name="descripcion_post" class="form-control my-editor"
                          id="descripcion_post ">{{old('descripcion_post')}}</textarea>
                @if ($errors->has('descripcion_post'))
                    <span class="invalid-feedback mr-5">
             <strong>{{ $errors->first('descripcion_post') }}</strong>
            </span>
                @endif
                <div class="row justify-content-end mr-5 m-3">
                    <input type="submit" value="Crear Entrada" class="btn btn-success btn-rounded">
                </div>
                {!! Form::Close() !!}
            </div>

            <!--MI PERFIL-->

            <div class="tab-pane fade" id="mi_perfil" role="tabpanel" aria-labelledby="mi_perfil_tab">

                <section class="section mt-3">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card card-cascade narrower">
                                <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                                    <h5 class="mb-0 font-weight-bold">Editar Foto</h5>
                                </div>
                                <div class="card-body card-body-cascade text-center">
                                    <div class="row">
                                        <img src="{{$user->imagen==null?'https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg':$user->imagen}}"
                                             alt="User Photo" class="z-depth-1 mb-3 mx-auto foto_user_perfil">
                                    </div>
                                    {!! Form::Open(['route' => ['editar_foto_perfil',$user->id],'method'=>'PUT', 'enctype'=> 'multipart/data', 'files' => true ]) !!}
                                    <div class="upload-btn-wrapper ">
                                        <button class="btn btn-info">Cargar Imagen</button>
                                        <input type="file" name="imagen"/>
                                    </div>
                                    <div class="row flex-center">
                                        <button class="btn btn-success btn-rounded btn-sm waves-effect waves-light">
                                            Guardar Imagen
                                        </button>
                                        {!! Form::Close() !!}

                                        <br>
                                        {!! Form::Open(['route'=>['eliminar_foto_perfil',$user->id],'method'=>'DELETE',]) !!}

                                        <button class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">
                                            Borrar
                                        </button>
                                        {!! Form::Close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-4">
                            <div class="card card-cascade narrower">
                                <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                                    <h5 class="mb-0 font-weight-bold">Editar Perfil</h5>
                                </div>
                                {!! Form::Open(['route'=>['editar_perfil',$user->id],'method'=>'PUT',]) !!}

                                <div class="card-body card-body-cascade text-center">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="nombre" name="nombre" class="form-control "
                                                           value="{{$user->nombre}}">
                                                    <label for="nombre" data-error="wrong" data-success="right"
                                                           class="active">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="apellidos" name="apellidos"
                                                           class="form-control " value="{{$user->apellidos}}">
                                                    <label for="apellidos">Apellidos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="email" id="email" value="{{$user->email}}"
                                                           class="form-control ">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="email" id="form76" class="form-control validate">
                                                    <label for="form76">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="form77" class="form-control validate">
                                                    <label for="form77" data-error="wrong" data-success="right">Confirmar
                                                        Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form mb-0">
                                                    <label for="descripcion_user">Descripcion</label>
                                                    <textarea type="text" id="descripcion_user" name="descripcion_user"
                                                              class=" my-editor form-control">{{$user->descripcion_user}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center my-4">
                                                <i class="btn btn-info btn-rounded waves-input-wrapper waves-effect waves-light"
                                                   style="color:rgb(255, 255, 255);background:rgba(0, 0, 0, 0)"><input
                                                            type="submit" value="Update Account"
                                                            class="waves-button-input"
                                                            style="background-color:rgba(0,0,0,0);"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {!! Form::close() !!}
            <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios_tab">
                <div class="row justify-content-end mr-1">
                    <a class="btn btn-outline-success waves-effect " href="{{route('register')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                @foreach($users as $user)
                    <div class="card mb-3 p-2">
                        <div class="row ">
                            <div class="col-sm-3 text-uppercase ml-4 pt-3">
                                {{$user->nombre}} {{$user->apellidos}}
                            </div>
                            <section class="col-sm-4 ml-auto row">
                                <a class=" btn btn-outline-info waves-effect"
                                   onclick="editar_usuario({{$user->id}})">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::Open(['route'=>['eliminar_usuario',$user->id],'method'=>'DELETE',]) !!}
                                {!!Form::submit('eliminar',['class'=>'  borrar btn-outline-danger waves-effect confirm ','data-confirm' => 'Seguro que quieres borrar el usuario?'])!!} {!! Form::close() !!}
                            </section>
                        </div>
                        {!! Form::Open(['route' => ['editar_usuario_admin',$user->id],'method'=>'PUT',]) !!}

                        <div class="  editar_categoria mt-3" id="editar_usuario{{$user->id}}">
                            <div class="row ">
                                <div class="col-sm-3 text-uppercase ml-4 ">
                                    Admin
                                </div>
                                <section class="col-sm-4 ml-auto row">
                                    <div class="switch ">
                                        <label>
                                            Off
                                            <input type="checkbox" {{$user->admin==1?'checked':''}} name="admin"
                                                   value="1" id="check{{$user->id}}">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <hr>
                            <div class="row ">
                                <div class="col-sm-3 text-uppercase ml-4 ">
                                    Superadmin
                                </div>
                                <section class="col-sm-4 ml-auto row">
                                    <div class="switch ">
                                        <label>
                                            Off
                                            <input type="checkbox"
                                                   {{$user->superadmin==1?'checked':''}} name="superadmin" value="1"
                                                   id="check{{$user->id}}">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row justify-content-end mr-4">
                                <input type="submit" class=" btn-outline-success waves-effect p-2 justify-content-end"
                                       value="Guardar">
                            </div>
                            {!! Form::close() !!}
                        </div>


                    </div>

                @endforeach
            </div>
            <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="comentarios_tab">
                comentarios
            </div>
            <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias_tab">
                <div class="row justify-content-end mr-1">
                    <a class="btn btn-outline-success waves-effect " onclick="nueva_categoria()">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                {!! Form::Open(['route' => 'añadir_categoria','method'=>'POST',]) !!}
                <div class="row editar_categoria md-form col-sm-12 " id="añadir_categoria_caja">
                    <input type="text" name="nombre_categoria" class=" col-sm-4 "
                           id="añadir_categoria">
                    <label for="añadir_categoria" style="left: 1em">Nombre categoria</label>
                    <input type="submit" class=" btn-outline-success waves-effect p-2" value="Guardar">
                </div>
                {!! Form::close() !!}
                @foreach($categorias as $categoria)
                    <div class="card mb-3 p-2">
                        <div class="row ">
                            <div class="col-sm-3 text-uppercase ml-4 pt-3">
                                {{$categoria->nombre_categoria}}
                            </div>
                            <section class="col-sm-4 ml-auto row">
                                <a class=" btn btn-outline-info waves-effect"
                                   onclick="editar_categoria({{$categoria->id}})">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::Open(['route'=>['eliminar_categoria',$categoria->id],'method'=>'DELETE',]) !!}
                                {!!Form::submit('eliminar',['class'=>'  borrar btn-outline-danger waves-effect confirm ','data-confirm' => 'Seguro que quieres borrar la categoria?'])!!} {!! Form::close() !!}
                            </section>
                        </div>
                    </div>
                    {!! Form::Open(['route' => ['editar_categoria',$categoria->id],'method'=>'PUT',]) !!}
                    <div class="row editar_categoria md-form col-sm-12 " id="editar_categoria{{$categoria->id}}">
                        <input type="text" name="nombre_categoria" class=" col-sm-4 "
                               id="nombre_categoria{{$categoria->id}}" placeholder="{{$categoria->nombre_categoria}}">
                        <label for="nombre_categoria{{$categoria->id}}" style="left: 1em">Nombre categoria</label>
                        <input type="submit" class=" btn-outline-success waves-effect p-2" value="Guardar">
                    </div>
                    {!! Form::close() !!}
                @endforeach
            </div>


        </div>
    </div>


@endsection
@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>

        var editor_config = {
            path_absolute: "/",
            height: 300,
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Imagen post', value: 'imagen_post'},
            ],
            table_class_list: [
                {title: 'None', value: ''},
                {title: 'Responsive', value: 'table table-striped table-responsive border-0 h-auto w-auto text-left'},
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            image_advtab: true,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);

        function editar_categoria(id) {
            var caja = $('#editar_categoria' + id)
            if (caja.css("display") === 'none') {
                caja.fadeIn();
            } else {
                caja.fadeOut();
            }

        }

        function editar_usuario(id) {
            var caja = $('#editar_usuario' + id)
            if (caja.css("display") === 'none') {
                caja.fadeIn();
            } else {
                caja.fadeOut();
            }

        }


        function nueva_categoria() {
            var caja = $('#añadir_categoria_caja')
            if (caja.css("display") === 'none') {
                caja.show();
            } else {
                caja.hide();
            }

        }


        $("#reset_visitas").popover({trigger: "hover"});


        /** $(document).on('click','.pagination a', function(e){
            e.preventDefault();
             var page = $(this).attr('href').split('page=')[1];

             getProducts(page);

        });

         function getProducts(page) {
            $.ajax({
                url :'/ajax/products?page='+page
            }).done(function (data) {
                $('.principal').html(data);
            })
        }*/

    </script>
@endsection
