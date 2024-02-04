<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/appAdmin.css'])
</head>
<body id="body-pd">
    <div id="app">
        <header class="header" id="header">
            @include('partials.admin_nav_section')
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="{{ url('/') }}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">{{ config('app.name', 'Laravel') }}</span> </a>
                    <div class="nav_list"> 
                        <a href="{{ route('admin.articles.index') }}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="{{ route('admin.articles.create') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Create Article</span> </a> 
                        <a href="{{ route('admin.categories.create') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Create Category</span> </a> 
                        <a href="{{ route('admin.tags.create') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Create Tag</span> </a> 
                </div> <a href="{{ route('logout') }}" class="nav_link" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
        <!--Container Main start-->
        <main class="height-100 bg-light">
            @yield('content')
        </main>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
        
        const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
        
        // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
        // show navbar
        nav.classList.toggle('show')
        // change icon
        toggle.classList.toggle('bx-x')
        // add padding to body
        bodypd.classList.toggle('body-pd')
        // add padding to header
        headerpd.classList.toggle('body-pd')
        })
        }
        }
        
        showNavbar('header-toggle','nav-bar','body-pd','header')
        
        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')
        
        function colorLink(){
        if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
        }
        }
        linkColor.forEach(l=> l.addEventListener('click', colorLink))
        
            // Your code to run since DOM is loaded and ready
        });
    </script>
 <x-flash/>
</body>
</html>
