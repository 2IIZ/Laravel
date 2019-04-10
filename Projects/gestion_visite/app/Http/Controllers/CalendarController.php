<?php

namespace LGSB\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $practiciens = DB::table('practiciens')->orderBy('nouvelle_visite', 'asc')->get();


      return view('calendar.index', ['practiciens' => $practiciens]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('calendar.create', ['practicien' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rapport = new \LGSB\Rapport;
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

    public function calendar(){
    }
}
