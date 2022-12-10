<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default content')</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name ml-5">CIIE</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="{{ route('estudios.show',['estudio'=>$estudio])  }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Detalles del estudio</span>
                </a>
                <span class="tooltip">Detalles del estudio</span>
            </li>
            <li>
                <a href="{{ route('conceptos.index', ['estudio' => $estudio]) }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Conceptos</span>
                </a>
                <span class="tooltip">Conceptos</span>
            </li>
            <li>
                <a href="{{ route('polls.index', ['estudio' => $estudio]) }}">
                    <i class='bx bx-poll'></i>
                    <span class="links_name">Encuestas</span>
                </a>
                <span class="tooltip">Encuestas</span>
            </li>
            <li>
                <a href="{{ route('resultados.index', ['estudio' => $estudio]) }}">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Capturar resultados</span>
                </a>
                <span class="tooltip">Capturar resultados</span>
            </li>
            <li>
                <a href="{{ route('conclusion.index', ['estudio' => $estudio]) }}">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Agregar conclusión</span>
                </a>
                <span class="tooltip">Agregar conclusión</span>
            </li>
            <li>
                <a href="{{ route('pdf.generate', ['estudio' => $estudio]) }}" target="_blank">
                    <i class='bx bx-download'></i>
                    <span class="links_name">Ver resultados</span>
                </a>
                <span class="tooltip">Ver resultados</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name">Regresar</div>
                        <div class="job">ver estudios</div>
                    </div>
                </div>
                <a href="#" id="back">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>

    <!--CONTENIDO-->
    <section class="home-section">
        <div class="text">@yield('contenido')</div>

        <div class="fixed bottom-5 right-5">
            <a href="javascript:history.back()">
                <button
                    class="fixed z-90 bottom-10 right-8 bg-blue-600 hover:bg-blue-700 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl">
                    <div class="flex space-x-4">
                        <svg class="w-10 h-10 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                </button>
            </a>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>

    @yield('js')
</body>

</html>
