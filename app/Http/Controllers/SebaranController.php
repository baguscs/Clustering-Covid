<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sebaran;
use App\Models\Provinsi;
use PDF;

class SebaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nav = "active";
        $data = Sebaran::all();
        return view("dashboard.sebaran.index", compact("nav", 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = "active";
        $data = Provinsi::where("status", "!=", "1")->get();
        return view("dashboard.sebaran.add", compact("nav", 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'provinsi_id' => 'required',
            'treated' => 'required',
            'confirmation' => 'required',
            'healed' => 'required',
            'die' => 'required',
        ]);

        $new = Sebaran::create($request->all());

        $update = Provinsi::where('id', $request->provinsi_id)->firstOrFail();

        $update->status = 1;
        $update->save();

        return redirect()->route('sebaran.index')->with('message', 'Berhasil Menambah Data Sebaran');
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
    public function edit(Sebaran $sebaran)
    {
        $nav = "active";
        $data = Provinsi::all();
        return view("dashboard.sebaran.edit", compact("nav", "sebaran", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sebaran $sebaran)
    {
        $validation = $request->validate([
            'treated' => 'required',
            'confirmation' => 'required',
            'healed' => 'required',
            'die' => 'required',
        ]);

        $sebaran->update($request->all());
        return redirect()->route('sebaran.index')->with('message', 'Berhasil Mengedit Data Sebaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sebaran $sebaran)
    {
        $update = Provinsi::where('id', $sebaran->id)->firstOrFail();

        $update->status = 0;
        $update->save();

        $sebaran->delete();
        return redirect()->back()->with('message', 'Berhasil Mengahapus Data Sebaran');
    }
}
