@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold">
                Información del Ambiente
            </h2>

            <p class="text-muted">
                Detalles del ambiente de formación.
            </p>

        </div>

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h4 class="fw-bold mb-4">
                    {{ $ambiente->name }}
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <strong>
                            ID:
                        </strong>

                        <p>
                            {{ $ambiente->id }}
                        </p>

                    </div>

                    <div class="col-md-6 mb-4">

                        <strong>
                            Nombre:
                        </strong>

                        <p>
                            {{ $ambiente->name }}
                        </p>

                    </div>

                    <div class="col-md-6 mb-4">

                        <strong>
                            Ubicación:
                        </strong>

                        <p>
                            {{ $ambiente->location }}
                        </p>

                    </div>

                    <div class="col-md-6 mb-4">

                        <strong>
                            Centro de Formación:
                        </strong>

                        <p>
                            {{ $ambiente->trainingCenter->name ?? 'Sin centro' }}
                        </p>

                    </div>

                </div>

                <a href="{{ route('ambiente.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('ambiente.edit', $ambiente->id) }}"
                   class="btn btn-warning">
                    Editar
                </a>

            </div>

        </div>

    </div>

</div>

@endsection