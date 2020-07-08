<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    // function to view all the post
    public function allPost(){
        $posts = Post::all();
        return view('posts.viewAllPosts', compact('posts'));
    }

    //function to open add post form

    public function addPost()
    {
        $title = 'Add Post';
        return view('posts.addPostForm', compact('title'));

    }

    /* function to insert new post*/

    public function insertPost(Request $request)
    {
    
       $this->validate($request, [
        'title'         => 'required',
        'content'       => 'required|min:100',
        'image'         => 'required|image|mimes:jpg,png,jpeg'
       ]); 
    
        if ($request->hasFile('image')) {
            // image insert into database and to public path with unquie name
            $imageName = 'posts-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }
        else{
            $imageName = '';
        }
        $post = new Post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->image = $imageName;
        $post->save();
        return redirect('/')->with('success','Post Has Been Inserted Successfully');
        
    }

     /* function to edit post*/
    public function editPost($id){
        $post = Post::find($id);
        return view('posts.editPostForm', compact('post'));
    }

      /* function to update  post*/
    public function updatePost(Request $request)
    {
       ; 
        
        $id = $request->postId;
        $post = Post::find($id);
  
        if ($request->hasFile('image')) {

            //to delete or unlink post realted

            if(file_exists(public_path('images/') . $post->image)){
                unlink(public_path('images/') . $post->image);
            }
            // image insert into database and to public path with unquie name
            $imageName = 'posts-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);


        }
        else{
            $imageName = $post->image;
        }
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->image = $imageName;
        $post->update();
        return redirect('/')->with('success','Post Has Been Updated Successfully');
    }

      /* function to delete post*/
    public function deletePost($id)
    {
        $post = Post::find($id);
        if(file_exists(public_path('images/') . $post->image)){
            unlink(public_path('images/') . $post->image);
        }

        $post->delete();
        return back()->with('success','Post Has Been Deleted Successfully');
    }
}