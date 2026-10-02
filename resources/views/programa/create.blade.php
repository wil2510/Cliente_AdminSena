@extends('layouts.app')

@section('content')

<div
    style="
        background: #f6f8f7;
        min-height: 92vh;
        padding: 45px 0;
    "
>
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
                        Nuevo Programa
                    </h1>

                    <p class="text-muted mb-0">
                        Registra un nuevo programa de formación en el sistema.
                    </p>

                </div>

            </div>

            {{-- BADGE --}}
            <div
                class="bg-white shadow-sm rounded-3 px-4 py-3 text-center"
            >

                <i
                    class="bi bi-mortarboard-fill"
                    style="
                        font-size: 28px;
                        color: #39A900;
                    "
                ></i>

                <div class="small fw-bold text-muted mt-1">
                    PROGRAMAS
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
                            class="bi bi-mortarboard-fill"
                            style="font-size: 28px;"
                        ></i>

                    </div>


                    <h2 class="fw-bold">
                        Crear programa
                    </h2>

                    <p
                        class="text-white-50"
                        style="line-height: 1.7;"
                    >
                        Registra la información principal del programa
                        para mantener organizada la oferta académica del SENA.
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
                                    Información básica
                                </div>

                                <small class="text-white-50">
                                    Nombre y tipo de programa.
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
                                    Formación
                                </div>

                                <small class="text-white-50">
                                    Duración y área relacionada.
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
                                    Descripción
                                </div>

                                <small class="text-white-50">
                                    Detalla las características del programa.
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

                    {{-- CABECERA FORMULARIO --}}
                    <div class="p-4 border-bottom">

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >

                            <div>

                                <h4 class="fw-bold mb-1">
                                    Información del programa
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
                        action="{{ route('programa.store') }}"
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
                                        class="bi bi-card-text me-2 text-success"
                                    ></i>

                                    Nombre del programa

                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Ej: Análisis y Desarrollo de Software"
                                    style="border-radius: 10px;"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- TIPO Y DURACIÓN --}}
                            <div class="row">

                                {{-- TIPO --}}
                                <div class="col-md-6 mb-4">

                                    <label
                                        for="type"
                                        class="form-label fw-semibold"
                                    >

                                        <i
                                            class="bi bi-bookmark-fill me-2 text-success"
                                        ></i>

                                        Tipo

                                    </label>

                                    <select
                                        id="type"
                                        name="type"
                                        class="form-select form-select-lg @error('type') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                        <option value="">
                                            Selecciona
                                        </option>

                                        <option
                                            value="Técnico"
                                            {{ old('type') == 'Técnico' ? 'selected' : '' }}
                                        >
                                            Técnico
                                        </option>

                                        <option
                                            value="Tecnólogo"
                                            {{ old('type') == 'Tecnólogo' ? 'selected' : '' }}
                                        >
                                            Tecnólogo
                                        </option>

                                    </select>

                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- DURACIÓN --}}
                                <div class="col-md-6 mb-4">

                                    <label
                                        for="duration"
                                        class="form-label fw-semibold"
                                    >

                                        <i
                                            class="bi bi-clock-fill me-2 text-success"
                                        ></i>

                                        Duración

                                    </label>

                                    <div class="input-group input-group-lg">

                                        <input
                                            type="number"
                                            id="duration"
                                            name="duration"
                                            value="{{ old('duration') }}"
                                            min="1"
                                            class="form-control @error('duration') is-invalid @enderror"
                                            placeholder="Ej: 27"
                                            style="
                                                border-radius: 10px 0 0 10px;
                                            "
                                        >

                                        <span
                                            class="input-group-text"
                                            style="
                                                border-radius: 0 10px 10px 0;
                                            "
                                        >
                                            meses
                                        </span>

                                    </div>

                                    @error('duration')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            {{-- ÁREA --}}
                            <div class="mb-4">

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

                                    @foreach ($areas as $area)

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


                            {{-- DESCRIPCIÓN --}}
                            <div class="mb-3">

                                <label
                                    for="description"
                                    class="form-label fw-semibold"
                                >

                                    <i
                                        class="bi bi-file-text-fill me-2 text-success"
                                    ></i>

                                    Descripción

                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Describe el programa de formación..."
                                    style="border-radius: 10px;"
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- INFORMACIÓN --}}
                            <div
                                class="p-3 mt-4"
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
                                        Verifica que la información del
                                        programa sea correcta antes de guardarla.
                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- BOTONES --}}
                        <div
                            class="p-4 border-top d-flex justify-content-end gap-2"
                        >

                            <a
                                href="{{ route('programa.index') }}"
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

                                Guardar programa

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