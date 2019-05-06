<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PostController extends Controller
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
        $posts = DB::table('posts')->paginate(4);
        return view('index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
               'email' => 'required',
               'detail' => 'required',
               'author' => 'required', 
        ]);
        $name = $request->get('name');
        $detail = $request->get('detail');
        $author = $request->get('author');

        $posts = DB::Insert('insert into posts(name,detail,author) value(?,?,?)',[$name,$detail,$author]);
        if($posts) {
            $res = redirect('posts')->with('success','Data has been added');
        } else {
            $res = redirect('posts/create')->with('danger','Input data failed, please try again');
        }
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        $posts = DB::select('select * from posts where id=?',[$id]);
        return view('show',['posts' => $posts]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = DB::select('select * from posts where id=?',[$id]);

        return view('edit',['posts' => $posts]);

    }
    public function search(Request $request)
    {
        // dd($request->all());
        $search = $request->input('search');
        // dd($name);
        // DB::select('select * from posts where name=?',$name);
        $posts = DB::table('posts')->where('name','like','%'. $search . '%')->paginate(6);
        return view('index',['posts' => $posts]);
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
         $request->validate([
               'email' => 'required',
               'detail' => 'required',
               'author' => 'required', 
        ]);
         $name = $request->input('name');
         $detail = $request->input('detail');
         $author = $request->input('author');
         
        
        $posts = DB::select('update posts set name=?,detail=?,author=? where id=?',[$name,$detail,$author,$id]);
        if($posts) {
            // Redirect::to('posts')->with('success','Data has been updated');
            $res = redirect('posts')->with('success','Data has been updated');
        } else {
            $res = redirect('posts')->with('danger','Error in updated');
        }
        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from posts where id=?',[$id]);
        return redirect('posts')->with('success','Post has been deleted');
    }
}
