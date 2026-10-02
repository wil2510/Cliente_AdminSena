@extends('layouts.app')

@section('content')
<div class="container-fluid px-0 bg-light min-vh-100 font-sans">

    {{-- 1. HEADER INSTITUCIONAL / BANNER CORPORATIVO --}}
    <section class="py-5 text-white shadow-sm position-relative overflow-hidden" style="background-color: #198754;">
        <div class="container py-4 position-relative" style="z-index: 2;">
            <div class="row align-items-center gy-4">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="d-inline-flex align-items-center gap-2 bg-white bg-opacity-15 px-3 py-1 rounded-pill mb-3 border border-white border-opacity-25">
                        <i class="bi bi-shield-check text-white"></i>
                        <span class="text-white fw-bold small">Sistema de Gestión Académica Enterprise</span>
                    </div>
                    <h1 class="fw-bold mb-3 display-5 tracking-tight">
                        Plataforma de Administración y Formación Profesional
                    </h1>
                    <p class="text-white-50 mb-4 lead fs-6 mx-auto max-w-2xl">
                        Infraestructura digital para la gestión operativa de programas de formación, infraestructura de laboratorios, cuerpo docente y comunidad estudiantil del Servicio Nacional de Aprendizaje.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('about') }}" class="btn btn-light text-success fw-bold px-4 py-2.5 rounded-3 shadow-sm border-0">
                            <i class="bi bi-building me-1.5"></i> Identidad Institucional
                        </a>
                        <a href="#servicios-clave" class="btn btn-outline-light fw-semibold px-4 py-2.5 rounded-3">
                            Servicios Operativos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">

        {{-- ALERTA DE RESTRICCIÓN DE SESIÓN --}}
        <div id="authAlert" class="alert alert-warning alert-dismissible fade show border-0 shadow-sm rounded-3 d-none mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-shield-lock-fill fs-4 me-3 text-warning"></i>
                <div>
                    <h6 class="fw-bold mb-0">Acceso restringido</h6>
                    <small class="text-secondary">Para consultar o gestionar los registros debe <strong>Iniciar Sesión</strong> con sus credenciales institucionales.</small>
                </div>
            </div>
            <button type="button" class="btn-close" onclick="closeAuthAlert()" aria-label="Close"></button>
        </div>

        {{-- 2. PANEL DE METRICAS OPERATIVAS (KPIs) --}}
        <div class="row g-3 mb-5">
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100 kpi-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 11px;">Capacidad Docente</span>
                        <div class="kpi-icon-box rounded-2">
                            <i class="bi bi-person-workspace text-sena fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">85</h3>
                    <small class="text-success fw-semibold d-flex align-items-center gap-1" style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> Instructores calificados
                    </small>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100 kpi-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 11px;">Matrícula Activa</span>
                        <div class="kpi-icon-box rounded-2">
                            <i class="bi bi-people-fill text-sena fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">1,250</h3>
                    <small class="text-success fw-semibold d-flex align-items-center gap-1" style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> Aprendices vigentes
                    </small>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100 kpi-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 11px;">Oferta Educativa</span>
                        <div class="kpi-icon-box rounded-2">
                            <i class="bi bi-journal-bookmark-fill text-sena fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">42</h3>
                    <small class="text-success fw-semibold d-flex align-items-center gap-1" style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> Fichas en desarrollo
                    </small>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100 kpi-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 11px;">Infraestructura</span>
                        <div class="kpi-icon-box rounded-2">
                            <i class="bi bi-cpu-fill text-sena fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">18</h3>
                    <small class="text-success fw-semibold d-flex align-items-center gap-1" style="font-size: 12px;">
                        <i class="bi bi-check-circle-fill"></i> Ambientes tecnológicos
                    </small>
                </div>
            </div>
        </div>

        {{-- 3. NUEVA SECCIÓN DE NOVEDAD: ESTADO DEL SISTEMA & RECURSOS RÁPIDOS --}}
        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-5 border-start border-4 border-success">
            <div class="row align-items-center gy-3">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-success text-white fw-bold px-2.5 py-1 rounded-2" style="font-size: 10px;">
                            <i class="bi bi-activity me-1"></i> OPERATIVO 100%
                        </span>
                        <span class="text-muted small">Estado de Servicios Académicos</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Centro de Control y Monitoreo Institucional</h5>
                    <p class="text-muted small mb-0">
                        Servidores de bases de datos, asignación de computadores y disponibilidad de ambientes de aprendizaje funcionando en tiempo real sin interrupciones.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('ambiente.index') }}" onclick="protectedRoute(event, '{{ route('ambiente.index') }}')" class="btn btn-outline-success btn-sm fw-bold px-3 py-2 rounded-3">
                        <i class="bi bi-hdd-network me-1"></i> Verificar Ambientes
                    </a>
                </div>
            </div>
        </div>

        {{-- 4. SERVICIOS INSTITUCIONALES / PILARES OPERATIVOS --}}
        <section id="servicios-clave" class="mb-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-2">
                <div>
                    <span class="text-sena fw-bold text-uppercase tracking-wider small">Estructura Operativa</span>
                    <h3 class="fw-bold text-dark mb-0">Gestión de Recursos Académicos</h3>
                </div>
                <p class="text-muted small mb-0 max-w-md">
                    Los módulos de consulta y administración se encuentran centralizados para optimizar los procesos del centro.
                </p>
            </div>

            <div class="row g-4">
                {{-- Tarjeta 1 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100 enterprise-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2.5 rounded-2 bg-sena-subtle text-sena">
                                <i class="bi bi-diagram-3-fill fs-4"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Gestión Curricular</h5>
                        </div>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Supervisión y control de programas académicos, competencias y diseños curriculares aprobados por el SENA.
                        </p>
                        <div class="pt-3 border-top">
                            <a href="{{ route('programa.index') }}" onclick="protectedRoute(event, '{{ route('programa.index') }}')" class="btn-enterprise-link">
                                Consultar Módulo <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tarjeta 2 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100 enterprise-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2.5 rounded-2 bg-sena-subtle text-sena">
                                <i class="bi bi-pc-display-horizontal fs-4"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Ambientes y Equipos</h5>
                        </div>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Inventario técnico de laboratorios, ambientes de aprendizaje, hardware e infraestructura de cómputo.
                        </p>
                        <div class="pt-3 border-top">
                            <a href="{{ route('ambiente.index') }}" onclick="protectedRoute(event, '{{ route('ambiente.index') }}')" class="btn-enterprise-link">
                                Consultar Módulo <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tarjeta 3 --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100 enterprise-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2.5 rounded-2 bg-sena-subtle text-sena">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Comunidad y Planta</h5>
                        </div>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Administración del directorio de instructores, aprendices activos y asignación a fichas de formación.
                        </p>
                        <div class="pt-3 border-top">
                            <a href="{{ route('teacher.index') }}" onclick="protectedRoute(event, '{{ route('teacher.index') }}')" class="btn-enterprise-link">
                                Consultar Módulo <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. BOLETÍN E INFORMACIÓN CORPORATIVA --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                        <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                            <i class="bi bi-newspaper text-sena"></i> Comunicados e Información Institucional
                        </h5>
                        <a href="{{ route('noticia.index') }}" onclick="protectedRoute(event, '{{ route('noticia.index') }}')" class="btn-enterprise-link">
                            Ver todo
                        </a>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="p-3 rounded-2 bg-light border-start border-4 border-success">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="badge bg-sena-subtle text-sena font-semibold" style="font-size: 11px;">Actualización Operativa</span>
                                <small class="text-muted" style="font-size: 12px;">Circular Interna</small>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Lineamientos de Asignación de Ambientes Informáticos</h6>
                            <p class="text-muted small mb-0">
                                Proceso de programación de salas técnicas y mantenimiento preventivo para el período académico actual.
                            </p>
                        </div>

                        <div class="p-3 rounded-2 bg-light border-start border-4 border-success">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="badge bg-sena-subtle text-sena font-semibold" style="font-size: 11px;">Convocatoria Nacional</span>
                                <small class="text-muted" style="font-size: 12px;">Oferta Académica</small>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Apertura de Convocatoria de Formación Titulada</h6>
                            <p class="text-muted small mb-0">
                                Publicación de la nueva oferta de programas técnicos y tecnológicos para la sede principal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="p-2.5 rounded-2 bg-sena-subtle text-sena d-inline-block mb-3">
                            <i class="bi bi-lock-fill fs-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Acceso Administrativo</h5>
                        <p class="text-muted small mb-4">
                            Para realizar modificaciones, registros o consulta detallada de listas, inicie sesión con su usuario institucional.
                        </p>
                    </div>

                    <div class="pt-3 border-top">
                        <a href="{{ route('login') }}" class="btn btn-success w-100 fw-bold py-2.5 rounded-3 shadow-sm" style="background-color: #198754;">
                            <i class="bi bi-box-arrow-in-right me-1.5"></i> Iniciar Sesión Corporativa
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- ESTILOS ENTERPRISE Y PALETA SENA (#198754) --}}
<style>
    /* Utilidades de Color */
    .text-sena {
        color: #198754 !important;
    }

    .bg-sena-subtle {
        background-color: rgba(25, 135, 84, 0.08) !important;
    }

    /* Tipografía y Espaciado */
    .tracking-tight {
        letter-spacing: -0.02em;
    }

    .tracking-wider {
        letter-spacing: 0.05em;
    }

    .max-w-2xl {
        max-width: 42rem;
    }

    .max-w-md {
        max-width: 28rem;
    }

    /* Cajas KPI */
    .kpi-card {
        border-top: 3px solid #198754 !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06) !important;
    }

    .kpi-icon-box {
        width: 36px;
        height: 36px;
        background-color: rgba(25, 135, 84, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Tarjetas Enterprise */
    .enterprise-card {
        border: 1px solid #e9ecef !important;
        transition: all 0.25s ease;
    }

    .enterprise-card:hover {
        border-color: #198754 !important;
        box-shadow: 0 8px 20px rgba(25, 135, 84, 0.08) !important;
    }

    /* Botones y Enlaces */
    .btn-enterprise-link {
        color: #198754;
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .btn-enterprise-link:hover {
        color: #0f5132;
        text-decoration: underline;
    }
</style>

{{-- INTERCEPCIÓN DE RUTAS PROTEGIDAS --}}
<script>
function protectedRoute(event, targetUrl) {
    const userSession = JSON.parse(localStorage.getItem('user_session'));

    if (!userSession) {
        event.preventDefault();

        const alertBox = document.getElementById('authAlert');
        if (alertBox) {
            alertBox.classList.remove('d-none');
            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 1600);
    } else {
        window.location.href = targetUrl;
    }
}

function closeAuthAlert() {
    document.getElementById('authAlert').classList.add('d-none');
}
</script>
@endsection