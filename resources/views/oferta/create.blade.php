@extends('layouts.app')

@section('content')

<div style="background: #f6f8f7; min-height: 92vh; padding: 45px 0;">
    <div class="container">

        {{-- ENCABEZADO --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-start gap-3">

                <div style="width: 6px; height: 70px; background: #39A900; border-radius: 10px;"></div>

                <div>
                    <div class="fw-bold text-uppercase"
                        style="color: #39A900; font-size: 13px; letter-spacing: 1px;">
                        Administración Académica
                    </div>

                    <h1 class="fw-bold mb-1">
                        Nueva Oferta
                    </h1>

                    <p class="text-muted mb-0">
                        Registra una nueva oferta de formación en el sistema.
                    </p>
                </div>

            </div>

            <div class="bg-white shadow-sm rounded-3 px-4 py-3 text-center">
                <i class="bi bi-megaphone-fill"
                    style="font-size: 28px; color: #39A900;"></i>

                <div class="small fw-bold text-muted mt-1">
                    OFERTAS
                </div>
            </div>

        </div>


        <div class="row g-4">

            {{-- PANEL IZQUIERDO --}}
            <div class="col-lg-5">

                <div class="h-100 p-4 p-lg-5 text-white"
                    style="
                        background: linear-gradient(145deg, #17202a 0%, #263746 100%);
                        border-radius: 18px;
                    ">

                    <div class="d-flex align-items-center justify-content-center mb-4"
                        style="
                            width: 60px;
                            height: 60px;
                            background: #39A900;
                            border-radius: 15px;
                        ">

                        <i class="bi bi-megaphone-fill" style="font-size: 28px;"></i>

                    </div>

                    <h2 class="fw-bold">
                        Crear oferta
                    </h2>

                    <p class="text-white-50" style="line-height: 1.7;">
                        Registra una nueva oferta académica para organizar
                        las oportunidades de formación disponibles.
                    </p>


                    <div class="mt-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">01</div>

                            <div>
                                <div class="fw-bold">Jornada</div>
                                <small class="text-white-50">
                                    Selecciona el horario de formación.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">02</div>

                            <div>
                                <div class="fw-bold">Inscripción</div>
                                <small class="text-white-50">
                                    Registra la fecha de inscripción.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="fw-bold" style="color: #39A900;">03</div>

                            <div>
                                <div class="fw-bold">Programa y capacidad</div>
                                <small class="text-white-50">
                                    Define el programa y número de cupos.
                                </small>
                            </div>
                        </div>

                    </div>

                    <div class="border-top border-secondary mt-5 pt-4">
                        <small class="text-white-50">
                            Admin SENA · Gestión académica
                        </small>
                    </div>

                </div>

            </div>


            {{-- FORMULARIO --}}
            <div class="col-lg-7">

                <div class="bg-white shadow-sm h-100" style="border-radius: 18px;">

                    <div class="p-4 border-bottom">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h4 class="fw-bold mb-1">
                                    Información de la oferta
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>
                            </div>

                            <i class="bi bi-three-dots"
                                style="font-size: 24px; color: #6c757d;"></i>

                        </div>

                    </div>


                    <form action="{{ route('oferta.store') }}" method="POST">

                        @csrf

                        <div class="p-4">

                            @if ($errors->any())
                                <div class="alert alert-danger d-flex align-items-start gap-2">

                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    <div>
                                        <strong>Revisa la información:</strong>

                                        <ul class="mb-0 mt-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            @endif


                            {{-- JORNADA --}}
                            <div class="mb-4">

                                <label for="jornada" class="form-label fw-semibold">

                                    <i class="bi bi-calendar3 me-2 text-success"></i>

                                    Jornada

                                </label>

                                <select
                                    id="jornada"
                                    name="jornada"
                                    class="form-select form-select-lg @error('jornada') is-invalid @enderror"
                                    style="border-radius: 10px;"
                                >

                                    <option value="">
                                        Selecciona una jornada
                                    </option>

                                    <option value="Mañana"
                                        {{ old('jornada') == 'Mañana' ? 'selected' : '' }}>
                                        Mañana
                                    </option>

                                    <option value="Tarde"
                                        {{ old('jornada') == 'Tarde' ? 'selected' : '' }}>
                                        Tarde
                                    </option>

                                    <option value="Noche"
                                        {{ old('jornada') == 'Noche' ? 'selected' : '' }}>
                                        Noche
                                    </option>

                                    <option value="Mixta"
                                        {{ old('jornada') == 'Mixta' ? 'selected' : '' }}>
                                        Mixta
                                    </option>

                                </select>

                                @error('jornada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="row">

                                {{-- FECHA --}}
                                <div class="col-md-6 mb-4">

                                    <label for="registration_date" class="form-label fw-semibold">

                                        <i class="bi bi-calendar-event-fill me-2 text-success"></i>

                                        Fecha de inscripción

                                    </label>

                                    <input
                                        type="date"
                                        id="registration_date"
                                        name="registration_date"
                                        value="{{ old('registration_date') }}"
                                        class="form-control form-control-lg @error('registration_date') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                    @error('registration_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                                {{-- CAPACIDAD --}}
                                <div class="col-md-6 mb-4">

                                    <label for="capacity" class="form-label fw-semibold">

                                        <i class="bi bi-people-fill me-2 text-success"></i>

                                        Capacidad

                                    </label>

                                    <div class="input-group input-group-lg">

                                        <input
                                            type="number"
                                            id="capacity"
                                            name="capacity"
                                            value="{{ old('capacity') }}"
                                            min="1"
                                            class="form-control @error('capacity') is-invalid @enderror"
                                            placeholder="Ej: 30"
                                            style="border-radius: 10px 0 0 10px;"
                                        >

                                        <span class="input-group-text"
                                            style="border-radius: 0 10px 10px 0;">
                                            cupos
                                        </span>

                                    </div>

                                    @error('capacity')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            {{-- PROGRAMA --}}
                            <div class="mb-3">

                                <label for="programa_id" class="form-label fw-semibold">

                                    <i class="bi bi-mortarboard-fill me-2 text-success"></i>

                                    Programa

                                </label>

                                <select
                                    id="programa_id"
                                    name="programa_id"
                                    class="form-select form-select-lg @error('programa_id') is-invalid @enderror"
                                    style="border-radius: 10px;"
                                >

                                    <option value="">
                                        Selecciona un programa
                                    </option>

                                    @foreach ($programas as $programa)

                                        <option
                                            value="{{ $programa->id }}"
                                            {{ old('programa_id') == $programa->id ? 'selected' : '' }}
                                        >
                                            {{ $programa->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('programa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="p-3 mt-4"
                                style="background: #eef8e9; border-radius: 10px;">

                                <div class="d-flex gap-2">

                                    <i class="bi bi-info-circle-fill text-success"></i>

                                    <small>
                                        Verifica que la jornada, capacidad y programa
                                        seleccionados sean correctos antes de guardar.
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="p-4 border-top d-flex justify-content-end gap-2">

                            <a href="{{ route('oferta.index') }}"
                                class="btn btn-light px-4">

                                <i class="bi bi-x-lg me-2"></i>
                                Cancelar

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success px-4"
                                style="background: #39A900; border-color: #39A900;"
                            >

                                <i class="bi bi-check-lg me-2"></i>
                                Guardar oferta

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <div class="text-center mt-4">
            <small class="text-muted">
                Sistema de Administración Académica · SENA
            </small>
        </div>

    </div>
</div>

@endsection