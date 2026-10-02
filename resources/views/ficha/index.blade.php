@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Fichas
                </h2>

                <p class="text-muted mb-0">
                    Gestión de fichas de formación del SENA
                </p>

            </div>


            {{-- BOTÓN NUEVA FICHA --}}
            <a
                href="{{ route('ficha.create') }}"
                class="btn text-white fw-semibold px-4"
                style="
                    background-color: #198754;
                    border-color: #198754;
                    border-radius: 10px;
                "
            >

                <i class="bi bi-plus-lg me-2"></i>

                Nueva Ficha

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
        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        {{-- ENCABEZADO NEGRO --}}
                        <thead>

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
                                    Código
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Fecha de inicio
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Horario
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Oferta
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Programa
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

                            @forelse($fichas as $ficha)

                                <tr>

                                    {{-- ID --}}
                                    <td>

                                        <span class="fw-semibold">
                                            {{ $ficha->id }}
                                        </span>

                                    </td>


                                    {{-- CÓDIGO --}}
                                    <td>

                                        <strong>
                                            {{ $ficha->code }}
                                        </strong>

                                    </td>


                                    {{-- FECHA --}}
                                    <td>

                                        {{ $ficha->start_date }}

                                    </td>


                                    {{-- HORARIO --}}
                                    <td>

                                        <span class="badge bg-light text-dark border">
                                            {{ $ficha->schedule }}
                                        </span>

                                    </td>


                                    {{-- OFERTA --}}
                                    <td>

                                        {{ $ficha->oferta->jornada ?? 'Sin oferta' }}

                                    </td>


                                    {{-- PROGRAMA --}}
                                    <td>

                                        {{ $ficha->oferta->programa->name ?? 'Sin programa' }}

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="d-flex flex-wrap gap-1">

                                            {{-- VER --}}
                                            <a
                                                href="{{ route('ficha.show', $ficha->id) }}"
                                                class="btn btn-sm btn-info text-white"
                                            >

                                                <i class="bi bi-eye-fill me-1"></i>

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}
                                            <a
                                                href="{{ route('ficha.edit', $ficha->id) }}"
                                                class="btn btn-sm btn-warning"
                                            >

                                                <i class="bi bi-pencil-fill me-1"></i>

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}
                                            <form
                                                action="{{ route('ficha.destroy', $ficha->id) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Deseas eliminar esta ficha?')"
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
                                        colspan="7"
                                        class="text-center text-muted py-5"
                                    >

                                        <i
                                            class="bi bi-people-fill"
                                            style="font-size: 35px;"
                                        ></i>

                                        <div class="mt-2">
                                            No hay fichas registradas.
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