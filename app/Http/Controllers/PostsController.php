<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;



class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Muestra todos los post de los perfiles que seguimos.
    public function index()
    {

        //Creamos un arrray con los id's de los perfiles que seguimos.
        $users = Auth::user()->following()->pluck('profiles.user_id');

        //Accedemos a todos los post de los perfiles que seguimos.
        $posts =  Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    //Retorna la vista para ingresar los datos de un nuevo post.
    public function create()
    {
        return view('posts.create');
    }


    //Guardar los datos del nuevo post.
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        Auth::user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    //Mostrar un post seleccionado.
    public function show(Post $post, User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('posts.show', compact('post', 'follows'));
    }
}
