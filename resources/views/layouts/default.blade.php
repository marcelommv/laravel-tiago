<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "Titulo Layout Padrão")</title>

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}} {{-- CDN tradicional --}}
    @vite('resources/js/app.js')
    @stack('css_user') {{-- forca os css la de user.blade aparecem aqui, com base no nome --}}
</head>
<body>
    <h1>Layout</h1>

    {{-- Criar SideBar, eh um pouco diferente, porque usa elementos html dentro dela --}}
    @section('sidebar')
        <div style="border: 1px solid red;">
            <h3>SideBar</h3>
            <nav>
                <li>elem Main 1</li>
                <li>elem Main 2</li>
                <li>elem Main 3</li>
            </nav>
        </div>
    @show {{-- fecha com show, ao inves de @endsection, para exibir na tela já este html no template --}}

    @yield('main_content')

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}} {{-- CDN tradicional --}}
    @stack('js_user') {{-- forca os js la de user.blade aparecem aqui, com base no nome --}}
</body>
</html>
