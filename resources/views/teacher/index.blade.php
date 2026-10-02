@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="container">
        {{-- ENCABEZADO --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h2 class="fw-bold text-dark mb-1">
                    Listado de Instructores
                </h2>
                <p class="text-muted small mb-0">
                    Gestión de instructores, áreas y centros de formación.
                </p>
            </div>
            <a href="{{ route('teacher.create') }}"
                class="btn text-white fw-bold px-4 py-2 shadow-sm"
                style="background-color: #198754;">
                Nuevo Instructor
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
                                    Nombre
                                </th>
                                <th>
                                    Email
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
                            @forelse ($teachers as $teacher)
                                <tr>
                                    <td class="ps-4 fw-bold">
                                        #{{ $teacher->id }}
                                    </td>
                                    <td class="fw-bold">
                                        {{ $teacher->name }}
                                    </td>
                                    <td>
                                        {{ $teacher->email }}
                                    </td>
                                    <td>
                                        @if ($teacher->area)
                                            <span class="badge bg-success">
                                                {{ $teacher->area->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Sin área
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($teacher->training_center)
                                            <span class="badge bg-success">
                                                {{ $teacher->training_center->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Sin centro
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- VER --}}
                                            <a href="{{ route('teacher.show', $teacher->id) }}"
                                                class="btn btn-sm btn-info text-white">
                                                Ver
                                            </a>
                                            {{-- EDITAR --}}
                                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                Editar
                                            </a>
                                            {{-- ELIMINAR --}}
                                            <form action="{{ route('teacher.destroy', $teacher->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Está seguro de eliminar este instructor?')">
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
                                        No hay instructores registrados.
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