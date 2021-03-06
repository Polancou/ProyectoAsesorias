@extends('coordinador.base')
@section('elementos')
    <form class="col s12" method="post">
        {{ csrf_field() }}
        <div class="col s12 m12">
            <div class="row center ">
                <div class="row col s12 m9">
                    <blockquote>
                        <h4 class="left-align thin white-text">Asesores</h4>
                    </blockquote>
                </div>
            </div>
            <div style="margin-top: 50px">
                <div class="row">
                    <div class="row input-field col s12 m6">
                        <label class="active white-text" for="especialidad">Especialidad</label>
                        <select class="white-text" id="especialidad" name="especialidad" onchange="mostrarTabla(this
                        .value)">
                            <option disabled selected="selected" value="nada">Buscar por especialidad</option>
                            @foreach($consultants as $consultant)
                                <option value="{{ $consultant->especialidad }}">{{ $consultant->especialidad }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="posts row" id="posts">
                    <table class="white-text highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Especialidad</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consultants as $consultant)
                            <tr>
                                <td width="40%">{{ $consultant->nombre ." ". $consultant->apellido}}</td>
                                <td width="40%">{{ $consultant->especialidad }}</td>

                                <td><a class="tooltipped" data-position="top" data-delay="50"
                                       data-tooltip="Consultar detalles de materias y horarios"
                                       href="{{ route('detalleasesor', ['id'=>encrypt($consultant->id)]) }}" >Ver
                                        detalles</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @unless (count($consultants))
                        <p class="white-text center-align">No existen asesores.</p>
                    @endunless
                    {!! $consultants->links() !!}
                </div>
            </div>
        </div>
    </form>
    <script>
        function mostrarTabla(val) {
            $.ajax({
                type: 'post',
                url: '{{route('filtroespecialidad')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    especialidad: val
                },
                success: function (response) {
                    document.getElementById('posts').innerHTML = response.html;
                    $('.modal').modal();
                    $('.tooltipped').tooltip({delay: 50});
                }
            });
        }

        function cargaTabla(page) {
            var tipo = document.getElementById('especialidad').value;
            $.ajax({
                data: {
                    especialidad: tipo
                },
                url:'?page='+page
            }).done(function (data) {
                console.log(data)
                $('.posts').html(data);
                $('.modal').modal();
                $('.tooltipped').tooltip({delay: 50});
            })
        }
    </script>
@endsection