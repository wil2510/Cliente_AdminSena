@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        {{-- ENCABEZADO --}}

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>

                <h2 class="fw-bold text-dark mb-1">
                    Listado de Cursos
                </h2>

                <p class="text-muted small mb-0">
                    Gestión de cursos, áreas y centros de formación.
                </p>

            </div>


            <a href="{{ route('course.create') }}"
               class="btn text-white fw-bold px-4 py-2 shadow-sm"
               style="background-color: #198754;">

                Nuevo Curso

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
                                    Código
                                </th>

                                <th>
                                    Nombre
                                </th>

                                <th>
                                    Área
                                </th>

                                <th>
                                    Centro de Formación
                                </th>

                                <th class="text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($courses as $course)

                                <tr>

                                    <td class="ps-4 fw-bold">
                                        #{{ $course->id }}
                                    </td>


                                    <td>

                                        <span class="badge bg-success">
                                            {{ $course->code }}
                                        </span>

                                    </td>


                                    <td class="fw-bold">
                                        {{ $course->name }}
                                    </td>


                                    <td>

                                        @if ($course->area)

                                            {{ $course->area->name }}

                                        @else

                                            <span class="text-muted">
                                                Sin área
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        @if ($course->trainingCenter)

                                            {{ $course->trainingCenter->name }}

                                        @else

                                            <span class="text-muted">
                                                Sin centro
                                            </span>

                                        @endif

                                    </td>


                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- VER --}}

                                            <a href="{{ route('course.show', $course->id) }}"
                                               class="btn btn-sm btn-info text-white">

                                                Ver

                                            </a>


                                            {{-- EDITAR --}}

                                            <a href="{{ route('course.edit', $course->id) }}"
                                               class="btn btn-sm btn-warning text-white">

                                                Editar

                                            </a>


                                            {{-- ELIMINAR --}}

                                            <form action="{{ route('course.destroy', $course->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Deseas eliminar este curso?')">

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

                                    <td colspan="6"
                                        class="text-center py-5 text-muted">

                                        No hay cursos registrados.

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