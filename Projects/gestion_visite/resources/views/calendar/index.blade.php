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
                    @php
                      $create_praciticen['name'] = $practicien->name;
                      $create_praciticen['id_matricule_practicien'] = $practicien->matricule;
                    @endphp
                    <tr>
                        <td>{{date('j/m/y à H:i', strtotime($practicien->nouvelle_visite))}}</td>
                        <td>{{$practicien->name}}</td>
                        <td>{{$practicien->mail}}</td>
                        <td>{{$practicien->adresse}}</td>
                        <td>{{$practicien->telephone}}</td>
                        <td>
                              <button class="btn" type="button" name="button"> <a href="{{action('CalendarController@create', $create_praciticen)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">edit</i></a></button>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>



          </div>
        </div>


</div>

        @endsection
