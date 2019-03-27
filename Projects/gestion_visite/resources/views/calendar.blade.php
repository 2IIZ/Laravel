@extends('layouts.app')

@section('content')


<div class="container">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Gérer mes<b> visites</b> - {{ Carbon::now('Europe/Paris')->locale('fr_FR')->isoFormat('dddd Do MMMM YYYY, HH:mm') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Prochaine heure de visite</th>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Rédiger un rapport</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($practiciens->all() as $practicien)
                    <tr>
                        <td>{{date('j/m/y à H:i', strtotime($practicien->nouvelle_visite))}}</td>
                        <td>{{$practicien->name}}</td>
                        <td>{{$practicien->mail}}</td>
                        <td>{{$practicien->adresse}}</td>
                        <td>{{$practicien->telephone}}</td>
                        <td>
                            <a href="#editEmployee" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></i></a>
                        </td>
                    </tr>
                    @php
                      $name = $practicien->name;
                      $id_matricule_practicien = $practicien->matricule;
                    @endphp
                  @endforeach
                </tbody>
            </table>

            <!-- Edit Modal HTML -->
            <div id="editEmployee" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{url('rapports')}}" enctype="multipart/form-data">
                          @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Rédiger un rapport</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Practicien : <b>{{$name}}</b></label>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_visiteur" value="{{Auth::id()}}">
                                    <input type="hidden" name="id_matricule_practicien" value="{{$id_matricule_practicien}}">
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
                                    <label>Échantillons offerts</l  abel>
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

          </div>
        </div>


</div>

        @endsection
