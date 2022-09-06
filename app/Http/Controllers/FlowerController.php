<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = DB::table('flowers')->get();

        return view('flowers', ['flowers' => $flowers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert_fl');
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
            'name' => 'required|min:3|max:30',
            'price' => 'required|numeric|between:2,100',
        ]);

        $res = DB::insert('INSERT INTO flowers(name, price) VALUES(?, ?)', [$request->name, $request->price]);

        if ($res)
            return redirect('flowers')->with('success', 'Insert successfully');
        else
            return 'Problem inserting';
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
        $flower = DB::table('flowers')->where('id', $id)->first();

        return view('update-flower', ['flower' => $flower]);
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
            'name' => 'required|min:3|max:30',
            'price' => 'required|numeric|between:2,100',
        ]);

        $res = DB::update('UPDATE flowers 
        SET name = ?, price = ?
        WHERE id = ?', [$request->name, $request->price, $id]);

        if ($res)
            return 'Updated successfully';
        else
            return 'Problem updating';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('flowers')->where('id', $id)->delete();

        if ($res) {
            return back()->with('success', 'Flower was delete');
            // return redirect('flowers');
        } else
            return back()->with('error', 'Delete didnt work.');
    }
}
