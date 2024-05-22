
@extends('layouts.admin')


@section('content')


    <div class="container">

        <div class="text-center my-4">
            <h1>Projects</h1>
        </div>


        <div class="mb-5">
            <h5>Aggiungi un Progetto:</h5>

            <form class="d-flex my-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <input class="form-control me-4 w-25" placeholder="Titolo" type="text" name="title">
                <input class="form-control me-4 w-25" placeholder="Descrizione" type="text" name="description">
                <button class="btn btn-success" type="submit">aggiungi</button>
            </form>
        </div>



        @if (session('error'))
            <div class="alert alert-danger text-center w-50 mb-5" role="alert">
                {{ session('error') }}
            </div>
        @endif


        @if (session('success'))
            <div class="alert alert-success text-center w-50 mb-5" role="alert">
                {{ session('success') }}
            </div>
        @endif



        <div class="container_table">
            <table class="table w-75">
                <thead>
                    <tr class="fs-5">
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project)
                        <tr>
                            <th>{{ $project->title }}</th>
                            <td>{{ $project->description }}</td>




                            <td class="d-flex">
                                <button class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></button>

                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </td>




                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection
