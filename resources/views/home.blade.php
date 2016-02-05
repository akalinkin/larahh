<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>URL Shortener - Laravel-Hamburg</title>

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
        <h1>Laravel Hamburg URL Shortener</h1>
    </div>

    <div class="alert alert-danger" role="alert" v-if="link.error">@{{ link.error }}</div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">URL Shortener</h3>
        </div>
        <div class="panel-body">
            <form action="#" method="POST" v-on:submit.prevent="createUrl">
                <div class="form-group">
                    <label for="url">Long URL</label>
                    <input type="text" class="form-control" id="url" placeholder="Long URL" v-model="link.url">
                </div>
                <div class="form-group">
                    <label for="alt">Short URL</label>
                    <input type="text" class="form-control" id="alt" placeholder="Short URL" value="@{{ link.alt }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Shorten!</button>
            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">API</h3>
        </div>
        <div class="panel-body">
            To use our URL-Shortener from your application, you simply need to to a POST-Request to the API:

            <pre>curl -X "POST" "https://larahh.xyz/u?url=<kbd>URL</kbd>"</pre>

            The respsonse will be something like:
            <pre>{
  "url": "https://larahh.xyz/u/Pmn60SE"
}</pre>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script>
    new Vue({

        el: '#app',

        data: {
            link: {
                url: '',
                alt: '',
                error: ''
            }
        },

        methods: {
            createUrl: function() {
                var link = this.link;

                this.$http.post('/u', link).then(function (response) {
                    this.link.alt = response.data.url;
                    this.link.error = response.data.error;

                    console.log(response.data.error);
                    console.log(response.data.url);
                }, function (response) {
                    this.link.error = response.data.error;
                    console.log(response);
                });
            }
        }

    })
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '{!! env('GA_ID') !!}', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>