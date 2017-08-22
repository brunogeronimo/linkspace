## Dependencies
- PHP 7.0;
- Composer;
- Laravel 5.4;
- MySQL Server 5.7.

### How to build your environment
- run `composer global require "laravel/installer"`
- run `composer install`;
- You need to copy `.env.example`'s content to a file named `.env`;
- Update database settings to your own;
- Create your database at your server;
- Execute `php artisan migrate` to create all required tables;

### How to run the project
- Just run `php artisan serve`.

### How to run allowing external access
- Just run `php artisan serve --host=0.0.0.0`. You can also use port 80 to be easily accessible by a browser, all you have to do is add `--port=80` at the end of the command.

Enjoy! :)