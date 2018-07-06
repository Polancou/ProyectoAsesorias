<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.css')}}"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portal de Asesorías</title>
    <link rel="shortcut icon" href="{{ asset('images/uac.jpg') }}" >
</head>
<style>
    .iris {
        background-image: url('{{asset('images/fondo.png')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        z-index: 0;
        background-color: black;
    }
    .padre {
        display: flex;
        justify-content: center;
    }
    .input-field input:focus + label,i{
        color: white !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid white !important;
        box-shadow: 0 1px 0 0 white !important
    }
    .boton{
        margin-top: 10px;
        width: 100%;
        max-width: 240px;
        border-radius: 100px;
        z-index: 0;
        letter-spacing: .5px;
        font-weight: 500;
    }
    side-nav{
        width: 250px;
    }
    header, main, footer  {
        padding-left: 300px;
    }


    @media only screen and (max-width : 992px) {
        header, main, footer {
            padding-left: 0;
        }
    }
    main {
        display: flex;
        flex: 1 0 auto;
        min-height: 100vh;
        flex-direction: column;
    }
    blockquote{
        margin: 20px 0;
        padding-left: 1.5rem;
        border-left: 5px solid #ffffff; /* Just change the color value and that's it*/
    }

    table, th, td {
        border: none;
    }

    table {
        width: 100%;
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
    }

    table.bordered > thead > tr,
    table.bordered > tbody > tr {
        border-bottom: 1px solid rgba(242, 242, 242, 0.84);
    }

    table.striped tr {
        border-bottom: none;
    }

    table.striped > tbody > tr:nth-child(odd) {
        background-color: rgba(242, 242, 242, 0.5);
    }

    table.striped > tbody > tr > td {
        border-radius: 0;
    }

    table.highlight > tbody > tr {
        -webkit-transition: background-color .25s ease;
        transition: background-color .25s ease;
    }

    table.highlight > tbody > tr:hover {
        background-color: rgba(242, 242, 242, 0.16);
    }

    table.centered thead tr th, table.centered tbody tr td {
        text-align: center;
    }

    tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
    }

    td, th {
        padding: 15px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }

    @media only screen and (max-width: 992px) {
        table.responsive-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            display: block;
            position: relative;
            /* sort out borders */
        }
        table.responsive-table td:empty:before {
            content: '\00a0';
        }
        table.responsive-table th,
        table.responsive-table td {
            margin: 0;
            vertical-align: top;
        }
        table.responsive-table th {
            text-align: left;
        }
        table.responsive-table thead {
            display: block;
            float: left;
        }
        table.responsive-table thead tr {
            display: block;
            padding: 0 10px 0 0;
        }
        table.responsive-table thead tr th::before {
            content: "\00a0";
        }
        table.responsive-table tbody {
            display: block;
            width: auto;
            position: relative;
            overflow-x: auto;
            white-space: nowrap;
        }
        table.responsive-table tbody tr {
            display: inline-block;
            vertical-align: top;
        }
        table.responsive-table th {
            display: block;
            text-align: right;
        }
        table.responsive-table td {
            display: block;
            min-height: 1.25em;
            text-align: left;
        }
        table.responsive-table tr {
            padding: 0 10px;
        }
        table.responsive-table thead {
            border: 0;
            border-right: 1px solid rgb(255, 255, 255);
        }
        table.responsive-table.bordered th {
            border-bottom: 0;
            border-left: 0;
        }
        table.responsive-table.bordered td {
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
        }
        table.responsive-table.bordered tr {
            border: 0;
        }
        table.responsive-table.bordered tbody tr {
            border-right: 1px solid rgba(0, 0, 0, 0.12);
        }
        .oculto {
            display: none;
        }




        @media only screen and (min-width: 0) {
            html {
                font-size: 14px;
            }
        }

        @media only screen and (min-width: 992px) {
            html {
                font-size: 14.5px;
            }
        }

        @media only screen and (min-width: 1200px) {
            html {
                font-size: 15px;
            }
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
            line-height: 1.3;
        }

        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
            font-weight: inherit;
        }

        h1 {
            font-size: 4.2rem;
            line-height: 110%;
            margin: 2.8rem 0 1.68rem 0;
        }

        h2 {
            font-size: 3.56rem;
            line-height: 110%;
            margin: 2.3733333333rem 0 1.424rem 0;
        }

        h3 {
            font-size: 2.92rem;
            line-height: 110%;
            margin: 1.9466666667rem 0 1.168rem 0;
        }

        h4 {
            font-size: 2.28rem;
            line-height: 110%;
            margin: 1.52rem 0 0.912rem 0;
        }

        h5 {
            font-size: 1.64rem;
            line-height: 110%;
            margin: 1.0933333333rem 0 0.656rem 0;
        }

        h6 {
            font-size: 1.15rem;
            line-height: 110%;
            margin: 0.7666666667rem 0 0.46rem 0;
        }

        em {
            font-style: italic;
        }

        strong {
            font-weight: 500;
        }

        small {
            font-size: 75%;
        }

        .light {
            font-weight: 300;
        }

        .thin {
            font-weight: 200;
        }

        @media only screen and (min-width: 360px) {
            .flow-text {
                font-size: 1.2rem;
            }
        }

        @media only screen and (min-width: 390px) {
            .flow-text {
                font-size: 1.224rem;
            }
        }

        @media only screen and (min-width: 420px) {
            .flow-text {
                font-size: 1.248rem;
            }
        }

        @media only screen and (min-width: 450px) {
            .flow-text {
                font-size: 1.272rem;
            }
        }

        @media only screen and (min-width: 480px) {
            .flow-text {
                font-size: 1.296rem;
            }
        }

        @media only screen and (min-width: 510px) {
            .flow-text {
                font-size: 1.32rem;
            }
        }

        @media only screen and (min-width: 540px) {
            .flow-text {
                font-size: 1.344rem;
            }
        }

        @media only screen and (min-width: 570px) {
            .flow-text {
                font-size: 1.368rem;
            }
        }

        @media only screen and (min-width: 600px) {
            .flow-text {
                font-size: 1.392rem;
            }
        }

        @media only screen and (min-width: 630px) {
            .flow-text {
                font-size: 1.416rem;
            }
        }

        @media only screen and (min-width: 660px) {
            .flow-text {
                font-size: 1.44rem;
            }
        }

        @media only screen and (min-width: 690px) {
            .flow-text {
                font-size: 1.464rem;
            }
        }

        @media only screen and (min-width: 720px) {
            .flow-text {
                font-size: 1.488rem;
            }
        }

        @media only screen and (min-width: 750px) {
            .flow-text {
                font-size: 1.512rem;
            }
        }

        @media only screen and (min-width: 780px) {
            .flow-text {
                font-size: 1.536rem;
            }
        }

        @media only screen and (min-width: 810px) {
            .flow-text {
                font-size: 1.56rem;
            }
        }

        @media only screen and (min-width: 840px) {
            .flow-text {
                font-size: 1.584rem;
            }
        }

        @media only screen and (min-width: 870px) {
            .flow-text {
                font-size: 1.608rem;
            }
        }

        @media only screen and (min-width: 900px) {
            .flow-text {
                font-size: 1.632rem;
            }
        }

        @media only screen and (min-width: 930px) {
            .flow-text {
                font-size: 1.656rem;
            }
        }

        @media only screen and (min-width: 960px) {
            .flow-text {
                font-size: 1.68rem;
            }
        }

        @media only screen and (max-width: 360px) {
            .flow-text {
                font-size: 1.2rem;
            }
        }

    }
</style>
<body class="iris">
@yield('body')
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src={{asset('js/materialize.js')}}></script>
<script type="text/javascript" src="{{ asset('js/materialize.clockpicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
        $(".button-collapse").sideNav();
        $(".oculto").css('display','none');
        $('.tooltipped').tooltip({delay: 50});
        $('select').on('contentChanged', function () {
            $(this).material_select();
        });

        $(document).on('click','.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            cargaTabla(page)
        });

        $('.timepicker').pickatime({
            default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'Aceptar', // text for done-button
            cleartext: 'Reiniciar', // text for clear-button
            canceltext: 'Cancelar', // Text for cancel-button,
            container: undefined, // ex. 'body' will append picker to body
            autoclose: false, // automatic close timepicker
            ampmclickable: true, // make AM PM clickable
            aftershow: function(){} //Function for after opening timepicker
        });


    });
</script>
<script>
    function MostrarOcultos() {
        var ocultos = document.getElementsByClassName("oculto");
        for (var i = 0; i<=ocultos.length; i++){
            $(ocultos[i]).css('display','block');
        }
    }
</script>
</body>
</html>
