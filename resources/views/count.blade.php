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
<a href="https://github.com/LaravelHamburg/larahh">
    <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png">
</a>

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
