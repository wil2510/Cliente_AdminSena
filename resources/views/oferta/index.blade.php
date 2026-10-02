@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

            <div>
                <h2 class="fw-bold text-dark mb-1">
                    Listado de Ofertas
                </h2>

                <p class="text-muted mb-0">
                    Gestión de ofertas de formación del SENA.
                </p>
            </div>

            <a href="{{ route('oferta.create') }}" class="btn btn-success
            background-color: #198754;">
                + Nueva Oferta
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
                                <th>Jornada</th>
                                <th>Fecha de Inscripción</th>
                                <th>Capacidad</th>
                                <th>Programa</th>
                                <th class="text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($ofertas as $oferta)

                                <tr>

                                    <td class="fw-bold text-secondary">
                                        #{{ $oferta->id }}
                                    </td>

                                    <td>
                                        {{ $oferta->jornada }}
                                    </td>

                                    <td>
                                        {{ $oferta->registration_date }}
                                    </td>

                                    <td>
                                        {{ $oferta->capacity }} aprendices
                                    </td>

                                    <td class="fw-bold">
                                        {{ $oferta->programa->name ?? 'Sin programa' }}
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('oferta.show', $oferta->id) }}"
                                           class="btn btn-sm btn-info text-white">
                                            Ver
                                        </a>

                                        <a href="{{ route('oferta.edit', $oferta->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('oferta.destroy', $oferta->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro que deseas eliminar esta oferta?')">
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-4 text-muted">
                                        No hay ofertas registradas.
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