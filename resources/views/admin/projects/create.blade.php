
@extends('layouts.admin')


@section('content')


    <div class="container">
        <div class="text-center my-5">
            <h1>Inserisci un nuovo Progetto</h1>
        </div>


        {{-- messaggi in caso di aggiunta di un Project --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center w-50 pb-0" role="alert">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- /////////////////// --}}


        <div>
            <h5>Aggiungi un Progetto:</h5>

            <form class="my-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <input class="form-control w-50" placeholder="Titolo" type="text" name="title">

                <textarea class="form-control w-50 my-4" placeholder="Descrizione" name="description" cols="30" rows="5" name="description"></textarea>

                <button class="btn btn-success" type="submit">aggiungi</button>
            </form>
        </div>
    </div>

@endsection
