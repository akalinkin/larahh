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

<div class="container" id="app">
    <div class="page-header">
        <h1>Laravel Hamburg URL Shortener</h1>
    </div>

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
            },

            submitted: false,
            deleted: false
        },

        methods: {
            createUrl: function() {
                var link = this.link;

                this.$http.post('/u', link).then(function (response) {
                    this.submitted = true;
                    this.link.alt = response.data.url;
                    console.log(response.data.url);
                }, function (response) {
                    console.log(response);
                });
            }
        }

    })
</script>

</body>
</html>