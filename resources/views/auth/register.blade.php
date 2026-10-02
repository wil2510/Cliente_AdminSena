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
                    {{-- FORMULARIO DE REGISTRO - IZQUIERDA --}}
                    {{-- ================================================= --}}

                    <div class="col-sm-10 col-md-8 col-lg-5">

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
                                            class="bi bi-person-plus-fill"
                                            style="font-size: 25px;"
                                        ></i>

                                    </div>


                                    <div
                                        class="small fw-semibold"
                                        style="color: #198754;"
                                    >
                                        REGISTRO
                                    </div>

                                </div>


                                <h2 class="fw-bold mb-2">
                                    Crea tu cuenta
                                </h2>

                                <p class="text-muted mb-0">
                                    Completa tus datos para comenzar a utilizar AdminSena.
                                </p>

                            </div>


                            {{-- FORMULARIO --}}
                            <div class="px-4 pb-4">

                                <form
                                    id="registerPageForm"
                                    onsubmit="executeRegister(event)"
                                >


                                    {{-- NOMBRE --}}
                                    <div class="mb-4">

                                        <label
                                            for="regName"
                                            class="form-label fw-semibold"
                                        >
                                            Nombre completo
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

                                                <i class="bi bi-person-fill"></i>

                                            </span>


                                            <input
                                                type="text"
                                                id="regName"
                                                class="form-control border-start-0 py-3 shadow-none"
                                                placeholder="Ej: María López"
                                                style="
                                                    background: #f8faf9;
                                                    border-color: #dee2e6;
                                                    border-radius: 0 12px 12px 0;
                                                "
                                                required
                                            >

                                        </div>

                                    </div>


                                    {{-- CORREO --}}
                                    <div class="mb-4">

                                        <label
                                            for="regEmail"
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
                                                id="regEmail"
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


                                    {{-- CONTRASEÑAS --}}
                                    <div class="row">


                                        {{-- CONTRASEÑA --}}
                                        <div class="col-md-6 mb-4">

                                            <label
                                                for="regPass"
                                                class="form-label fw-semibold"
                                            >
                                                Contraseña
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

                                                    <i class="bi bi-lock-fill"></i>

                                                </span>


                                                <input
                                                    type="password"
                                                    id="regPass"
                                                    class="form-control border-start-0 py-3 shadow-none"
                                                    placeholder="Contraseña"
                                                    style="
                                                        background: #f8faf9;
                                                        border-color: #dee2e6;
                                                        border-radius: 0 12px 12px 0;
                                                    "
                                                    required
                                                >

                                            </div>

                                        </div>


                                        {{-- CONFIRMAR --}}
                                        <div class="col-md-6 mb-4">

                                            <label
                                                for="regPassConfirm"
                                                class="form-label fw-semibold"
                                            >
                                                Confirmar contraseña
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

                                                    <i class="bi bi-shield-check"></i>

                                                </span>


                                                <input
                                                    type="password"
                                                    id="regPassConfirm"
                                                    class="form-control border-start-0 py-3 shadow-none"
                                                    placeholder="Confirmar"
                                                    style="
                                                        background: #f8faf9;
                                                        border-color: #dee2e6;
                                                        border-radius: 0 12px 12px 0;
                                                    "
                                                    required
                                                >

                                            </div>

                                        </div>

                                    </div>


                                    {{-- INFORMACIÓN --}}
                                    <div
                                        class="d-flex align-items-start gap-2 p-3 mb-4"
                                        style="
                                            background: #eef8f2;
                                            border-radius: 12px;
                                        "
                                    >

                                        <i
                                            class="bi bi-info-circle-fill mt-1"
                                            style="
                                                color: #198754;
                                                font-size: 18px;
                                            "
                                        ></i>

                                        <small class="text-muted">

                                            Tus datos serán utilizados para
                                            identificar tu cuenta dentro de
                                            <strong>AdminSena</strong>.

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
                                                class="bi bi-person-check-fill me-2"
                                            ></i>

                                            Crear mi cuenta

                                        </button>

                                    </div>

                                </form>


                                {{-- DIVISOR --}}
                                <div
                                    class="d-flex align-items-center gap-3 my-4"
                                >

                                    <div class="flex-grow-1 border-top"></div>

                                    <span class="text-muted small">
                                        ¿Ya tienes una cuenta?
                                    </span>

                                    <div class="flex-grow-1 border-top"></div>

                                </div>


                                {{-- LOGIN --}}
                                <div class="text-center">

                                    <a
                                        href="{{ route('login') }}"
                                        class="fw-bold text-decoration-none"
                                        style="color: #198754;"
                                    >

                                        Iniciar Sesión

                                        <i class="bi bi-arrow-right ms-1"></i>

                                    </a>

                                </div>

                            </div>

                        </div>


                        {{-- TEXTO INFERIOR --}}
                        <div class="text-center mt-4">

                            <small class="text-muted">

                                <i
                                    class="bi bi-mortarboard-fill me-1"
                                    style="color: #198754;"
                                ></i>

                                AdminSena · Tu información, nuestra gestión.

                            </small>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PANEL DERECHO --}}
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
                                min-height: 560px;
                                position: relative;
                                overflow: hidden;
                            "
                        >

                            {{-- DECORACIÓN --}}
                            <div
                                style="
                                    position: absolute;
                                    width: 230px;
                                    height: 230px;
                                    border-radius: 50%;
                                    background: rgba(255,255,255,.06);
                                    top: -80px;
                                    left: -90px;
                                "
                            ></div>


                            <div
                                style="
                                    position: absolute;
                                    width: 190px;
                                    height: 190px;
                                    border-radius: 50%;
                                    background: rgba(255,255,255,.05);
                                    bottom: -70px;
                                    right: -60px;
                                "
                            ></div>


                            <div style="position: relative; z-index: 2;">


                                {{-- ICONO --}}
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
                                        class="bi bi-person-plus-fill"
                                        style="font-size: 38px;"
                                    ></i>

                                </div>


                                <div
                                    class="text-uppercase fw-bold mb-2"
                                    style="
                                        font-size: 12px;
                                        letter-spacing: 2px;
                                        color: rgba(255,255,255,.72);
                                    "
                                >
                                    Únete a la plataforma
                                </div>


                                <h1
                                    class="fw-bold mb-3"
                                    style="font-size: 42px;"
                                >
                                    Bienvenido a AdminSena
                                </h1>


                                <p
                                    class="mb-4"
                                    style="
                                        color: rgba(255,255,255,.82);
                                        line-height: 1.8;
                                        font-size: 15px;
                                    "
                                >
                                    Crea tu cuenta y disfruta de una plataforma
                                    pensada para facilitar la gestión de la
                                    información académica.
                                </p>


                                {{-- CARACTERÍSTICAS --}}
                                <div class="mt-4">


                                    {{-- ITEM 1 --}}
                                    <div
                                        class="d-flex align-items-center gap-3 mb-3"
                                    >

                                        <div
                                            class="d-flex align-items-center justify-content-center"
                                            style="
                                                width: 42px;
                                                height: 42px;
                                                background: rgba(255,255,255,.12);
                                                border-radius: 11px;
                                            "
                                        >

                                            <i class="bi bi-person-check-fill"></i>

                                        </div>


                                        <div>

                                            <div class="fw-semibold">
                                                Cuenta personalizada
                                            </div>

                                            <small
                                                style="color: rgba(255,255,255,.65);"
                                            >
                                                Accede con tus propios datos
                                            </small>

                                        </div>

                                    </div>


                                    {{-- ITEM 2 --}}
                                    <div
                                        class="d-flex align-items-center gap-3 mb-3"
                                    >

                                        <div
                                            class="d-flex align-items-center justify-content-center"
                                            style="
                                                width: 42px;
                                                height: 42px;
                                                background: rgba(255,255,255,.12);
                                                border-radius: 11px;
                                            "
                                        >

                                            <i class="bi bi-folder-check"></i>

                                        </div>


                                        <div>

                                            <div class="fw-semibold">
                                                Información organizada
                                            </div>

                                            <small
                                                style="color: rgba(255,255,255,.65);"
                                            >
                                                Administra tus registros fácilmente
                                            </small>

                                        </div>

                                    </div>


                                    {{-- ITEM 3 --}}
                                    <div
                                        class="d-flex align-items-center gap-3"
                                    >

                                        <div
                                            class="d-flex align-items-center justify-content-center"
                                            style="
                                                width: 42px;
                                                height: 42px;
                                                background: rgba(255,255,255,.12);
                                                border-radius: 11px;
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
                                                Tus datos quedan vinculados a tu cuenta
                                            </small>

                                        </div>

                                    </div>

                                </div>


                                {{-- FRASE --}}
                                <div
                                    class="mt-5 pt-4 border-top"
                                    style="border-color: rgba(255,255,255,.2) !important;"
                                >

                                    <p
                                        class="mb-1 fw-semibold"
                                        style="font-size: 15px;"
                                    >
                                        "Tu información, nuestra gestión."
                                    </p>

                                    <small
                                        style="color: rgba(255,255,255,.58);"
                                    >
                                        Sistema de Gestión Académica · SENA
                                    </small>

                                </div>

                            </div>


                            {{-- PIE --}}
                            <div
                                class="position-absolute bottom-0 end-0 p-4"
                                style="
                                    color: rgba(255,255,255,.45);
                                    font-size: 10px;
                                "
                            >

                                AdminSena

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <script>

        function executeRegister(e) {

            e.preventDefault();


            // =====================================================
            // OBTENER DATOS
            // =====================================================

            const name =
                document.getElementById('regName').value.trim();

            const email =
                document.getElementById('regEmail').value.trim();

            const pass =
                document.getElementById('regPass').value;

            const passConfirm =
                document.getElementById('regPassConfirm').value;


            // =====================================================
            // VALIDAR CONTRASEÑAS
            // =====================================================

            if (pass !== passConfirm) {

                alert('Las contraseñas no coinciden');

                return;
            }


            // =====================================================
            // OBTENER USUARIOS
            // =====================================================

            let users =
                JSON.parse(localStorage.getItem('users')) || [];


            // =====================================================
            // VERIFICAR CORREO
            // =====================================================

            const userExists =
                users.find(
                    user => user.email === email
                );


            if (userExists) {

                alert('Este correo ya está registrado');

                return;
            }


            // =====================================================
            // CREAR AVATAR
            // =====================================================

            const avatarUrl =
                `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=198754&color=fff&bold=true`;


            // =====================================================
            // CREAR USUARIO
            // =====================================================

            const newUser = {

                name: name,

                email: email,

                password: pass,

                avatar: avatarUrl

            };

            users.push(newUser);

            localStorage.setItem(
                'users',
                JSON.stringify(users)
            );

            alert('Cuenta creada correctamente');

            window.location.href =
                "{{ route('login') }}";

        }

        </script>

@endsection