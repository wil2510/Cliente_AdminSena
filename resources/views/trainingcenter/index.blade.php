@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Centros de Formación
                </h2>

                <p class="text-muted small mb-0">
                    Gestión de centros de formación registrados en el sistema.
                </p>

            </div>


            <a href="{{ route('trainingcenter.create') }}"
               class="btn text-white fw-bold px-4 py-2 shadow-sm"
               style="background-color: #198754;">

                Nuevo Centro

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
                                    Nombre del Centro
                                </th>

                                <th>
                                    Ubicación
                                </th>

                                <th class="text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($trainingcenters as $trainingcenter)

                                <tr>

                                    <td class="ps-4 fw-bold">
                                        #{{ $trainingcenter->id }}
                                    </td>


                                    <td class="fw-bold">
                                        {{ $trainingcenter->name }}
                                    </td>


                                    <td>
                                        {{ $trainingcenter->location }}
                                    </td>


                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- VER --}}

                                            <a href="{{ route('trainingcenter.show', $trainingcenter->id) }}"
                                               class="btn btn-sm btn-info text-white">

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}

                                            <a href="{{ route('trainingcenter.edit', $trainingcenter->id) }}"
                                               class="btn btn-sm btn-warning text-white">

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}

                                            <form action="{{ route('trainingcenter.destroy', $trainingcenter->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Está completamente seguro de eliminar este centro?')">

                                                @csrf

                                                @method('DELETE')

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

                                        No hay centros de formación registrados.

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