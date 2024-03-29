<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Comentario;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperadminController extends Controller
{

    public function __construct(UsersController $usersController, HomeController $homeController)
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
        $this->usersController = $usersController;
        $this->homeController = $homeController;
    }


    public function panel($id)
    {
        $user = User::find($id);

        if ($user == auth()->user()) {

            $categorias_select = Categoria::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');

            $categorias = Categoria::all();

            $posts_publicados = Post::where('user_id',$user->id)->where('publicado',1)->paginate(30);

            $borradores = Post::where('user_id',$user->id)->where('publicado',0)->paginate(30);

            $users = User::all();

            $this->homeController->fecha_post($posts_publicados);

            $comentarios_sin_revisar = Comentario::where('revisado',0);

            return view('superadmin')->with('user', $user)
                ->with('categorias_select', $categorias_select)
                ->with('posts_publicados', $posts_publicados)
                ->with('borradores', $borradores)
                ->with('categorias', $categorias)
                ->with('users', $users)
                ->with('comentarios_sin_revisar',$comentarios_sin_revisar);
        }
    }


    public function guardar_post(Request $request)
    {
        /*$this->validate($request, [
            'imagen.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'nombre' => 'string|required|max:191',
            'precio' => 'numeric|required',
            'descripcion'=> 'string|required|max:500'
        ]);*/

        $user = auth()->user();

        $imagen = $request->file('imagen_principal');

        $imagen_base64 = $this->usersController->imagen_base_64($imagen);

        $entrada = new Post($request->all());

        $entrada->user_id = $user->id;

        $entrada->imagen_principal = $imagen_base64;

        $entrada->slug = str_slug($request->titulo_post, '-');

        $entrada->save();

        return redirect()->route('perfil_superadmin', $user->id);

    }

    public function nueva_categoria(Request $request)
    {
        $categoria = New Categoria($request->all());

        $categoria->save();

        return redirect()->route('perfil_superadmin', auth()->user()->id);

    }

    public function editar_categoria(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        $categoria->nombre_categoria = $request->nombre_categoria;

        $categoria->save();

        return redirect()->route('perfil_superadmin', auth()->user()->id);
    }

    public function eliminar_categoria($id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();

        return redirect()->route('perfil_superadmin', auth()->user()->id);

    }

    public function eliminar_usuario($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('perfil_superadmin', auth()->user()->id);


    }

    public function editar_user_admin(Request $request, $id)
    {

        $user = User::find($id);

        if (isset($request->superadmin)) {

            $user->superadmin = 1;
        } else {
            $user->superadmin = 0;
        }

        if (isset($request->admin)) {

            $user->admin = 1;
        } else {
            $user->admin = 0;
        }


        $user->save();
        return redirect()->route('perfil_superadmin', auth()->user()->id);


    }

    public function modificar_post_vista($id)
    {
        $post = Post::find($id);

        $categorias_select = Categoria::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');

        return view('modificar_post')->with('post', $post)->with('categorias_select', $categorias_select);

    }

    public function modificar_post(Request $request, $id)
    {

        $post = Post::find($id);

        if ($request->hasFile('imagen_principal')) {
            $imagen = $request->file('imagen_principal');

            $imagen_base64 = $this->usersController->imagen_base_64($imagen);


            $request->imagen_principal = $imagen_base64;

        } else {
            $request->imagen_principal = $post->imagen_principal;
        }

        $post->fill($request->all());

        if (!isset($request->publicado)){
            $post->publicado = 0;
        }

        $post->slug = str_slug($request->titulo_post, '-');

        if (isset($imagen_base64)) {
            $post->imagen_principal = $imagen_base64;

        }


        $post->save();

        return redirect()->route('perfil_superadmin', auth()->user()->id);
    }

    public function resetear_visitas(){

        $posts = Post::all();

        foreach ($posts as $post){

            $post->visitas_semanales = 0;

            $post->save();

        }
        return redirect()->route('perfil_superadmin', auth()->user()->id);


    }

    public function eliminar_post($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('perfil_superadmin', auth()->user()->id);


    }



    /*public function posts_ajax(){
    $user = auth()->user();
    $posts = Post::posts_user($user->id)->paginate(3);

    $categorias = self::crear_post();


    return view('superadmin')->with('posts',$posts)->with('user',$user)->with('categorias',$categorias);
}*/
}
