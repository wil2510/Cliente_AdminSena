@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold text-dark">
                Información del Programa
            </h2>

            <p class="text-muted">
                Detalles del programa de formación.
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
                            #{{ $programa->id }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Nombre
                        </small>

                        <h5 class="fw-bold">
                            {{ $programa->name }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Tipo de formación
                        </small>

                        <h5>
                            {{ $programa->type }}
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Duración
                        </small>

                        <h5>
                            {{ $programa->duration }} meses
                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted">
                            Área
                        </small>

                        <h5>
                            {{ $programa->area->name ?? 'Sin área' }}
                        </h5>

                    </div>

                    <div class="col-12">

                        <small class="text-muted">
                            Descripción
                        </small>

                        <p class="mt-2">
                            {{ $programa->description ?? 'Sin descripción.' }}
                        </p>

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a href="{{ route('programa.edit', $programa->id) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <a href="{{ route('programa.index') }}"
                       class="btn btn-secondary">
                        Volver
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection