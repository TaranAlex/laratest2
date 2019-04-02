<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Mail;

use App\Mail\Test;

use App\Mail\Spam;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('news.index');


        //session(['key' => 'qwerty']);
        //session()->put('key', 'putValue');

        //$var = request()->session()->get('key', '13456789');
        /*$var = request()->session()->get('key', function(){
            return 'aaa'.random_int(1, 100);
        });*/

        //$var = request()->session()->get('key');

        //$var = session('key', 'def');

        //$session = session()->all();//request()->session()->all();

        //dd(session()->has('key'));
        //dd(session()->exists('key'));

        //dd($var);
        //dd($session);

        //session(['key' => '123']);
        //dump(session()->all());
        //session()->pull('key');
        //session()->forget('key');
        //session()->flush();
        //dd(session()->all());


        /*dump(Cache::get('key'));
        dump(cache('key', function(){
            return random_int(1, 100);
        }));*/

        /*Cache::put('key', 'qwerty', 10);
        dump(Cache::has('key'));
        dump(Cache::get('key', 'adfg'));*/

        /*dump(Cache::remember('key', 10, function(){
            return random_int(1, 100);
        }));*/


        /*dump(Cache::rememberForever('key', function(){
            return random_int(1, 100);
        }));*/

        //Cache::put('key', 'putVal', 100);
        //Cache::add('key', '123456');
        /*Cache::forever('key', 'foreverVal');
        Cache::forget('key');
        dump(cache('key'));*/

        /*$cookie = cookie('key', 'val', 1000);
        return response('Hello World')->cookie($cookie);*/

        /*session(['key' => '7777777777777']);
        dump(session()->all());

        $var = request()->session()->get('key');
        dump($var);

        session()->forget('key');
        dump(session()->all());*/

        /*Cache::put('key', '555555555', 100);

        dump(Cache::get('key'));

        Cache::forget('key');
        dump(cache('key'));

        dump(Cache::remember('key', 10, function(){
            return random_int(1, 100);
        }));*/

        /*$user = ['name' => 'Ivan'];
        //Mail::to('test@mail.ru')->send(new Test);
        Mail::to('test@mail.ru')->send(new Test($user));*/

        $rand = random_int(1, 100);
        Mail::to('test@mail.ru')->send(new Spam($rand));






    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        return view('news.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('news.edit');
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
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
