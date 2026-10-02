@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold text-dark">
                Información de la Oferta
            </h2>

            <p class="text-muted">
                Detalles de la oferta de formación.
            </p>

        </div>

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">

                        <small class="text-muted">
                            ID
                        </small>

                        <h5 class="fw-bold">
                            #{{ $oferta->id }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Jornada
                        </small>

                        <h5 class="fw-bold">
                            {{ $oferta->jornada }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Fecha de inscripción
                        </small>

                        <h5>
                            {{ $oferta->registration_date }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Capacidad
                        </small>

                        <h5>
                            {{ $oferta->capacity }} aprendices
                        </h5>

                    </div>

                    <div class="col-md-12">

                        <small class="text-muted">
                            Programa
                        </small>

                        <h5 class="fw-bold">
                            {{ $oferta->programa->name ?? 'Sin programa' }}
                        </h5>

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a href="{{ route('oferta.edit', $oferta->id) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <a href="{{ route('oferta.index') }}"
                       class="btn btn-secondary">
                        Volver
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection