@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>
                <h2 class="fw-bold text-dark mb-1">
                    Listado de Programas
                </h2>

                <p class="text-muted mb-0">
                    Gestión de programas de formación del SENA.
                </p>
            </div>

            <a href="{{ route('programa.create') }}" class="btn btn-success
            background-color: #198754;">
                + Nuevo Programa
            </a>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Duración</th>
                                <th>Área</th>
                                <th class="text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($programas as $programa)

                                <tr>

                                    <td class="fw-bold text-secondary">
                                        #{{ $programa->id }}
                                    </td>

                                    <td class="fw-bold">
                                        {{ $programa->name }}
                                    </td>

                                    <td>
                                        {{ $programa->description ?? 'Sin descripción' }}
                                    </td>

                                    <td>
                                        {{ $programa->type }}
                                    </td>

                                    <td>
                                        {{ $programa->duration }} meses
                                    </td>

                                    <td>
                                        {{ $programa->area->name ?? 'Sin área' }}
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('programa.show', $programa->id) }}"
                                           class="btn btn-sm btn-info text-white">
                                            Ver
                                        </a>

                                        <a href="{{ route('programa.edit', $programa->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('programa.destroy', $programa->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este programa?')">
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center py-4 text-muted">
                                        No hay programas registrados.
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