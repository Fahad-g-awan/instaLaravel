<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Posts::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200, function ($constraint) {
            $constraint->upsize();
        })->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Posts $post) {
        
        return view('posts.show', compact('post'));
    }
}