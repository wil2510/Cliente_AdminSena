@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">

        <div class="mb-4">
            <h2 class="fw-bold">Información de la Ficha</h2>
            <p class="text-muted">
                Detalles de la ficha registrada.
            </p>
        </div>

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h4 class="fw-bold mb-4">
                    Ficha {{ $ficha->code }}
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <strong>Código:</strong>
                        <p>{{ $ficha->code }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Fecha de inicio:</strong>
                        <p>{{ $ficha->start_date }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Horario:</strong>
                        <p>{{ $ficha->schedule }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Oferta:</strong>
                        <p>
                            {{ $ficha->oferta->jornada ?? 'Sin oferta' }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Programa:</strong>
                        <p>
                            {{ $ficha->oferta->programa->name ?? 'Sin programa' }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Capacidad de la oferta:</strong>
                        <p>
                            {{ $ficha->oferta->capacity ?? 'No disponible' }}
                        </p>
                    </div>

                </div>

                <div class="mt-3">

                    <a href="{{ route('ficha.index') }}"
                       class="btn btn-secondary">
                        Volver
                    </a>

                    <a href="{{ route('ficha.edit', $ficha->id) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection