@extends('layouts.app')

@section('content')

<div
    style="
        min-height: 92vh;
        background: #f5f7f6;
        display: flex;
        align-items: center;
        padding: 45px 15px;
    "
>

    <div class="container">

        <div class="row justify-content-center align-items-center g-5">


            {{-- ================================================= --}}
            {{-- PANEL IZQUIERDO --}}
            {{-- ================================================= --}}

            <div class="col-lg-5 d-none d-lg-block">

                <div
                    class="text-white p-5 shadow-lg"
                    style="
                        background: linear-gradient(
                            145deg,
                            #198754 0%,
                            #126b42 100%
                        );
                        border-radius: 28px;
                        min-height: 500px;
                        position: relative;
                        overflow: hidden;
                    "
                >

                    {{-- DECORACIÓN --}}
                    <div
                        style="
                            position: absolute;
                            width: 220px;
                            height: 220px;
                            border-radius: 50%;
                            background: rgba(255,255,255,.06);
                            top: -90px;
                            right: -80px;
                        "
                    ></div>

                    <div
                        style="
                            position: absolute;
                            width: 180px;
                            height: 180px;
                            border-radius: 50%;
                            background: rgba(255,255,255,.05);
                            bottom: -70px;
                            left: -60px;
                        "
                    ></div>


                    {{-- LOGO --}}
                    <div
                        class="d-flex align-items-center justify-content-center mb-4"
                        style="
                            width: 75px;
                            height: 75px;
                            background: rgba(255,255,255,.14);
                            border: 1px solid rgba(255,255,255,.25);
                            border-radius: 20px;
                        "
                    >

                        <i
                            class="bi bi-mortarboard-fill"
                            style="font-size: 38px;"
                        ></i>

                    </div>


                    <div style="position: relative; z-index: 2;">

                        <div
                            class="text-uppercase fw-bold mb-2"
                            style="
                                font-size: 12px;
                                letter-spacing: 2px;
                                color: rgba(255,255,255,.72);
                            "
                        >
                            Plataforma académica
                        </div>


                        <h1
                            class="fw-bold mb-3"
                            style="font-size: 42px;"
                        >
                            AdminSena
                        </h1>


                        <p
                            class="mb-4"
                            style="
                                color: rgba(255,255,255,.82);
                                line-height: 1.8;
                                font-size: 15px;
                            "
                        >
                            Administra de manera sencilla y organizada
                            la información académica del SENA desde
                            una sola plataforma.
                        </p>


                        {{-- CARACTERÍSTICAS --}}
                        <div class="mt-4">

                            <div class="d-flex align-items-center gap-3 mb-3">

                                <div
                                    class="d-flex align-items-center justify-content-center"
                                    style="
                                        width: 38px;
                                        height: 38px;
                                        background: rgba(255,255,255,.12);
                                        border-radius: 10px;
                                    "
                                >

                                    <i class="bi bi-shield-check"></i>

                                </div>

                                <div>

                                    <div class="fw-semibold">
                                        Acceso seguro
                                    </div>

                                    <small
                                        style="color: rgba(255,255,255,.65);"
                                    >
                                        Protege tus datos de acceso
                                    </small>

                                </div>

                            </div>


                            <div class="d-flex align-items-center gap-3 mb-3">

                                <div
                                    class="d-flex align-items-center justify-content-center"
                                    style="
                                        width: 38px;
                                        height: 38px;
                                        background: rgba(255,255,255,.12);
                                        border-radius: 10px;
                                    "
                                >

                                    <i class="bi bi-grid-1x2-fill"></i>

                                </div>

                                <div>

                                    <div class="fw-semibold">
                                        Gestión centralizada
                                    </div>

                                    <small
                                        style="color: rgba(255,255,255,.65);"
                                    >
                                        Administra tus registros fácilmente
                                    </small>

                                </div>

                            </div>


                            <div class="d-flex align-items-center gap-3">

                                <div
                                    class="d-flex align-items-center justify-content-center"
                                    style="
                                        width: 38px;
                                        height: 38px;
                                        background: rgba(255,255,255,.12);
                                        border-radius: 10px;
                                    "
                                >

                                    <i class="bi bi-lightning-charge-fill"></i>

                                </div>

                                <div>

                                    <div class="fw-semibold">
                                        Rápido y práctico
                                    </div>

                                    <small
                                        style="color: rgba(255,255,255,.65);"
                                    >
                                        Todo lo académico en un solo lugar
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- PIE --}}
                    <div
                        class="position-absolute bottom-0 start-0 p-4"
                        style="
                            color: rgba(255,255,255,.55);
                            font-size: 11px;
                        "
                    >

                        SENA · Gestión Académica

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- LOGIN --}}
            {{-- ================================================= --}}

            <div class="col-sm-10 col-md-7 col-lg-5">

                <div
                    class="bg-white shadow-lg"
                    style="
                        border-radius: 24px;
                        overflow: hidden;
                    "
                >

                    {{-- CABECERA --}}
                    <div class="p-4 pb-3">

                        <div
                            class="d-flex align-items-center justify-content-between mb-4"
                        >

                            <div
                                class="d-flex align-items-center justify-content-center"
                                style="
                                    width: 52px;
                                    height: 52px;
                                    background: #eaf6ef;
                                    color: #198754;
                                    border-radius: 14px;
                                "
                            >

                                <i
                                    class="bi bi-person-lock"
                                    style="font-size: 25px;"
                                ></i>

                            </div>


                            <div
                                class="small fw-semibold"
                                style="color: #198754;"
                            >
                                ACCESO
                            </div>

                        </div>


                        <h2 class="fw-bold mb-2">
                            Bienvenido de nuevo
                        </h2>

                        <p class="text-muted mb-0">
                            Ingresa tus datos para acceder a AdminSena.
                        </p>

                    </div>


                    {{-- FORMULARIO --}}
                    <div class="px-4 pb-4">

                        <form onsubmit="executeLogin(event)">


                            {{-- CORREO --}}
                            <div class="mb-4">

                                <label
                                    for="loginEmail"
                                    class="form-label fw-semibold"
                                >

                                    Correo electrónico

                                </label>


                                <div class="input-group">

                                    <span
                                        class="input-group-text border-end-0"
                                        style="
                                            background: #f8faf9;
                                            border-color: #dee2e6;
                                            color: #198754;
                                            border-radius: 12px 0 0 12px;
                                        "
                                    >

                                        <i class="bi bi-envelope-fill"></i>

                                    </span>


                                    <input
                                        type="email"
                                        id="loginEmail"
                                        class="form-control border-start-0 py-3 shadow-none"
                                        placeholder="ejemplo@sena.edu.co"
                                        style="
                                            background: #f8faf9;
                                            border-color: #dee2e6;
                                            border-radius: 0 12px 12px 0;
                                        "
                                        required
                                    >

                                </div>

                            </div>


                            {{-- CONTRASEÑA --}}
                            <div class="mb-4">

                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >

                                    <label
                                        for="loginPassword"
                                        class="form-label fw-semibold mb-2"
                                    >
                                        Contraseña
                                    </label>

                                </div>


                                <div class="input-group">

                                    <span
                                        class="input-group-text border-end-0"
                                        style="
                                            background: #f8faf9;
                                            border-color: #dee2e6;
                                            color: #198754;
                                            border-radius: 12px 0 0 12px;
                                        "
                                    >

                                        <i class="bi bi-lock-fill"></i>

                                    </span>


                                    <input
                                        type="password"
                                        id="loginPassword"
                                        class="form-control border-start-0 py-3 shadow-none"
                                        placeholder="Ingresa tu contraseña"
                                        style="
                                            background: #f8faf9;
                                            border-color: #dee2e6;
                                        "
                                        required
                                    >


                                    <button
                                        type="button"
                                        onclick="togglePassword()"
                                        class="btn border border-start-0"
                                        style="
                                            background: #f8faf9;
                                            border-color: #dee2e6 !important;
                                            color: #198754;
                                            border-radius: 0 12px 12px 0;
                                        "
                                    >

                                        <i
                                            id="passwordIcon"
                                            class="bi bi-eye-fill"
                                        ></i>

                                    </button>

                                </div>

                            </div>


                            {{-- RECORDATORIO --}}
                            <div
                                class="d-flex align-items-center gap-2 mb-4"
                            >

                                <i
                                    class="bi bi-shield-check"
                                    style="color: #198754;"
                                ></i>

                                <small class="text-muted">
                                    Tus datos serán utilizados únicamente
                                    para el acceso al sistema.
                                </small>

                            </div>


                            {{-- BOTÓN --}}
                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn text-white fw-bold py-3 shadow-sm"
                                    style="
                                        background-color: #198754;
                                        border-color: #198754;
                                        border-radius: 12px;
                                    "
                                >

                                    <i
                                        class="bi bi-box-arrow-in-right me-2"
                                    ></i>

                                    Iniciar Sesión

                                </button>

                            </div>

                        </form>


                        {{-- DIVISOR --}}
                        <div
                            class="d-flex align-items-center gap-3 my-4"
                        >

                            <div class="flex-grow-1 border-top"></div>

                            <span
                                class="text-muted small"
                            >
                                ¿Nuevo en AdminSena?
                            </span>

                            <div class="flex-grow-1 border-top"></div>

                        </div>


                        {{-- REGISTRO --}}
                        <div class="text-center">

                            <a
                                href="{{ route('register') }}"
                                class="fw-bold text-decoration-none"
                                style="color: #198754;"
                            >

                                Crear una cuenta

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>

                    </div>

                </div>


                {{-- TEXTO INFERIOR --}}
                <div class="text-center mt-4">

                    <small class="text-muted">

                        <i
                            class="bi bi-shield-check me-1"
                            style="color: #198754;"
                        ></i>

                        AdminSena · Sistema de Gestión Académica

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

function executeLogin(e) {

    e.preventDefault();


    // =====================================================
    // DATOS DEL FORMULARIO
    // =====================================================

    const email =
        document.getElementById('loginEmail').value.trim();

    const password =
        document.getElementById('loginPassword').value;


    // =====================================================
    // USUARIOS REGISTRADOS
    // =====================================================

    const users =
        JSON.parse(localStorage.getItem('users')) || [];


    // =====================================================
    // BUSCAR USUARIO
    // =====================================================

    const user =
        users.find(
            u =>
                u.email === email &&
                u.password === password
        );


    // =====================================================
    // USUARIO NO ENCONTRADO
    // =====================================================

    if (!user) {

        alert('Correo o contraseña incorrectos');

        return;

    }


    // =====================================================
    // GUARDAR SESIÓN
    // =====================================================

    localStorage.setItem(
        'user_session',
        JSON.stringify({
            name: user.name,
            email: user.email,
            avatar: user.avatar
        })
    );


    // =====================================================
    // MENSAJE
    // =====================================================

    alert('Inicio de sesión correcto');


    // =====================================================
    // IR AL INICIO
    // =====================================================

    window.location.href = "{{ url('/') }}";

}


// =========================================================
// MOSTRAR / OCULTAR CONTRASEÑA
// =========================================================

function togglePassword() {

    const password =
        document.getElementById('loginPassword');

    const icon =
        document.getElementById('passwordIcon');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye-fill');

        icon.classList.add('bi-eye-slash-fill');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash-fill');

        icon.classList.add('bi-eye-fill');

    }

}

</script>

@endsection