<!--
# @Date:   2018-11-06T10:24:57+01:00
# @Last modified time: 2018-11-06T10:27:06+01:00
-->

{{-- root page --}}
<html>
    <head>
        <title>Contact</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content') {{-- used to put data here from another page--}}
        </div>

        @yield('footer')

    </body>
</html>
