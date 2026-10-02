@extends('layouts.app')

@section('content')

<div class="py-4">

    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold">
                Detalle de la Noticia
            </h2>

            <p class="text-muted">
                Información completa de la noticia.
            </p>

        </div>

        <div class="card border-0 shadow-sm">

            @if($noticia->image)

                <img src="{{ asset('storage/' . $noticia->image) }}"
                     class="card-img-top"
                     alt="{{ $noticia->title }}"
                     style="max-height: 400px; object-fit: cover;">

            @endif

            <div class="card-body">

                <h2 class="fw-bold mb-3">
                    {{ $noticia->title }}
                </h2>

                <p class="text-muted">
                    Publicado el {{ $noticia->publish_date }}
                </p>

                <hr>

                <p>
                    {{ $noticia->content }}
                </p>

                <hr>

                <p>
                    <strong>
                        Centro de Formación:
                    </strong>

                    {{ $noticia->trainingCenter->name ?? 'Sin centro' }}
                </p>

                <div class="mt-4">

                    <a href="{{ route('noticia.index') }}"
                       class="btn btn-secondary">
                        Volver
                    </a>

                    <a href="{{ route('noticia.edit', $noticia->id) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection