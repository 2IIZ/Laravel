@extends('layouts.app')

@section('content')

  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-3">
            <form method="POST" action="{{action('CalendarController@store')}}" enctype="multipart/form-data">
              @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Rédiger un rapport</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Practicien : <b>{{$practicien['name']}}</b></label>
                        <br>
                        <label>Matricule : {{$practicien['id_matricule_practicien']}}</label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_visiteur" value="{{Auth::id()}}">
                        <input type="hidden" name="id_matricule_practicien" value="{{$practicien['id_matricule_practicien']}}">
                    </div>
                    <div class="form-group">
                        <label>Motif</label>
                        <input type="text" name="motif" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Bilan</label>
                        <textarea class="form-control" name="bilan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Échantillons offerts</label>
                        <input type="text" name="echantillon" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" value="Sauvegarder">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
