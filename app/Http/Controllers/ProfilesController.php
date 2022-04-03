<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Auth;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    //Pagina principal del perfil, junto con todos sus datos.
    public function index(User $user)
    {

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //Cantidad de post.
        $postsCount = Cache::remember(
            'count.post' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        //Cantidad de followers.
        $followersCount = Cache::remember(
            'count.followers' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );


        $followingCount = Cache::remember(
            'count.post' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );


        return view('profiles/index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    //Redirección para editar los datos del perfil del usuario logueado.
    public function edit(User $user)
    {
        //Autorizacion para editar perfil.
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    //Actualizacion de los datos del perfil.
    public function update(User $user)
    {
        //Autorizacion para editar perfil.
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $authenticatedUser = Auth::user();

        $authenticatedUser->profile()->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }
}
