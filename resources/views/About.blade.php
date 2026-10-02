@extends('layouts.app')

@section('content')

<div
    style="
        background:#f5f7f6;
        min-height:92vh;
        padding-bottom:60px;
    "
>
    <section class="container pt-4">
        <div
            class="position-relative overflow-hidden"
            style="
                min-height:350px;
                background:linear-gradient(135deg,#126b45 0%,#198754 55%,#24a566 100%);
                border-radius:0 0 28px 28px;
                box-shadow:0 12px 30px rgba(0,0,0,.10);
            "
        >

            {{-- Decoraciones --}}
            <div
                style="
                    position:absolute;
                    width:260px;
                    height:260px;
                    border:1px solid rgba(255,255,255,.12);
                    border-radius:50%;
                    right:-70px;
                    top:-80px;
                "
            ></div>

            <div
                style="
                    position:absolute;
                    width:180px;
                    height:180px;
                    border:1px solid rgba(255,255,255,.10);
                    border-radius:50%;
                    right:30px;
                    top:-40px;
                "
            ></div>

            <div
                style="
                    position:absolute;
                    width:120px;
                    height:120px;
                    background:rgba(255,255,255,.05);
                    border-radius:50%;
                    left:-45px;
                    bottom:-35px;
                "
            ></div>


            <div
                class="position-relative d-flex align-items-center justify-content-center text-center px-4"
                style="min-height:350px;"
            >

                <div style="max-width:900px;">

                    <div
                        class="d-inline-flex align-items-center px-3 py-2 mb-4"
                        style="
                            background:rgba(255,255,255,.12);
                            border:1px solid rgba(255,255,255,.18);
                            border-radius:30px;
                            color:white;
                            font-size:13px;
                            font-weight:600;
                        "
                    >
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        ADMIN SENA
                    </div>


                    <h1
                        class="fw-bold text-white mb-3"
                        style="
                            font-size:clamp(42px,6vw,68px);
                            letter-spacing:-2px;
                        "
                    >
                        ¿Quiénes Somos?
                    </h1>


                    <p
                        class="text-white mb-0"
                        style="
                            font-size:21px;
                            opacity:.88;
                            letter-spacing:.3px;
                        "
                    >
                        Servicio Nacional de Aprendizaje - SENA
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- PRESENTACIÓN --}}
    {{-- ========================================================= --}}

    <section class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-lg-10 text-center">

                <div
                    class="mb-3 fw-bold text-uppercase"
                    style="
                        color:#198754;
                        font-size:12px;
                        letter-spacing:3px;
                    "
                >
                    Nuestra institución
                </div>


                <h2
                    class="fw-bold mb-4"
                    style="
                        color:#17231d;
                        font-size:38px;
                    "
                >
                    Formando el Futuro de Colombia
                </h2>


                <p
                    class="text-muted mx-auto mb-0"
                    style="
                        max-width:900px;
                        font-size:19px;
                        line-height:1.9;
                    "
                >
                    El SENA es un establecimiento público encargado de invertir
                    en el desarrollo técnico y tecnológico de los trabajadores
                    colombianos, ofreciendo y ejecutando formación profesional
                    integral para la incorporación de las personas en
                    actividades productivas que contribuyan al desarrollo
                    social, económico y tecnológico del país.
                </p>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- TARJETAS --}}
    {{-- ========================================================= --}}

    <section class="container mt-5">

        <div class="row g-4">

            {{-- MISIÓN --}}
            <div class="col-md-4">

                <div
                    class="card border-0 h-100"
                    style="
                        border-radius:20px;
                        box-shadow:0 8px 25px rgba(0,0,0,.06);
                    "
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex align-items-center justify-content-center mb-4"
                            style="
                                width:58px;
                                height:58px;
                                background:#e8f5ee;
                                border-radius:16px;
                            "
                        >
                            <i
                                class="bi bi-bullseye"
                                style="
                                    color:#198754;
                                    font-size:26px;
                                "
                            ></i>
                        </div>


                        <h4 class="fw-bold mb-3">
                            Misión
                        </h4>


                        <p
                            class="text-muted mb-0"
                            style="line-height:1.7;"
                        >
                            Contribuir al desarrollo social y técnico de los
                            trabajadores colombianos mediante procesos de
                            formación profesional integral.
                        </p>

                    </div>

                </div>

            </div>


            {{-- VISIÓN --}}
            <div class="col-md-4">

                <div
                    class="card border-0 h-100"
                    style="
                        border-radius:20px;
                        box-shadow:0 8px 25px rgba(0,0,0,.06);
                    "
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex align-items-center justify-content-center mb-4"
                            style="
                                width:58px;
                                height:58px;
                                background:#e8f5ee;
                                border-radius:16px;
                            "
                        >
                            <i
                                class="bi bi-eye-fill"
                                style="
                                    color:#198754;
                                    font-size:26px;
                                "
                            ></i>
                        </div>


                        <h4 class="fw-bold mb-3">
                            Visión
                        </h4>


                        <p
                            class="text-muted mb-0"
                            style="line-height:1.7;"
                        >
                            Impulsar una formación que permita a los aprendices
                            desarrollar sus capacidades y aportar al crecimiento
                            productivo del país.
                        </p>

                    </div>

                </div>

            </div>


            {{-- FORMACIÓN --}}
            <div class="col-md-4">

                <div
                    class="card border-0 h-100"
                    style="
                        border-radius:20px;
                        box-shadow:0 8px 25px rgba(0,0,0,.06);
                    "
                >

                    <div class="card-body p-4">

                        <div
                            class="d-flex align-items-center justify-content-center mb-4"
                            style="
                                width:58px;
                                height:58px;
                                background:#e8f5ee;
                                border-radius:16px;
                            "
                        >
                            <i
                                class="bi bi-laptop-fill"
                                style="
                                    color:#198754;
                                    font-size:26px;
                                "
                            ></i>
                        </div>


                        <h4 class="fw-bold mb-3">
                            Formación
                        </h4>


                        <p
                            class="text-muted mb-0"
                            style="line-height:1.7;"
                        >
                            El SENA ofrece diferentes alternativas de formación
                            orientadas al desarrollo de conocimientos, habilidades
                            y competencias para el mundo laboral.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- BLOQUE DESTACADO --}}
    {{-- ========================================================= --}}

    <section class="container mt-5">

        <div
            class="overflow-hidden"
            style="
                background:#17231d;
                border-radius:24px;
                box-shadow:0 12px 30px rgba(0,0,0,.10);
            "
        >

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <div class="p-4 p-lg-5">

                        <div
                            class="d-inline-flex align-items-center px-3 py-2 mb-3"
                            style="
                                background:rgba(25,135,84,.20);
                                border-radius:30px;
                                color:#73d49f;
                                font-size:12px;
                                font-weight:600;
                            "
                        >
                            <i class="bi bi-stars me-2"></i>
                            COMPROMISO CON COLOMBIA
                        </div>


                        <h3
                            class="text-white fw-bold mb-3"
                            style="font-size:30px;"
                        >
                            Educación que transforma
                        </h3>


                        <p
                            class="mb-0"
                            style="
                                color:rgba(255,255,255,.70);
                                line-height:1.8;
                                font-size:16px;
                            "
                        >
                            La formación profesional busca fortalecer las
                            capacidades de las personas y generar oportunidades
                            para su desarrollo personal, académico y productivo.
                        </p>

                    </div>

                </div>


                <div class="col-lg-5">

                    <div
                        class="d-flex justify-content-center align-items-center p-5"
                        style="min-height:260px;"
                    >

                        <div
                            class="d-flex align-items-center justify-content-center"
                            style="
                                width:150px;
                                height:150px;
                                border-radius:45px;
                                background:#198754;
                                transform:rotate(5deg);
                                box-shadow:0 15px 35px rgba(0,0,0,.25);
                            "
                        >

                            <i
                                class="bi bi-lightbulb-fill text-white"
                                style="
                                    font-size:70px;
                                    transform:rotate(-5deg);
                                "
                            ></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- VALORES --}}
    {{-- ========================================================= --}}

    <section class="container mt-5">

        <div class="text-center mb-4">

            <div
                class="text-uppercase fw-bold mb-2"
                style="
                    color:#198754;
                    font-size:11px;
                    letter-spacing:2px;
                "
            >
                Lo que nos representa
            </div>

            <h3
                class="fw-bold"
                style="color:#17231d;"
            >
                Valores que impulsan nuestra formación
            </h3>

        </div>


        <div class="row g-3">

            <div class="col-6 col-lg-3">

                <div
                    class="bg-white p-4 text-center h-100"
                    style="
                        border-radius:16px;
                        box-shadow:0 5px 18px rgba(0,0,0,.05);
                    "
                >

                    <i
                        class="bi bi-people-fill"
                        style="
                            color:#198754;
                            font-size:30px;
                        "
                    ></i>

                    <h6 class="fw-bold mt-3 mb-1">
                        Inclusión
                    </h6>

                    <small class="text-muted">
                        Oportunidades para todos
                    </small>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div
                    class="bg-white p-4 text-center h-100"
                    style="
                        border-radius:16px;
                        box-shadow:0 5px 18px rgba(0,0,0,.05);
                    "
                >

                    <i
                        class="bi bi-lightning-charge-fill"
                        style="
                            color:#198754;
                            font-size:30px;
                        "
                    ></i>

                    <h6 class="fw-bold mt-3 mb-1">
                        Innovación
                    </h6>

                    <small class="text-muted">
                        Pensamiento y tecnología
                    </small>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div
                    class="bg-white p-4 text-center h-100"
                    style="
                        border-radius:16px;
                        box-shadow:0 5px 18px rgba(0,0,0,.05);
                    "
                >

                    <i
                        class="bi bi-award-fill"
                        style="
                            color:#198754;
                            font-size:30px;
                        "
                    ></i>

                    <h6 class="fw-bold mt-3 mb-1">
                        Calidad
                    </h6>

                    <small class="text-muted">
                        Formación integral
                    </small>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div
                    class="bg-white p-4 text-center h-100"
                    style="
                        border-radius:16px;
                        box-shadow:0 5px 18px rgba(0,0,0,.05);
                    "
                >

                    <i
                        class="bi bi-graph-up-arrow"
                        style="
                            color:#198754;
                            font-size:30px;
                        "
                    ></i>

                    <h6 class="fw-bold mt-3 mb-1">
                        Desarrollo
                    </h6>

                    <small class="text-muted">
                        Crecimiento del país
                    </small>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- CIERRE --}}
    {{-- ========================================================= --}}

    <section class="container mt-5">

        <div
            class="text-center"
            style="
                padding:35px;
                background:#e8f5ee;
                border-radius:20px;
            "
        >

            <i
                class="bi bi-mortarboard-fill"
                style="
                    color:#198754;
                    font-size:32px;
                "
            ></i>


            <h4
                class="fw-bold mt-3 mb-2"
                style="color:#17231d;"
            >
                Construyendo oportunidades a través de la formación
            </h4>


            <p
                class="text-muted mb-0"
                style="max-width:700px; margin:auto;"
            >
                Admin SENA integra herramientas para facilitar la gestión
                académica y contribuir a una mejor experiencia para aprendices,
                instructores y administradores.
            </p>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- PIE DE PÁGINA --}}
    {{-- ========================================================= --}}

    <div class="container">

        <div class="text-center mt-5">

            <small class="text-muted">

                <i
                    class="bi bi-shield-check me-1"
                    style="color:#198754;"
                ></i>

                Sistema de Administración Académica · SENA

            </small>

        </div>

    </div>

</div>
@endsection