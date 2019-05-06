<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Response;
use Illuminate\Support\Facades\View;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        

        // $posts =json_encode($posts);
        // return response()->json(['posts' => $posts]);
        // return view('ajax',['posts' => $posts]);
        // return Response::make('ajax', ['posts'=>json_encode($posts)]);
        // return   response()->json($posts);    
 // return Response::json(array('body' => View::make('ajax',array('posts'=>$posts))->render()));


    // return response(view('ajax',array('posts'=>$posts)),200, ['Content-Type' => 'application/json']);
// });


    return response(view('ajax',array('posts'=>$posts)),200, ['Content-Type' => 'application/json']);


        // $returnHTML = view('ajax')->with('posts', $posts)->render();
        // return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id)->update($request->all());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['json']);
    }
}
