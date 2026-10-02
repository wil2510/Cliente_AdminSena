@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold">
                Editar Noticia
            </h2>

            <p class="text-muted">
                Actualiza la información de la noticia.
            </p>

        </div>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <form action="{{ route('noticia.update', $noticia->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Título
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title', $noticia->title) }}"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Contenido
                        </label>

                        <textarea name="content"
                                  class="form-control"
                                  rows="6"
                                  required>{{ old('content', $noticia->content) }}</textarea>

                    </div>

                    @if($noticia->image)

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Imagen actual
                            </label>

                            <br>

                            <img src="{{ asset('storage/' . $noticia->image) }}"
                                 alt="{{ $noticia->title }}"
                                 width="200"
                                 style="border-radius: 10px;">

                        </div>

                    @endif

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Cambiar imagen
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">

                        <small class="text-muted">
                            Déjalo vacío si quieres conservar la imagen actual.
                        </small>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Fecha de publicación
                        </label>

                        <input type="date"
                               name="publish_date"
                               class="form-control"
                               value="{{ old('publish_date', $noticia->publish_date) }}"
                               required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Centro de Formación
                        </label>

                        <select name="training_center_id"
                                class="form-select"
                                required>

                            @foreach($trainingCenters as $trainingCenter)

                                <option value="{{ $trainingCenter->id }}"
                                    {{ $noticia->training_center_id == $trainingCenter->id ? 'selected' : '' }}>

                                    {{ $trainingCenter->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <a href="{{ route('noticia.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="btn btn-success">
                        Actualizar Noticia
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection