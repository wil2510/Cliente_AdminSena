@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Noticias
                </h2>

                <p class="text-muted mb-0">
                    Gestión de noticias e información del SENA
                </p>

            </div>


            {{-- BOTÓN NUEVA NOTICIA --}}
            <a
                href="{{ route('noticia.create') }}"
                class="btn text-white fw-semibold px-4"
                style="
                    background-color: #198754;
                    border-color: #198754;
                    border-radius: 10px;
                "
            >

                <i class="bi bi-plus-lg me-2"></i>

                Nueva Noticia

            </a>

        </div>


        {{-- MENSAJE DE ÉXITO --}}
        @if(session('success'))

            <div class="alert alert-success border-0 shadow-sm">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- TABLA --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        {{-- ENCABEZADO NEGRO --}}
                        <thead
                            style="
                                background-color: #000000;
                                color: #ffffff;
                            "
                        >

                            <tr>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    ID
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Imagen
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Título
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Fecha
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Centro de Formación
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        {{-- CUERPO --}}
                        <tbody>

                            @forelse($noticias as $noticia)

                                <tr>

                                    {{-- ID --}}
                                    <td>

                                        <span class="fw-semibold">
                                            {{ $noticia->id }}
                                        </span>

                                    </td>


                                    {{-- IMAGEN --}}
                                    <td>

                                        @if($noticia->image)

                                            <img
                                                src="{{ asset('storage/' . $noticia->image) }}"
                                                alt="{{ $noticia->title }}"
                                                width="80"
                                                height="60"
                                                style="
                                                    object-fit: cover;
                                                    border-radius: 8px;
                                                "
                                            >

                                        @else

                                            <span class="text-muted">
                                                Sin imagen
                                            </span>

                                        @endif

                                    </td>


                                    {{-- TÍTULO --}}
                                    <td>

                                        <strong>
                                            {{ $noticia->title }}
                                        </strong>

                                    </td>


                                    {{-- FECHA --}}
                                    <td>

                                        {{ $noticia->publish_date }}

                                    </td>


                                    {{-- CENTRO --}}
                                    <td>

                                        {{ $noticia->trainingCenter->name ?? 'Sin centro' }}

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="d-flex flex-wrap gap-1">

                                            {{-- VER --}}
                                            <a
                                                href="{{ route('noticia.show', $noticia->id) }}"
                                                class="btn btn-sm btn-info text-white"
                                            >

                                                <i class="bi bi-eye-fill me-1"></i>

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}
                                            <a
                                                href="{{ route('noticia.edit', $noticia->id) }}"
                                                class="btn btn-sm btn-warning"
                                            >

                                                <i class="bi bi-pencil-fill me-1"></i>

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}
                                            <form
                                                action="{{ route('noticia.destroy', $noticia->id) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Deseas eliminar esta noticia?')"
                                                >

                                                    <i class="bi bi-trash-fill me-1"></i>

                                                    Eliminar

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center text-muted py-5"
                                    >

                                        <i
                                            class="bi bi-newspaper"
                                            style="font-size: 35px;"
                                        ></i>

                                        <div class="mt-2">
                                            No hay noticias registradas.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection