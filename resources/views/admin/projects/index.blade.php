
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


        {{-- messaggi in caso di aggiunta di un Project --}}
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
        {{-- /////////////////// --}}


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
                            <td>
                                <form
                                  action="{{ route('admin.projects.update', $project) }}"
                                  method="POST"
                                  id="form-edit-{{ $project->id }}"
                                  >
                                    @csrf
                                    @method('PUT')
                                    <input class="w-100" value="{{ $project->title }}" name="title">
                                </form>
                            </td>

                            <td>
                                <form
                                  action="{{ route('admin.projects.update', $project) }}"
                                  method="POST"
                                  id="form-edit-{{ $project->id }}"
                                  >
                                    @csrf
                                    @method('PUT')
                                    <textarea class="descr_textarea w-75" cols="30" rows="2" name="description">{{ $project->description }}</textarea>
                                </form>
                            </td>


                            <td>
                                <div class="d-flex">
                                    <button
                                      class="btn btn-warning me-2 h-50"
                                      onclick="submitForm( {{ $project->id }} )"
                                      ><i class="fa-solid fa-pencil"></i>
                                    </button>


                                    <form
                                      action="{{ route('admin.projects.destroy', $project) }}"
                                      method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection



<script>

    function submitForm(id){
        const form = document.getElementById(`form-edit-${id}`);
        form.submit();
    }



</script>
