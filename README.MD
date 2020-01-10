php-url-shortener is an url shortener with Google Analytics page tracking.

# Setup

## Create `config.php` in `src` folder

```php
<?php
    define("GA_ID", "UA-XXXXXXX-XX");
    define("GA_HOSTNAME", "yourdomain.com");
?>
```

## Run the PHP development server
```
php -S localhost:8000 -t src
```

Open `http://localhost:8000/De%V6.php` in your browser to test the redirect