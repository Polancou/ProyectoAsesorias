<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portal de Asesorías</title>
    <link rel="shortcut icon" href="{{ asset('images/uac.jpg') }}" >
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<style>
    .iris {
        background-image: url('{{asset('images/fondo.png')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        z-index: 0;
        background-color: black;
        background-position: center;

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
    }
    .oculto {
        display: none;
    }
    .picker__date-display, .picker__weekday-display{
        background-color: #212121;

    }

    div.picker__day.picker__day--infocus.picker__day--selected.picker__day--highlighted {
        background-color: #212121;

    }
    .picker__box{
        border-color: #212121;
        border-radius: 30px;
    }

    ul.dropdown-content.select-dropdown li span {
        color: #ffffff; /* no need for !important :) */
        background-color: #212121;
    }

    html {
        line-height: 1.5;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-weight: normal;
        color: rgba(0, 0, 0, 0.87);
    }

    .modal{
        border-radius: 35px;
    }

    .btn{
        border-radius: 35px;
    }


    .picker__day.picker__day--today {
        color: red;
    }

    .pagination li {
        display: inline-block;
        border-radius: 15px;
        text-align: center;
        vertical-align: top;
        height: 30px;
        width: 20px;
    }

    .pagination li a {
        color: #ffffff;
        display: inline-block;
        font-size: 1.2rem;
        padding: 0 10px;
        line-height: 30px;
    }

    .pagination li.active a {
        color: #fff;
    }

    .pagination li.active {
        background-color: #bbdefb;
    }

    .pagination li.disabled a {
        cursor: default;
        color: #ffffff;
    }

    .pagination li i {
        font-size: 2rem;
    }

    .pagination li.pages ul li {
        display: inline-block;
        float: none;
    }

    @media only screen and (max-width: 992px) {
        .pagination {
            width: 100%;
        }
        .pagination li.prev,
        .pagination li.next {
            width: 10%;
        }
        .pagination li.pages {
            width: 80%;
            overflow: hidden;
            white-space: nowrap;
        }
    }

</style>
<body class="iris">
@yield('body')
<!--Import jQuery before materialize.js-->

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
            min: [7],
            max: [20]
        });

            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();

    });

    function MostrarOcultos() {
        var ocultos = document.getElementsByClassName("oculto");
        for (var i = 0; i<=ocultos.length; i++){
            $(ocultos[i]).css('display','block');
        }
    }

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }


        });

</script>
@yield('scripts')
</body>
</html>
