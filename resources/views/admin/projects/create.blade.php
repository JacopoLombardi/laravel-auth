
@extends('layouts.admin')


@section('content')


    <div class="container">

        <div class="text-center my-4">
            <h1>Inserisci un nuovo Projects</h1>
        </div>



        <div class="mt-5">
            <h5>Aggiungi un Progetto:</h5>

            <form class="my-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <input class="form-control w-50" placeholder="Titolo" type="text" name="title">

                <textarea class="form-control w-50 my-4" placeholder="Descrizione" name="" cols="30" rows="5" name="description"></textarea>

                <button class="btn btn-success" type="submit">aggiungi</button>
            </form>
        </div>


@endsection
