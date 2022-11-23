<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderByDesc('id')->get();
        return view('post', ['posts'=>$posts]);
    }

    public function create()
    {
        if((mb_strlen($_POST['content']) == 0) || (255 < mb_strlen($_POST['content']))) {
            // Show Error message
            $alert = "<script type='text/javascript'>alert('1文字以上、255文字以下で、つぶやいてください。');</script>";
            echo $alert;
        }
        else {
            $temp = new Post;
            $temp->user_id = \Auth::user()->id;
            $temp->body = $_POST['content'];
            $temp->save();    
        }
        $posts = Post::orderByDesc('id')->get();
        return view('post', ['posts'=>$posts]);
    }

    public function delete()
    {
        Post::find($_POST['target'])->delete();

        $posts = Post::orderByDesc('id')->get();
        return view('post', ['posts'=>$posts]);
    }
}
