@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h2 class="fw-bold text-dark mb-1">
                    Listado de Aprendices
                </h2>
                <p class="text-muted small mb-0">
                    Gestión de aprendices, áreas y computadores.
                </p>
            </div>
            <a href="{{ route('apprentice.create') }}"
                class="btn text-white fw-bold px-4 py-2 shadow-sm"
                style="background-color: #198754;">
                Nuevo Aprendiz
            </a>
        </div>
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
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Curso</th>
                                <th>Computador</th>
                                <th class="text-center">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (($apprentices ?? []) as $apprentice)
                                <tr>
                                    <td class="ps-4 fw-bold">
                                        #{{ $apprentice['id'] }}
                                    </td>
                                    <td class="fw-bold">
                                        {{ $apprentice['name'] }}
                                    </td>
                                    <td>
                                        {{ $apprentice['email'] }}
                                    </td>
                                    <td>
                                        {{ $apprentice['course_id'] }}
                                    </td>
                                    <td>
                                        {{ $apprentice['computer_id'] }}
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('apprentice.show', $apprentice['id']) }}"
                                                class="btn btn-sm btn-info text-white">
                                                Ver
                                            </a>
                                            <a href="{{ route('apprentice.edit', $apprentice['id']) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                Editar
                                            </a>
                                            <form action="{{ route('apprentice.destroy', $apprentice['id']) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Está seguro de eliminar este aprendiz?')">
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
                                        No hay aprendices registrados.
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