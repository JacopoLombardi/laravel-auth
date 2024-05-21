
<header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fs-5 fw-semibold border-bottom py-3">
        <div class="container-fluid mx-5">
            <a class="navbar-brand ms-5" href="{{ route('home') }}">Visualizza il Sito</a>

            <div class="d-flex align-items-center">
                <p class="fw-bold  text-capitalize fs-4 m-0 me-5">{{ Auth::user()->name }}</p>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger fw-semibold fs-5 rounded-5 px-3 py-1">Log Out</button>
                </form>
            </div>
        </div>
      </nav>

</header>
