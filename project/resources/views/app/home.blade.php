@extends('app')

@section('title', 'Domovská stránka')

@section('content')
    <h3>Vítej {{ Auth::user()->name }} v naší aplikaci.</h3>

    <div class="row col-sm-3 p-3">
        Informace o přihlášeném uživateli:
    </div>

    <table class="table table-stripped">
        <tr>
            <td>ID</td>
            <td>{{ Auth::user()->id }}</td>
        </tr>
        <tr>
            <td>Jméno</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <td>Registrace</td>
            <td>{{ Auth::user()->created_at }}</td>
        </tr>

    </table>

@endsection