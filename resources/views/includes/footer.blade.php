<footer class="mt-5 text-white"
    style="
        background: linear-gradient(135deg, #151515 0%, #202020 100%);
        border-top: 4px solid #39A900;
    ">

    <div class="container py-5">

        <div class="row align-items-center gy-4">

            {{-- ================================================= --}}
            {{-- INFORMACIÓN DEL PROYECTO --}}
            {{-- ================================================= --}}
            <div class="col-md-6 text-center text-md-start">

                <div class="d-flex flex-column align-items-center align-items-md-start">

                    <div class="d-flex align-items-center mb-3">

                        <div
                            class="d-flex align-items-center justify-content-center me-3"
                            style="
                                width: 46px;
                                height: 46px;
                                background-color: #39A900;
                                border-radius: 12px;
                            "
                        >

                            <i
                                class="bi bi-mortarboard-fill text-white"
                                style="font-size: 24px;"
                            ></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-0 text-white">
                                Administración Académica
                            </h5>

                            <small class="text-white-50">
                                Plataforma de gestión SENA
                            </small>

                        </div>

                    </div>


                    <p
                        class="text-white-50 mb-3"
                        style="max-width: 480px;"
                    >
                        Una plataforma diseñada para facilitar la gestión
                        de la información académica, permitiendo administrar
                        de manera organizada los procesos del SENA.
                    </p>


                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2">

                        <span
                            class="px-3 py-2 rounded-pill"
                            style="
                                background-color: rgba(57,169,0,.15);
                                border: 1px solid rgba(57,169,0,.35);
                            "
                        >

                            <i
                                class="bi bi-person-fill me-1"
                                style="color:#39A900;"
                            ></i>

                            William Oswaldo Luna

                        </span>


                        <span
                            class="px-3 py-2 rounded-pill"
                            style="
                                background-color: rgba(255,255,255,.06);
                                border: 1px solid rgba(255,255,255,.10);
                            "
                        >

                            <i class="bi bi-bookmark-fill me-1"></i>

                            Ficha 3223899

                        </span>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- LOGO ADMIN SENA --}}
            {{-- ================================================= --}}
            <div class="col-md-6">

                <div
                    class="d-flex flex-column align-items-center text-center"
                >

                    {{-- LOGO --}}
                    <img
                        src="{{ asset('storage/images/AdminSena-logo.png') }}"
                        alt="Admin Sena"
                        style="
                            width: 250px;
                            max-width: 100%;
                            height: auto;
                            object-fit: contain;
                        "
                    >


                    <p
                        class="mt-3 mb-2 fw-semibold"
                        style="color:#39A900;"
                    >
                        Sistema de Administración Académica
                    </p>


                    <p class="small text-white-50 mb-0">
                        Organización · Gestión · Información
                    </p>

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- SEPARADOR --}}
        {{-- ================================================= --}}

        <hr
            class="my-4"
            style="
                border-color: rgba(255,255,255,.15);
            "
        >


        {{-- ================================================= --}}
        {{-- PARTE INFERIOR --}}
        {{-- ================================================= --}}

        <div class="row align-items-center gy-2">

            <div class="col-md-6 text-center text-md-start">

                <small class="text-white-50">

                    <i
                        class="bi bi-c-circle me-1"
                        style="color:#39A900;"
                    ></i>

                    {{ date('Y') }} Admin Sena

                </small>

            </div>


            <div class="col-md-6 text-center text-md-end">

                <small class="text-white-50">

                    <i
                        class="bi bi-shield-check me-1"
                        style="color:#39A900;"
                    ></i>

                    Sistema de Gestión Académica SENA

                </small>

            </div>

        </div>

    </div>

</footer>