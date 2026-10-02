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
                        Nueva Noticia
                    </h1>

                    <p class="text-muted mb-0">
                        Publica una nueva noticia para la comunidad SENA.
                    </p>

                </div>

            </div>

            <div class="bg-white shadow-sm rounded-3 px-4 py-3 text-center">

                <i class="bi bi-newspaper"
                    style="font-size: 28px; color: #39A900;"></i>

                <div class="small fw-bold text-muted mt-1">
                    NOTICIAS
                </div>

            </div>

        </div>


        <div class="row g-4">

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

                        <i class="bi bi-newspaper" style="font-size: 28px;"></i>

                    </div>

                    <h2 class="fw-bold">
                        Crear noticia
                    </h2>

                    <p class="text-white-50" style="line-height: 1.7;">
                        Comparte información importante, novedades y
                        acontecimientos relacionados con la comunidad educativa.
                    </p>


                    <div class="mt-4">

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">01</div>

                            <div>
                                <div class="fw-bold">Contenido</div>
                                <small class="text-white-50">
                                    Define título y contenido de la noticia.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <div class="fw-bold" style="color: #39A900;">02</div>

                            <div>
                                <div class="fw-bold">Publicación</div>
                                <small class="text-white-50">
                                    Establece la fecha de publicación.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="fw-bold" style="color: #39A900;">03</div>

                            <div>
                                <div class="fw-bold">Centro</div>
                                <small class="text-white-50">
                                    Asocia la noticia al centro correspondiente.
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


            <div class="col-lg-7">

                <div class="bg-white shadow-sm h-100" style="border-radius: 18px;">

                    <div class="p-4 border-bottom">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h4 class="fw-bold mb-1">
                                    Información de la noticia
                                </h4>

                                <p class="text-muted mb-0 small">
                                    Completa los datos solicitados.
                                </p>
                            </div>

                            <i class="bi bi-three-dots"
                                style="font-size: 24px; color: #6c757d;"></i>

                        </div>

                    </div>


                    <form
                        action="{{ route('noticia.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

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


                            {{-- TÍTULO --}}
                            <div class="mb-4">

                                <label for="title" class="form-label fw-semibold">

                                    <i class="bi bi-type-h1 me-2 text-success"></i>

                                    Título

                                </label>

                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Ej: Nueva jornada de formación"
                                    style="border-radius: 10px;"
                                >

                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            {{-- CONTENIDO --}}
                            <div class="mb-4">

                                <label for="content" class="form-label fw-semibold">

                                    <i class="bi bi-file-text-fill me-2 text-success"></i>

                                    Contenido

                                </label>

                                <textarea
                                    id="content"
                                    name="content"
                                    rows="5"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Escribe el contenido de la noticia..."
                                    style="border-radius: 10px;"
                                >{{ old('content') }}</textarea>

                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="row">

                                {{-- IMAGEN --}}
                                <div class="col-md-6 mb-4">

                                    <label for="image" class="form-label fw-semibold">

                                        <i class="bi bi-image-fill me-2 text-success"></i>

                                        Imagen

                                    </label>

                                    <input
                                        type="file"
                                        id="image"
                                        name="image"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        class="form-control form-control-lg @error('image') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                    <small class="text-muted">
                                        JPG, JPEG, PNG o WEBP. Máximo 2 MB.
                                    </small>

                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                                {{-- FECHA --}}
                                <div class="col-md-6 mb-4">

                                    <label for="publish_date" class="form-label fw-semibold">

                                        <i class="bi bi-calendar-event-fill me-2 text-success"></i>

                                        Fecha de publicación

                                    </label>

                                    <input
                                        type="date"
                                        id="publish_date"
                                        name="publish_date"
                                        value="{{ old('publish_date') }}"
                                        class="form-control form-control-lg @error('publish_date') is-invalid @enderror"
                                        style="border-radius: 10px;"
                                    >

                                    @error('publish_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            {{-- CENTRO --}}
                            <div class="mb-3">

                                <label for="training_center_id" class="form-label fw-semibold">

                                    <i class="bi bi-building me-2 text-success"></i>

                                    Centro de formación

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

                                    @foreach ($trainingCenters as $trainingCenter)

                                        <option
                                            value="{{ $trainingCenter->id }}"
                                            {{ old('training_center_id') == $trainingCenter->id ? 'selected' : '' }}
                                        >
                                            {{ $trainingCenter->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('training_center_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="p-3 mt-4"
                                style="background: #eef8e9; border-radius: 10px;">

                                <div class="d-flex gap-2">

                                    <i class="bi bi-info-circle-fill text-success"></i>

                                    <small>
                                        Verifica el contenido y la imagen antes
                                        de publicar la noticia.
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="p-4 border-top d-flex justify-content-end gap-2">

                            <a href="{{ route('noticia.index') }}"
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
                                Guardar noticia

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