@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold text-dark">
                Editar Oferta
            </h2>

            <p class="text-muted">
                Modifica la información de la oferta seleccionada.
            </p>

        </div>

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>Por favor corrige los siguientes errores:</strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('oferta.update', $oferta->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Jornada
                            </label>

                            <select name="jornada" class="form-select" required>

                                <option value="Mañana"
                                    {{ old('jornada', $oferta->jornada) == 'Mañana' ? 'selected' : '' }}>
                                    Mañana
                                </option>

                                <option value="Tarde"
                                    {{ old('jornada', $oferta->jornada) == 'Tarde' ? 'selected' : '' }}>
                                    Tarde
                                </option>

                                <option value="Noche"
                                    {{ old('jornada', $oferta->jornada) == 'Noche' ? 'selected' : '' }}>
                                    Noche
                                </option>

                                <option value="Mixta"
                                    {{ old('jornada', $oferta->jornada) == 'Mixta' ? 'selected' : '' }}>
                                    Mixta
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Fecha de inscripción
                            </label>

                            <input type="date"
                                   name="registration_date"
                                   class="form-control"
                                   value="{{ old('registration_date', $oferta->registration_date) }}"
                                   required>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Capacidad
                            </label>

                            <div class="input-group">

                                <input type="number"
                                       name="capacity"
                                       class="form-control"
                                       value="{{ old('capacity', $oferta->capacity) }}"
                                       min="1"
                                       required>

                                <span class="input-group-text">
                                    aprendices
                                </span>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label fw-bold">
                                Programa
                            </label>

                            <select name="programa_id" class="form-select" required>

                                @foreach($programas as $programa)

                                    <option value="{{ $programa->id }}"
                                        {{ old('programa_id', $oferta->programa_id) == $programa->id ? 'selected' : '' }}>

                                        {{ $programa->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="mt-4 d-flex gap-2">

                        <button type="submit" class="btn btn-success">
                            Actualizar Oferta
                        </button>

                        <a href="{{ route('oferta.index') }}"
                           class="btn btn-secondary">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection