@extends('layouts.app')

@section('content')
<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #39A900; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Detalle del Equipo</h4>
                        <p class="mb-0 mt-1 small opacity-75">Equipo N° {{ $computer['number'] }}</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        
                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">ID de Sistema</span>
                            <div class="p-3 bg-light rounded-3 fw-bold text-secondary border-start border-3 border-secondary">
                                #{{ $computer['id'] }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Número de Computador</span>
                            <div class="p-3 bg-light rounded-3 fw-bold text-dark fs-5">
                                {{ $computer['number'] }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Fabricante / Marca</span>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark">
                                {{ $computer['brand'] }}
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Fecha de registro</span>
                                <div class="p-2 bg-light rounded-2 small text-secondary">
                                    {{ \Carbon\Carbon::parse($computer['created_at'])->format('d/m/Y H:i') }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted small d-block mb-1 fw-bold text-uppercase tracking-wider">Última modificación</span>
                                <div class="p-2 bg-light rounded-2 small text-secondary">
                                    {{ \Carbon\Carbon::parse($computer['updated_at'])->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-dark px-4 py-2 fw-bold rounded-3">
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