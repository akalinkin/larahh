<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Counter for: {{ $counter->alt }} - Laravel-Hamburg</title>

    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container" id="app">
    <div class="page-header">
        <h1>Statistics</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Counter for: <a href="{{ url('u',$counter->alt) }}">{{ url('u',$counter->alt) }}</a></h3>
        </div>
        <div class="panel-body">
            Total clicks: {{ $counter->view_count }}<br>
            Origin: <a href="{{ $counter->url }}">{{ $counter->url }}</a>
        </div>
    </div>
</div>

</body>
</html>
