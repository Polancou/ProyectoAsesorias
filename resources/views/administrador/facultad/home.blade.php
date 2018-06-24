@extends('administrador.base')
@section('elementos')
    <form class="col s12" method="post" action="{{ route('saveunidad') }}" >
        {{ csrf_field() }}
        <div class="col s12 m12">
            <div class="row center ">
                <div class="row col s12 m9">
                    <blockquote>
                        <h4 class="left-align thin white-text">Nueva Unidad de Aprendizaje</h4>
                    </blockquote>
                </div>
            </div>
            <div style="margin-top: 50px">
                <div class="row">
                    <p>En esta sección, usted podrá realizar la gestión de las Facultades y Escuelas pertenecientes a la Universidad Autónoma de Campeche</p>

                </div>
            </div>
        </div>
    </form>
@endsection