<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rapports = DB::table('rapports')->orderBy('created_at', 'desc')->where('id_visiteur', '=', Auth::id())->get();


      return view('rapport.index', ['rapports' => $rapports]);
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
      $rapport = new \App\Rapport;
      $rapport->id_matricule_practicien = $request->get('id_matricule_practicien');
      $rapport->motif = $request->get('motif');
      $rapport->bilan = $request->get('bilan');
      $rapport->echantillon = $request->get('echantillon');
      $rapport->id_visiteur = $request->get('id_visiteur');
      $rapport->save();

      $rapport->bilan = $request->get('bilan');
      return redirect('calendar');
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
      $rapport = \App\Rapport::find($id);
      return view('rapport.edit', compact('rapport','id'));
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
      $rapport= \App\Rapport::find($id);
      $rapport->motif = $request->get('motif');
      $rapport->bilan = $request->get('bilan');
      $rapport->echantillon = $request->get('echantillon');

      $rapport->save();

      return Redirect::action('RapportController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rapport = \App\Rapport::find($id);
      $rapport->delete();
      return Redirect::action('RapportController@index');
    }
}
