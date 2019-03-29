@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Rapport crée</th>
                                <th>?</th>
                                <th>Motif</th>
                                <th>Bilan</th>
                                <th>Échantillon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rapports->all() as $rapport)
                                <tr>
                                    <td class="align-middle">{{date('j/m/y à H:i', strtotime($rapport->created_at))}}</td>
                                    <td class="align-middle">{{$rapport->id_matricule_practicien}}</td>
                                    <td class="align-middle">{{$rapport->motif}}</td>
                                    <td class="align-middle">{{$rapport->bilan}}</td>
                                    <td class="align-middle">{{$rapport->echantillon}}</td>
                                    <td>
                                          <button class="btn" type="button" name="button"> <a href="{{action('RapportController@edit', $rapport->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></button>
                                    </td>
                                    <td>
                                        <form action="{{action('RapportController@destroy', $rapport->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button class="btn btn-danger" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                        </form>
                                    </td>
                                </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
