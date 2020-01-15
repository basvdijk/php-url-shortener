php-url-shortener is an url shortener with server side Google Analytics page tracking. You can see this as a bit.ly clone without the need for a database.

# Setup

## Requirements
The server needs to support:
- PHP
- Apache
- mod_rewrite

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


# Create new short url

 1. Copy `De%V6.php` into a new file with a name you wish to use
 2. Update the target url, link and page title

# Bookmarklet
You can use a bookmarklet as well. This bookmarklet will ask you for the Google Analytics page path you want to use and generates the `php` file on the fly.
1. Copy the code from [src/bookmarklet](src/bookmarklet.js) 
2. Create a new entry in your bookmark bar
3. Change the url to `javascript:` and paste the copied code