<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $result = Storage::disk('public')->put('file.txt', 'content text');

        $result = Storage::disk('public')->prepend('file.txt', 'PREPEND content text');

        $result = Storage::disk('public')->append('file.txt', 'APPEND content text');

        dd($result);*/

        /*$result = Storage::disk('public')->copy('file.txt', 'file2.txt');
        dd($result);*/

        /*$result = Storage::disk('public')->move('file2.txt', 'file3.txt');
        dd($result);*/

        /*$result = Storage::disk('public')->delete('file2.txt');
        dd($result);*/

        /*$is_exists = Storage::disk('public')->exists('file2.txt');
        dd($is_exists);*/

        /*$size = Storage::disk('public')->size('file.txt');
        dd($size);*/

        /*$time = Storage::disk('public')->lastModified('file.txt');
        dd(date('d.m.Y H:i:s', $time));*/

        /*$url = Storage::url('public/file.jpg');
        echo "<img src='$url' width='200'>";
        dd($url);*/

        /*$files = Storage::disk('public')->files('/');
        dd($files);*/

        /*$files = Storage::disk('public')->allFiles('/');
        dd($files);*/

        /*$directories = Storage::disk('public')->directories('/');
        dd($directories);*/

        /*$directories = Storage::disk('public')->allDirectories('/');
        dd($directories);*/

        /*$directories = Storage::disk('public')->makeDirectory('test');
        dd($directories);*/

        /*$directories = Storage::disk('public')->deleteDirectory('test');
        dd($directories);*/
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
        //
    }

    public function save(Request $request)
    {
        $file = $request->file('avatar');
        $file = $request->avatar;
        if($request->hasFile('avatar')){

            /*$extensions = $request->avatar->extension();
            dd($extensions);*/
            /*$size = $request->avatar->getClientSize();
            dd($size);*/
            /*$type = $request->avatar->getMimeType();
            dd($type);*/
            /*$original = $request->avatar->getClientOriginalName();
            dd($original);*/

            /*$path = $request->avatar->store('public/avatars');
            dd($path);*/

            /*$path = $request->avatar->storeAs('public', 'file.jpg');
            dd($path);*/

            $path = Storage::disk('public')->put('/', $request->avatar);
            dd($path);


            echo 'file exist';
        }else{
            echo 'file NO exist';
        }
        //dd(file);

        /*$original = $request->avatar->getClientOriginalName();
        $size = $request->avatar->getClientSize();
        if($size > 2097152){            
            echo 'файл загружен';
        }else{
            echo 'размер файла'.' '.$original.' '.'не может превышать 2Мб';
        }

        $type = $request->avatar->getMimeType();
        if($type == 'png' || 'jpg'){            
            echo 'файл загружен';
        }if($type == 'jpeg' || 'gif'){            
            echo 'недопустимый формат файла'.' '. $original;
        }
        else{
            echo 'файл не загружен';
        }*/
    }
}
