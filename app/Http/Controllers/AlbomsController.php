<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\AlbomsRequest;


class AlbomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(DB::table('alboms')->get());
        $alboms = DB::table('alboms')->get();
        return view('alboms.index', ['alboms' => $alboms]);
        /*@foreach ($alboms as $albom) {
            return view('alboms.create');
        }
        @endforeach*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alboms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbomsRequest $request)
    {
        $data = $request->only(['name', 'description']);
        

        DB::table('alboms')->insert($data);
        return redirect(route('alboms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $alboms = DB::table('alboms')->whereId($id)->first();
        return view('alboms.show', ['alboms' => $alboms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albom = DB::table('alboms')->whereId($id)->first();
        return view('alboms.edit', compact(['albom']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbomsRequest $request, $id)
    {
        $data = $request->only(['name', 'description']);
        

        DB::table('alboms')->whereId($id)->update($data);
        return redirect(route('alboms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('alboms')->whereId($id)->delete();
        return redirect(route('alboms.index'));
    }

    public function deleteItemById($id = '')
    {
        if (! empty($id)) {
            $count = DB::table('alboms')
                ->where('id', '=', $id)->delete();

            return ($count > 0);
        }

        return false;
    }
}
