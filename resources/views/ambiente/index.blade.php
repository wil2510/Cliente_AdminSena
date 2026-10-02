@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Ambientes
                </h2>

                <p class="text-muted mb-0">
                    Gestión de ambientes de formación del SENA
                </p>

            </div>


            {{-- BOTÓN NUEVO AMBIENTE --}}
            <a
                href="{{ route('ambiente.create') }}"
                class="btn text-white fw-semibold px-4"
                style="
                    background-color: #198754;
                    border-color: #198754;
                    border-radius: 10px;
                "
            >

                <i class="bi bi-plus-lg me-2"></i>

                Nuevo Ambiente

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
                                    Nombre
                                </th>

                                <th
                                    class="py-3"
                                    style="
                                        background-color: #000000;
                                        color: #ffffff;
                                    "
                                >
                                    Ubicación
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

                            @forelse($ambientes as $ambiente)

                                <tr>

                                    {{-- ID --}}
                                    <td>

                                        <span class="fw-semibold">
                                            {{ $ambiente->id }}
                                        </span>

                                    </td>


                                    {{-- NOMBRE --}}
                                    <td>

                                        <strong>
                                            {{ $ambiente->name }}
                                        </strong>

                                    </td>


                                    {{-- UBICACIÓN --}}
                                    <td>

                                        <i
                                            class="bi bi-geo-alt-fill me-1"
                                            style="color: #198754;"
                                        ></i>

                                        {{ $ambiente->location }}

                                    </td>


                                    {{-- CENTRO --}}
                                    <td>

                                        <i
                                            class="bi bi-building-fill me-1"
                                            style="color: #198754;"
                                        ></i>

                                        {{ $ambiente->trainingCenter->name ?? 'Sin centro' }}

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="d-flex flex-wrap gap-1">

                                            {{-- VER --}}
                                            <a
                                                href="{{ route('ambiente.show', $ambiente->id) }}"
                                                class="btn btn-sm btn-info text-white"
                                            >

                                                <i class="bi bi-eye-fill me-1"></i>

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}
                                            <a
                                                href="{{ route('ambiente.edit', $ambiente->id) }}"
                                                class="btn btn-sm btn-warning"
                                            >

                                                <i class="bi bi-pencil-fill me-1"></i>

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}
                                            <form
                                                action="{{ route('ambiente.destroy', $ambiente->id) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Deseas eliminar este ambiente?')"
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
                                        colspan="5"
                                        class="text-center text-muted py-5"
                                    >

                                        <i
                                            class="bi bi-building"
                                            style="font-size: 35px;"
                                        ></i>

                                        <div class="mt-2">
                                            No hay ambientes registrados.
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