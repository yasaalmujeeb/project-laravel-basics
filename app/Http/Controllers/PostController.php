<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id',session('userId'))->get();
        return view('blog',compact('posts'));
    }
    public function create()
    {
        return view('createpost');
    }
    public function store(Request $request)
    {
        if(!isset($request->title) || !isset($request->content))
        {
           return back()->withErrors([
            'error'=>'Something is mising .Fill it accordingly',
           ]);
        }
        else
        {
        $slug = Str::slug($request->title,'-');
        $post = new Post;
        $post->title = $request->input('title');
        $post->user_id = session('userId');
        $post->content = $request->input('content');
        $post->slug = $slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            // Check if the uploaded file is an image
            if ($file->isValid() && Str::startsWith($file->getMimeType(), 'image/')) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/posts/', $filename);
                $post->image = $filename;
            } else {
                // Handle the case where the uploaded file is not an image
                // For example, you can return an error response to the user
                return back()->withErrors([
                    'error'=>'The uploaded file is not an image',
                   ]);
            }
        }
        $post->save();
        return redirect()->back()->with('status','Product added successfuly');
        }
    }

    public function show(Post $post)
    {
        //
    }

   
    public function edit($id)
    {
        $post = Post::find($id);
        return view('updatepost',compact('post'));
    }

   
    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->title,'-');

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->user_id = session('userId');
        $post->content = $request->input('content');
        $post->slug = $slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // deletes the previous image
            $destination ='uploads/posts/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            if ($file->isValid() && Str::startsWith($file->getMimeType(), 'image/')) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/posts/', $filename);
                $post->image = $filename;
            } else {
                return back()->withErrors([
                    'error'=>'The uploaded file is not an image or is corrupted.',
                   ]);
            }
        }
        $post->update();
        return redirect()->back()->with('status','Product updated successfuly');

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        if($post)
        {
            return redirect()->back();
        }
    }

    public function adminviewPost($id)
    {
        $posts = Post::where('user_id', $id)->get();
        return $posts;
    }
}
