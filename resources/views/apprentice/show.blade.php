@extends('layouts.app')

@section('content')
<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #39A900; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Perfil del Aprendiz</h4>
                        <p class="mb-0 mt-1 small opacity-75">{{ $apprentice['name'] }}</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        
                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Código ID</span>
                            <div class="p-3 bg-light rounded-3 fw-bold text-secondary border-start border-3 border-secondary">
                                #{{ $apprentice['id'] }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Nombre Completo</span>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark">
                                {{ $apprentice['name'] }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Correo Electrónico</span>
                            <div class="p-3 bg-light rounded-3 text-dark">
                                {{ $apprentice['email'] }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Número de Teléfono / Celular</span>
                            <div class="p-3 bg-light rounded-3 text-dark font-monospace">
                                {{ $apprentice['cell_number'] }}
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">ID del Curso</span>
                                <div class="p-3 bg-light rounded-3 fw-bold text-success border-start border-3 border-success">
                                    {{ $apprentice['course_id'] }}
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">ID del Computador</span>
                                <div class="p-3 bg-light rounded-3 fw-bold text-dark border-start border-3 border-dark">
                                    {{ $apprentice['computer_id'] }}
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Fecha de registro</span>
                                <div class="p-2 bg-light rounded-2 small text-secondary">
                                    {{ \Carbon\Carbon::parse($apprentice['created_at'])->format('d/m/Y H:i') }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Última modificación</span>
                                <div class="p-2 bg-light rounded-2 small text-secondary">
                                    {{ \Carbon\Carbon::parse($apprentice['updated_at'])->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-dark px-5 py-2 fw-bold rounded-3 shadow-sm">
                                Volver al Listado
                            </a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection