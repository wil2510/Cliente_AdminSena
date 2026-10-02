<nav
    class="navbar navbar-expand-lg navbar-dark shadow-sm"
    style="
        background-color: #198754;
        padding: 10px 20px;
    "
>
    <div class="container-fluid">

        {{-- LOGO + NOMBRE --}}
        <a
            href="{{ route('home') }}"
            class="navbar-brand d-flex align-items-center gap-3 fw-bold"
        >
            <div
                class="d-flex align-items-center justify-content-center"
                style="
                    width: 48px;
                    height: 48px;
                    background: rgba(255,255,255,.15);
                    border: 1px solid rgba(255,255,255,.3);
                    border-radius: 12px;
                "
            >
                <img
                    src="https://diba.planeacionycalidad.org/diba/Views/representante/logo-blanco-sena-sin-fondo.png"
                    alt="Logo SENA"
                    style="
                        width: 38px;
                        height: 32px;
                        object-fit: contain;
                    "
                >
            </div>

            <div class="d-flex flex-column">
                <span
                    class="text-white fw-bold"
                    style="
                        font-size: 19px;
                        line-height: 1;
                    "
                >
                    AdminSena
                </span>

                <small
                    style="
                        color: rgba(255,255,255,.75);
                        font-size: 10px;
                    "
                >
                    Gestión Académica
                </small>
            </div>
        </a>

        {{-- BOTÓN MÓVIL --}}
        <button
            class="navbar-toggler shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#adminNavbar"
            aria-controls="adminNavbar"
            aria-expanded="false"
            aria-label="Mostrar menú"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- CONTENIDO DEL NAVBAR --}}
        <div
            class="collapse navbar-collapse"
            id="adminNavbar"
        >
            <ul
                class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0"
            >

                {{-- QUIÉNES SOMOS (PÚBLICO) --}}
                <li class="nav-item">
                    <a
                        href="{{ route('about') }}"
                        class="nav-link text-white fw-semibold px-3 py-2 rounded-pill"
                    >
                        <i class="bi bi-info-circle-fill me-1"></i>
                        ¿Quiénes Somos?
                    </a>
                </li>

                {{-- ADMINISTRACIÓN (SOLO SESIÓN INICIADA) --}}
                <li class="nav-item dropdown" id="navAdmin" style="display: none;">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle text-white fw-semibold px-3 py-2 rounded-pill"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="bi bi-grid-1x2-fill me-1"></i>
                        Administración
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                        <li>
                            <h6 class="dropdown-header fw-bold" style="color: #198754;">
                                Gestión principal
                            </h6>
                        </li>
                        <li>
                            <a href="{{ route('area.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-diagram-3-fill me-2" style="color: #198754;"></i>
                                Área
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('trainingcenter.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-building-fill me-2" style="color: #198754;"></i>
                                Centro
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('computer.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-pc-display me-2" style="color: #198754;"></i>
                                Equipos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('course.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-journal-bookmark-fill me-2" style="color: #198754;"></i>
                                Cursos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-person-workspace me-2" style="color: #198754;"></i>
                                Instructores
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('apprentice.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-person-badge-fill me-2" style="color: #198754;"></i>
                                Aprendices
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <h6 class="dropdown-header fw-bold" style="color: #198754;">
                                Módulos académicos
                            </h6>
                        </li>
                        <li>
                            <a href="{{ route('programa.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-mortarboard-fill me-2" style="color: #198754;"></i>
                                Programas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('oferta.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-megaphone-fill me-2" style="color: #198754;"></i>
                                Ofertas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ficha.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-people-fill me-2" style="color: #198754;"></i>
                                Fichas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ambiente.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-house-gear-fill me-2" style="color: #198754;"></i>
                                Ambientes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('noticia.create') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-newspaper me-2" style="color: #198754;"></i>
                                Noticias
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- VER LISTAS (SOLO SESIÓN INICIADA) --}}
                <li class="nav-item dropdown" id="navListas" style="display: none;">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle text-white fw-semibold px-3 py-2 rounded-pill"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="bi bi-list-ul me-1"></i>
                        Ver Listas
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                        <li>
                            <h6 class="dropdown-header fw-bold" style="color: #198754;">
                                Registros
                            </h6>
                        </li>
                        <li>
                            <a href="{{ route('area.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-diagram-3-fill me-2" style="color: #198754;"></i>
                                Áreas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('trainingcenter.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-building-fill me-2" style="color: #198754;"></i>
                                Centros
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('computer.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-pc-display me-2" style="color: #198754;"></i>
                                Equipos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('course.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-journal-bookmark-fill me-2" style="color: #198754;"></i>
                                Cursos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-person-workspace me-2" style="color: #198754;"></i>
                                Instructores
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('apprentice.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-person-badge-fill me-2" style="color: #198754;"></i>
                                Aprendices
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="{{ route('programa.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-mortarboard-fill me-2" style="color: #198754;"></i>
                                Programas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('oferta.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-megaphone-fill me-2" style="color: #198754;"></i>
                                Ofertas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ficha.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-people-fill me-2" style="color: #198754;"></i>
                                Fichas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ambiente.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-house-gear-fill me-2" style="color: #198754;"></i>
                                Ambientes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('noticia.index') }}" class="dropdown-item rounded-3 py-2">
                                <i class="bi bi-newspaper me-2" style="color: #198754;"></i>
                                Noticias
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- BUSCADOR (SOLO SESIÓN INICIADA) --}}
                <li class="nav-item ms-lg-2" id="navSearch" style="display: none;">
                    <form class="d-flex" role="search">
                        <div class="input-group" style="width: 220px;">
                            <span
                                class="input-group-text border-0"
                                style="
                                    background: rgba(0,0,0,.15);
                                    color: white;
                                "
                            >
                                <i class="bi bi-search"></i>
                            </span>
                            <input
                                type="search"
                                class="form-control border-0 shadow-none text-white"
                                placeholder="Buscar registros"
                                aria-label="Buscar"
                                style="
                                    background: rgba(0,0,0,.15);
                                    color: white;
                                "
                            >
                        </div>
                    </form>
                </li>

                {{-- CONTENEDOR DE AUTENTICACIÓN --}}
                <li class="nav-item ms-lg-2" id="authContainer">
                    <!-- JavaScript insertará la información del usuario o el botón Login -->
                </li>

            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    checkAuthStatus();
});

function checkAuthStatus() {
    const userSession = JSON.parse(localStorage.getItem('user_session'));
    const authContainer = document.getElementById('authContainer');
    
    // Elementos condicionales
    const navAdmin = document.getElementById('navAdmin');
    const navListas = document.getElementById('navListas');
    const navSearch = document.getElementById('navSearch');

    if (userSession) {
        // MOSTRAR MENÚS PRIVADOS
        navAdmin.style.display = 'block';
        navListas.style.display = 'block';
        navSearch.style.display = 'block';

        // COMPONENTE DE USUARIO AUTENTICADO
        authContainer.innerHTML = `
            <div class="dropdown">
                <a
                    href="#"
                    class="d-flex align-items-center text-white text-decoration-none"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img
                        src="${userSession.avatar || 'https://via.placeholder.com/40'}"
                        alt="${userSession.name}"
                        width="40"
                        height="40"
                        style="
                            object-fit: cover;
                            border-radius: 50%;
                            border: 2px solid white;
                        "
                    >
                    <div class="d-none d-xl-flex flex-column ms-2">
                        <span class="fw-bold" style="font-size: 13px;">
                            ${userSession.name}
                        </span>
                        <small style="color: rgba(255,255,255,.75); font-size: 10px;">
                            Usuario
                        </small>
                    </div>
                    <i class="bi bi-chevron-down ms-2"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-2 p-2">
                    <li>
                        <div class="px-3 py-2 border-bottom">
                            <p class="fw-bold mb-0 text-dark small">${userSession.name}</p>
                            <small class="text-muted">${userSession.email}</small>
                        </div>
                    </li>
                    <li>
                        <button
                            onclick="logout()"
                            class="dropdown-item text-danger fw-bold py-2 rounded-3"
                        >
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Cerrar Sesión
                        </button>
                    </li>
                </ul>
            </div>
        `;
    } else {

        navAdmin.style.display = 'none';
        navListas.style.display = 'none';
        navSearch.style.display = 'none';

        // BOTÓN INICIAR SESIÓN
        authContainer.innerHTML = `
            <a
                href="{{ route('login') }}"
                class="btn btn-light text-success fw-bold px-3 rounded-pill shadow-sm d-flex align-items-center gap-2"
            >
                <i class="bi bi-person-circle"></i>
                Iniciar Sesión
            </a>
        `;
    }
}

// Función de ejemplo para cerrar sesión
function logout() {
    localStorage.removeItem('user_session');
    checkAuthStatus(); // Recargar el estado del menú
}
</script>