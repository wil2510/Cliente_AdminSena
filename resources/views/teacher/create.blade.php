@extends('layouts.app')

@section('content')

<div style="background: #f6f8f7; min-height: 92vh; padding: 45px 0;">
    <div class="container">

        {{-- ENCABEZADO --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-start gap-3">

                <div
                    style="
                        width: 6px;
                        height: 70px;
                        background: #39A900;
                        border-radius: 10px;
                    "
                ></div>

                <div>

                    <div
                        class="fw-bold text-uppercase"
                        style="
                            color: #39A900;
                            font-size: 13px;
                            letter-spacing: 1px;
                        "
                    >
                        Administración Académica
                    </div>

                    <h1 class="fw-bold mb-1">
                        Nuevo Instructor
                    </h1>

                    <p class="text-muted mb-0">
                        Registra un nuevo instructor en el sistema.
                    </p>

                </div>

            </div>


            {{-- BADGE --}}
            <div
                class="bg-white shadow-sm rounded-3 px-4 py-3 text-center"
            >

                <i
                    class="bi bi-person-workspace"
                    style="
                        font-size: 28px;
                        color: #39A900;
                    "
                ></i>

                <div class="small fw-bold text-muted mt-1">
                    INSTRUCTORES
                </div>

            </div>

        </div>


        {{-- CONTENIDO --}}
        <div class="row g-4">

            {{-- PANEL IZQUIERDO --}}
            <div class="col-lg-5">

                <div
                    class="h-100 p-4 p-lg-5 text-white"
                    style="
                        background: linear-gradient(
                            145deg,
                            #17202a 0%,
                            #263746 100%
                        );
                        border-radius: 18px;
                    "
                >

                    {{-- ICONO --}}
                    <div
                        class="d-flex align-items-center justify-content-center mb-4"
                        style="
                            width: 60px;
                            height: 60px;
                            background: #39A900;
                            border-radius: 15px;
                        "
                    >

                        <i
                            class="bi bi-person-workspace"
                            style="font-size: 28px;"
                        ></i>

                    </div>


                    <h2 class="fw-bold">
                        Crear instructor
                    </h2>

                    <p
                        class="text-white-50"
                        style="line-height: 1.7;"
                    >
                        Registra los instructores encargados de acompañar
                        los procesos de formación del SENA.
                    </p>


                    {{-- PASOS --}}
                    <div class="mt-4">

                        {{-- PASO 1 --}}
                        <div class="d-flex gap-3 mb-4">

                            <div
                                class="fw-bold"
                                style="color: #39A900;"
                            >
                                01
                            </div>

                            <div>

                                <div class="fw-bold">
                                    Información personal
                                </div>

                                <small class="text-white-50">
                                    Nombre y correo electrónico.
                                </small>

                            </div>

                        </div>


                        {{-- PASO 2 --}}
                        <div class="d-flex gap-3 mb-4">

                            <div
                                class="fw-bold"
                                style="color: #39A900;"
                            >
                                02
                            </div>

                            <div>

                                <div class="fw-bold">
                                    Área
                                </div>

                                <small class="text-white-50">
                                    Asocia el instructor a un área.
                                </small>

                            </div>

                        </div>


                        {{-- PASO 3 --}}
                        <div class="d-flex gap-3">

                            <div
                                class="fw-bold"
                                style="color: #39A900;"
                            >
                                03
                            </div>

                            <div>

                                <div class="fw-bold">
                                    Centro
                                </div>

                                <small class="text-white-50">
                                    Selecciona su centro de formación.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- PIE DEL PANEL --}}
                    <div
                        class="border-top border-secondary mt-5 pt-4"
                    >

                        <small class="text-white-50">
                            Admin SENA · Gestión académica
                        </small>

                    </div>

                </div>

            </div>


            {{-- FORMULARIO --}}
            <div class="col-lg-7">

                <div
                    class="bg-white shadow-sm h-100"
                    style="border-radius: 18px;"
                >

                    {{-- CABECERA --}}
                    <div class="p-4 border-bottom">

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >

                            <div>

                                <h4 class="fw-bold mb-1">
                                    Información del instructor
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>

                            </div>

                            <i
                                class="bi bi-three-dots"
                                style="
                                    font-size: 24px;
                                    color: #6c757d;
                                "
                            ></i>

                        </div>

                    </div>


                    {{-- FORM --}}
                    <form
                        action="{{ route('teacher.admin') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="p-4">

                            {{-- ERRORES --}}
                            @if ($errors->any())

                                <div
                                    class="alert alert-danger d-flex align-items-start gap-2"
                                >

                                    <i
                                        class="bi bi-exclamation-triangle-fill"
                                    ></i>

                                    <div>

                                        <strong>
                                            Revisa la información:
                                        </strong>

                                        <ul class="mb-0 mt-1">

                                            @foreach ($errors->all() as $error)

                                                <li>
                                                    {{ $error }}
                                                </li>

                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            @endif


                            {{-- NOMBRE --}}
                            <div class="mb-4">

                                <label
                                    for="name"
                                    class="form-label fw-semibold"
                                >

                                    <i
                                        class="bi bi-person-fill me-2 text-success"
                                    ></i>

                                    Nombre completo

                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Ej: Carlos Pérez"
                                    style="border-radius: 10px;"
                                >

                                @error('name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- EMAIL --}}
                            <div class="mb-4">

                                <label
                                    for="email"
                                    class="form-label fw-semibold"
                                >

                                    <i
                                        class="bi bi-envelope-fill me-2 text-success"
                                    ></i>

                                    Correo electrónico

                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="correo@ejemplo.com"
                                    style="border-radius: 10px;"
                                >

                                @error('email')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- ÁREA Y CENTRO --}}
                            <div class="row">

                                {{-- ÁREA --}}
                                <div class="col-md-6 mb-4">

                                    <label
                                        for="area_id"
                                        class="form-label fw-semibold"
                                    >

                                        <i
                                            class="bi bi-diagram-3-fill me-2 text-success"
                                        ></i>

                                        Área

                                    </label>

                                    <select
                                        id="area_id"
                                        name="area_id"
                                        class="form-select form-select-lg @error('area_id') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona un área
                                        </option>

                                        @foreach (($areas ?? []) as $area)

                                            <option
                                                value="{{ $area->id }}"
                                                {{ old('area_id') == $area->id ? 'selected' : '' }}
                                            >
                                                {{ $area->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('area_id')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- CENTRO --}}
                                <div class="col-md-6 mb-4">

                                    <label
                                        for="training_center_id"
                                        class="form-label fw-semibold"
                                    >

                                        <i
                                            class="bi bi-building me-2 text-success"
                                        ></i>

                                        Centro

                                    </label>

                                    <select
                                        id="training_center_id"
                                        name="training_center_id"
                                        class="form-select form-select-lg @error('training_center_id') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona un centro
                                        </option>

                                        @foreach (($trainingCenters ?? []) as $trainingCenter)

                                            <option
                                                value="{{ $trainingCenter->id }}"
                                                {{ old('training_center_id') == $trainingCenter->id ? 'selected' : '' }}
                                            >
                                                {{ $trainingCenter->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('training_center_id')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>


                            {{-- INFORMACIÓN --}}
                            <div
                                class="p-3 mt-2"
                                style="
                                    background: #eef8e9;
                                    border-radius: 10px;
                                "
                            >

                                <div class="d-flex gap-2">

                                    <i
                                        class="bi bi-info-circle-fill text-success"
                                    ></i>

                                    <small>
                                        Verifica los datos del instructor y sus
                                        asociaciones antes de guardarlo.
                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- BOTONES --}}
                        <div
                            class="p-4 border-top d-flex justify-content-end gap-2"
                        >

                            <a
                                href="{{ route('teacher.index') }}"
                                class="btn btn-light px-4"
                            >

                                <i class="bi bi-x-lg me-2"></i>

                                Cancelar

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success px-4"
                                style="
                                    background: #39A900;
                                    border-color: #39A900;
                                "
                            >

                                <i class="bi bi-check-lg me-2"></i>

                                Guardar instructor

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- PIE --}}
        <div class="text-center mt-4">

            <small class="text-muted">
                Sistema de Administración Académica · SENA
            </small>

        </div>

    </div>
</div>

@endsection