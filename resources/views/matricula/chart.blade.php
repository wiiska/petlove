<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gráfico Desempenho dos alunos</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen bg-gray-100">

<div class="container px-4 mx-auto">

    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $notasChart->container() !!}
    </div>

    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $mediaNotasChart->container() !!}
    </div>

</div>

<!-- add os scripts do javascript do ApexChart-->
<script src="{{ $notasChart->cdn() }}"></script>

{{ $notasChart->script() }}
{{ $mediaNotasChart->script() }}
</body>
</html>
