@extends('layouts.app')

@section('content')

<div style="background: #f6f8f7; min-height: 92vh; padding: 45px 0;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-start gap-3">

                <div style="width: 6px; height: 70px; background: #39A900; border-radius: 10px;"></div>

                <div>
                    <div class="fw-bold text-uppercase"
                        style="color: #39A900; font-size: 13px; letter-spacing: 1px;">
                        Administración Académica
                    </div>

                    <h1 class="fw-bold mb-1">
                        Nueva Ficha
                    </h1>

                    <p class="text-muted mb-0">
                        Registra una nueva ficha de formación en el sistema.
                    </p>
                </div>

            </div>

            <div class="bg-white shadow-sm rounded-3 px-4 py-3 text-center">

                <i class="bi bi-people-fill"
                    style="font-size: 28px; color: #39A900;"></i>

                <div class="small fw-bold text-muted mt-1">
                    FICHAS
                </div>

            </div>

        </div>


        <div class="row g-4">

            {{-- PANEL --}}
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

                        <i class="bi bi-people-fill" style="font-size: 28px;"></i>

                    </div>

                    <h2 class="fw-bold">
                        Crear ficha
                    </h2>

                    <p class="text-white-50" style="line-height: 1.7;">
                        Registra una ficha de formación para organizar
                        aprendices y procesos académicos.
                    </p>

                    <div class="mt-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">01</div>

                            <div>
                                <div class="fw-bold">Identificación</div>
                                <small class="text-white-50">
                                    Ingresa el código de la ficha.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">02</div>

                            <div>
                                <div class="fw-bold">Formación</div>
                                <small class="text-white-50">
                                    Define fecha y jornada.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="fw-bold" style="color: #39A900;">03</div>

                            <div>
                                <div class="fw-bold">Oferta</div>
                                <small class="text-white-50">
                                    Asocia la ficha a una oferta.
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
                                    Información de la ficha
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>
                            </div>

                            <i class="bi bi-three-dots"
                                style="font-size: 24px; color: #6c757d;"></i>

                        </div>

                    </div>


                    <form action="{{ route('ficha.store') }}" method="POST">

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


                            {{-- CÓDIGO --}}
                            <div class="mb-4">

                                <label for="code" class="form-label fw-semibold">

                                    <i class="bi bi-upc-scan me-2 text-success"></i>

                                    Código de ficha

                                </label>

                                <input
                                    type="text"
                                    id="code"
                                    name="code"
                                    value="{{ old('code') }}"
                                    class="form-control form-control-lg @error('code') is-invalid @enderror"
                                    placeholder="Ej: 3223899"
                                    style="border-radius: 10px;"
                                >

                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="row">

                                {{-- FECHA --}}
                                <div class="col-md-6 mb-4">

                                    <label for="start_date" class="form-label fw-semibold">

                                        <i class="bi bi-calendar-event-fill me-2 text-success"></i>

                                        Fecha de inicio

                                    </label>

                                    <input
                                        type="date"
                                        id="start_date"
                                        name="start_date"
                                        value="{{ old('start_date') }}"
                                        class="form-control form-control-lg @error('start_date') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                                {{-- JORNADA --}}
                                <div class="col-md-6 mb-4">

                                    <label for="schedule" class="form-label fw-semibold">

                                        <i class="bi bi-clock-fill me-2 text-success"></i>

                                        Jornada

                                    </label>

                                    <select
                                        id="schedule"
                                        name="schedule"
                                        class="form-select form-select-lg @error('schedule') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona
                                        </option>

                                        <option value="Mañana"
                                            {{ old('schedule') == 'Mañana' ? 'selected' : '' }}>
                                            Mañana
                                        </option>

                                        <option value="Tarde"
                                            {{ old('schedule') == 'Tarde' ? 'selected' : '' }}>
                                            Tarde
                                        </option>

                                        <option value="Noche"
                                            {{ old('schedule') == 'Noche' ? 'selected' : '' }}>
                                            Noche
                                        </option>

                                        <option value="Mixta"
                                            {{ old('schedule') == 'Mixta' ? 'selected' : '' }}>
                                            Mixta
                                        </option>

                                    </select>

                                    @error('schedule')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            {{-- OFERTA --}}
                            <div class="mb-3">

                                <label for="oferta_id" class="form-label fw-semibold">

                                    <i class="bi bi-megaphone-fill me-2 text-success"></i>

                                    Oferta

                                </label>

                                <select
                                    id="oferta_id"
                                    name="oferta_id"
                                    class="form-select form-select-lg @error('oferta_id') is-invalid @enderror"
                                    style="border-radius: 10px;"
                                >

                                    <option value="">
                                        Selecciona una oferta
                                    </option>

                                    @foreach ($ofertas as $oferta)

                                        <option
                                            value="{{ $oferta->id }}"
                                            {{ old('oferta_id') == $oferta->id ? 'selected' : '' }}
                                        >
                                            {{ $oferta->jornada }} -
                                            {{ $oferta->programa->name ?? 'Sin programa' }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('oferta_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="p-3 mt-4"
                                style="background: #eef8e9; border-radius: 10px;">

                                <div class="d-flex gap-2">

                                    <i class="bi bi-info-circle-fill text-success"></i>

                                    <small>
                                        Verifica que el código, jornada y oferta
                                        correspondan a la ficha que deseas registrar.
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="p-4 border-top d-flex justify-content-end gap-2">

                            <a href="{{ route('ficha.index') }}"
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
                                Guardar ficha

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