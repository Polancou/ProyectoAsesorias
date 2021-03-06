@extends('templates.base')

@section('header')
    <div class="left-align">
        <a href="" class="center white-text"><h4></h4></a>
        <a data-activates="slide-out" class="button-collapse"></a>
    </div>
@endsection
@section('aside')
    <ul id="slide-out" class="side-nav fixed grey darken-4">
        <li>
            <div class="user-view">
                <div>
                    <img src="">
                </div>
                <a><img class="circle" src="{{ asset('images/asesorias.jpg') }}"></a>
                <h6 class="white-text">Portal de Asesorías</h6>
                <h6 class="white-text">ADMINISTRADOR</h6>
                <h6 class="white-text thin">{{ \Illuminate\Support\Facades\Auth::user()->usuario }}</h6>
                <h6 class="white-text thin">{{ \Illuminate\Support\Facades\Auth::user()->correo }}</h6>
            </div>
        </li>
        <li>
            <a  href="{{route('adminhome')}}" class="white-text left-align"><i class="material-icons">home</i>Inicio</a>
        </li>
        <li>
            <a  href="{{route('viewfacultad')}}" class="white-text left-align"><i class="material-icons">domain</i>Facultades</a>
        </li>
        <li>
            <a  href="{{route('viewlicenciatura')}}" class="white-text left-align"><i class="material-icons">card_membership</i>Licenciaturas</a>
        </li>
        <li>
            <a  href="{{route('viewunidad')}}" class="white-text left-align"><i class="material-icons">class</i>Unidades de Aprendizaje</a>
        </li>
        <li>
            <a  href="{{route('viewusuarios')}}" class="white-text left-align"><i class="material-icons">account_circle</i>Usuarios</a>
        </li>
        <li>
            <a  href="{{route('viewaprovechamiento')}}" class="white-text left-align"><i class="material-icons">thumb_up</i>Criterios de Evaluación</a>
        </li>
        <li>
            <a href="#signout" class="white-text btn-flat left-align  modal-trigger"><span></span><i
                        class="material-icons">exit_to_app</i>Cerrar
                Sesión</a>
        </li>
    </ul>
    <div id="signout" class="modal">
        <div class="modal-content">
            <h5>Cerrar sesión</h5>
            <p>¿Desea finalizar esta sesión?</p>
        </div>
        <div class="modal-footer">
            <a id="" onclick="$('#signout').modal('close');" class="modal-action modal-close waves-effect
                                            waves-red btn-flat">Cancelar</a>
            <a id="" href = '{{ route('adminlogout') }}' class="modal-action modal-close waves-effect
                                            waves-green btn-flat">Aceptar</a>
        </div>
    </div>
@endsection

@section('footer')
    <div class="row">
        <div class="container left-align">
            <div class="">
                <div class="col s12 m12">
                    <h6 class="white-text center-align">Universidad Autónoma de Campeche</h6>
                    <p class="white-text center-align">Portal de Aseorías</p>
                    <p class="center-align white-text thin">© 2018 Copyright</p>
                </div>
            </div>

        </div>
    </div>


@endsection
