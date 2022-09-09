<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flower::all();

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

        // Create a Flower object
        $flower = new Flower;
        $flower->name = $request->name;
        $flower->price = $request->price;

        // Save it in the DB and check if it worked
        if ($flower->save())
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
        $flower = Flower::find($id);
        return view('flower-details', ['f' => $flower]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flower::find($id);

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

        // Create a Flower object
        $flower = Flower::find($id);
        $flower->name = $request->name;
        $flower->price = $request->price;

        // Save it in the DB and check if it worked
        if ($flower->save())
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
        $res = Flower::destroy($id);

        if ($res) {
            return back()->with('success', 'Flower was delete');
            // return redirect('flowers');
        } else
            return back()->with('error', 'Delete didnt work.');
    }

    // Display form
    public function upload_file()
    {
        return view('upload-file');
    }

    // Submit
    public function upload_file_submit(Request $request)
    {
        // Validate the file
        $request->validate([
            'myFile' => ['required', 'mimes:jpg,png']
        ]);

        // Get the name of the file
        $fileName = $request->myFile->getClientOriginalName();

        // Save the public path
        $path = public_path('uploads');

        // Save the file in the public/uploads folder
        $request->myFile->move($path, $fileName);
    }
}
