<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Storage;
use Mail;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('created_at','DESC')->paginate(30);
        return view('file.index',[ 'files' => $files ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.dropzone');
    }
    public function dropzone(Request $request)
    {
        $file = $request->file('file');
            File::create([
            'title'  => $file->getClientOriginalName(),
            'description' => 'Upload with dropzone.js',
            'path'  => $file->store('public/storage')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $files = $request->file('file');

        foreach($files as $file)
        {
              File::create([
            'title'  => $file->getClientOriginalName(),
            'description' => 'good morning',
            'path'  => $file->store('public/storage')
        ]);  

        }
        return redirect('/file')->with('success','File uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return Storage::download($file->path,$file->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $f1 = File::find($id);
            $data = array('title' => $f1->title, 'path' => $f1->path);
            Mail::send('emails.attachment',$data,function($message) use($f1) {
                $message->to('sumitkhera87@gmail.com','Sumit Khera')
                           ->subject('Laravel file attachment and embed');
                           $message->attach(storage_path('app/'.$f1->path));
                $message->from('sumitkhera87@gmail.com','Sumit Khera'); 
            });
            return redirect('/file')->with('success','File attachment has been sent to your email');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = File::find($id);
        Storage::delete($del->path);
        $del->delete();
        return redirect('/file');
    }
}
