@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Computadores
                </h2>

                <p class="text-muted small mb-0">
                    Gestión de computadores registrados en el sistema.
                </p>

            </div>


            <a href="{{ route('computer.create') }}"
               class="btn text-white fw-bold px-4 py-2 shadow-sm"
               style="background-color: #198754;">

                Nuevo Computador

            </a>

        </div>


        {{-- MENSAJE DE ÉXITO --}}

        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- TABLA --}}

        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>

                                <th class="ps-4">
                                    ID
                                </th>

                                <th>
                                    Número de Equipo
                                </th>

                                <th>
                                    Marca
                                </th>

                                <th class="text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($computers as $computer)

                                <tr>

                                    <td class="ps-4 fw-bold">
                                        #{{ $computer->id }}
                                    </td>


                                    <td class="fw-bold">
                                        {{ $computer->number }}
                                    </td>


                                    <td>

                                        <span class="badge bg-success">
                                            {{ $computer->brand }}
                                        </span>

                                    </td>


                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- VER --}}

                                            <a href="{{ route('computer.show', $computer->id) }}"
                                               class="btn btn-sm btn-info text-white">

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}

                                            <a href="{{ route('computer.edit', $computer->id) }}"
                                               class="btn btn-sm btn-warning text-white">

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}

                                            <form action="{{ route('computer.destroy', $computer->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Está seguro de eliminar este computador del inventario?')">

                                                @csrf

                                                @method('delete')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">

                                                    Eliminar

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-5 text-muted">

                                        No hay computadores registrados.

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