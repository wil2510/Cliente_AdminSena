@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 fw-bold text-success mb-1">Panel de Administración: ¿Quiénes Somos?</h1>
            <p class="text-muted mb-0">Gestión de la información institucional del SENA</p>
        </div>
        <a href="{{ route('quienes-somos.create') }}" class="btn btn-success fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Crear Registro
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-success text-white">
                        <tr>
                            <th scope="col" class="ps-4 py-3">#</th>
                            <th scope="col" class="py-3">Título</th>
                            <th scope="col" class="py-3">Descripción Resumida</th>
                            <th scope="col" class="py-3">Estado</th>
                            <th scope="col" class="py-3 text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items ?? [] as $item)
                            <tr>
                                <td class="ps-4 fw-bold">{{ $item->id }}</td>
                                <td class="fw-semibold">{{ $item->title }}</td>
                                <td class="text-muted">{{ Str::limit($item->description, 50) }}</td>
                                <td><span class="badge bg-success">Activo</span></td>
                                <td class="text-end pe-4">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('quienes-somos.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('quienes-somos.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form action="{{ route('quienes-somos.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desea eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-start-0">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No hay registros disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection