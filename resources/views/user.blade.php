@extends('layouts.default')

{{-- para levar la para o layout, no local especificado este arquivo --}}
{{-- @push('css_user')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush --}}

{{-- para levar la para o layout, no local especificado este arquivo --}}
{{-- @push('js_user')
<script src="{{ asset('js/user.js') }}"></script>
@endpush --}}

@section('title',"titulo usuarios") {{-- Alterar titulo da pagina, que esta no defaul.blade --}}

{{-- Aqui substitui a sidebar la do layouts, por esta aquim, com base na section --}}
@section('sidebar')
    <div style="border: 1px solid red;">
        <h3>SideBar</h3>
        <nav>
            <li>elem Users 1</li>
            <li>elem Users 2</li>
            <li>elem Users 3</li>
        </nav>
    </div>
@endsection


@section('main_content') {{-- conteudo definido dentro do layout, com este nome, vem parar aqui --}}
    <h1>Usuários</h1>

    {{ $user_arr->name }}<br>
    {{ $user_arr->email }}
    <br>

    <input type="text" class="form-control">

    {{-- pode criar variavel php a qualquer momento --}}
    @php
        $valor = 99;
        $array = ["nome"=> 'Marcelo', 'email'=>'marcelo@dag.com.br'];

        $arr_obj = (object) $array;


        //dd ($arr_obj->nome)
    @endphp

    @if($user_arr->name == 'MARCELO MARTINI VIEIRA')
        <br><br>verdadeiro
    @endif

    @empty($arr_obj)
    <br><br> O array esta vazio
    @else
        <br><bR>Nome: {{ $arr_obj->nome }}
    @endempty

    @if ($valor >= 100)
        <br><br>ta caro
    @else
    <br><br>ta barato
    @endif

@endsection


