@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">

            <form method="POST" action="{{action('RapportController@update', $id)}}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="modal-header">
                    <h4 class="modal-title">Modifier un rapport</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Matricule practicien : <b>{{$rapport['id_matricule_practicien']}}</b></label>
                    </div>
                    <div class="form-group">
                        <label>Motif</label>
                        <input type="text" name="motif" class="form-control" value="{{$rapport['motif']}}">
                    </div>
                    <div class="form-group">
                        <label>Bilan</label>
                        <textarea class="form-control" name="bilan">{{$rapport['bilan']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Échantillons offerts</label>
                        <input type="text" name="echantillon" class="form-control" value="{{$rapport['echantillon']}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" value="Sauvegarder">
                </div>
            </form>
        </div>

    </div>


    @endsection
