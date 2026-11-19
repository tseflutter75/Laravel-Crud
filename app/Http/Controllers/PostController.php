<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function create(){
        return view('create');
    }

     public function ourfilestore(Request $request){

       $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable',
     
        ]);

        // upload image
        $imageName = null;
        if(isset($request->image)){
             $imageName = time().'.'.$request->image->extension();
             $request->image->move(public_path('images'), $imageName);
        }
        

        // add post 
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();

        return redirect()->route('home')->with('success', 'Item successfully created!');
    }


    // edit fun
    public function editData($id){
        $post = Post::findOrFail($id);

        return view('edit', ['ourPost'=>$post]);
    }
    

    // update
     public function updateData($id,Request $request){

          $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable',
     
        ]);

        // upload image
        $imageName = null;
        if(isset($request->image)){
             $imageName = time().'.'.$request->image->extension();
             $request->image->move(public_path('images'), $imageName);
        }
        

        // update post 
          $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();

        return redirect()->route('home')->with('success', 'Item successfully updated!');
    }

}
