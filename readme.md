# Laravel Hamburg URL-Shortener

## Documentation

To use our URL-Shortener from your application, you simply need to to a POST-Request to the API:

```curl -X "POST" "https://larahh.xyz/u?url=URL"```


The respsonse will be something like:
```
{
  "url": "https://larahh.xyz/u/Pmn60SE"
}
```

## Install

Clone repository

```
git clone git@github.com:akalinkin/larahh.git .
```

Install dependencies
```
composer install
```

Create your environment config and change content at your needs
```
cp .env.example .env
```

Create database with required name

Apply migrations
```
php artisan migrate
```

Add domain resolution rule to your `/etc/hosts`

```
127.0.0.1 shortify.local
```

Start development server
```
php -S 127.0.0.1:8001 -t ./public
```

Open main page in browser
```
http://shortify.local:8001
```

## License

**larahh** is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
