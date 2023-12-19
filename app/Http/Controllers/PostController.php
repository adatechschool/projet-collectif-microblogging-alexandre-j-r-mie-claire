<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $Users = User::all();
        $Posts = Post::latest()->get();
         return view('index', compact('Users', 'Posts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //1. la validation
        $this->validate($request, [
            "image" => 'bail|nullable|image|mimes:png,jpg,jpeg|max:5120',
            "content" => 'bail|required|max:280',
        ]);

        // 2. On upload l'image dans "/storage/app/public/posts" si une image a été jointe
        if ($request->hasFile('image')) {
            $chemin_image = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $chemin_image);
        } else {
            // Aucune image n'a été téléchargée, définissez le chemin sur null ou une valeur par défaut
            $chemin_image = null;
        }
        // 3. On recupère l'id de l'utilistateur connecté 
        $userId = auth()->user()->id;

        // 4. On enregistre les informations du Post
        Post::create([
            "content" => $request->content,
            "image_path" => $chemin_image,
            "user_id" => $userId
        ]);
        return redirect(route("index"));
    }
    public function like(Post $post)
    {  $user = Auth::user();
        

    if(!$user->likes()->where('post_id',$post->id)->exists()){
        $user->likes()->attach($post->id);
        
    }else{
       
        $user->likes()->detach($post->id);

    }
    return redirect()->back();

    }
    public function show(Post $post)
    {
    }

    public function edit(Post $post)
    {
    }

    public function update(Request $request, Post $post)
    {
    }

    public function destroy(Post $post)
    {
    }
}
