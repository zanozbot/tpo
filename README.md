# Patronažna služba
*Skupinsko delo pri predmetu Tehnologije programske opreme po Scrum metodologiji*

## Namestitev
- prenos in namestitev wamp stežnika za Windows ([povezava](http://www.wampserver.com/en/))
- zaženi wamp strežnik in pokačaj, da ikona postane zelena (po potrebi zapri Skype, ker prihaja do konfliktov na port-u)
- prenos Composer ([povezava](https://getcomposer.org/))
- ko namestitev Composer vpraša za *[...] command-line PHP [...]*, klikni browse in nastavi pot na `%namestitvena_mapa_wamp%\bin\php\php7.0.10\php.exe`
- odpri CMD in nastavi pot na `%namestitvena_mapa_wamp%\www` ter poženi naslednji ukaz `composer create-project --prefer-dist laravel/laravel ime_projekta`
- (preveri delovanje namestitve) premakni se v mapo novo nastalega projekta in zaženi `php artisan serve`, v brskalniku pojdi na naslov [localhost:8000](http://localhost:8000/)
- v korenu projekta popravi datoteko *.env* (*ime baze **testing** uporabimo zgolj za testiranje namestitve*)
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=testing
    DB_USERNAME=root
    DB_PASSWORD=
    ```
- ker wamp uporablja malo starejšo verzijo MySQL, se premakni v `app\Providers` in popravi datoteko *AppServiceProvider.php*
    ```
    use Illuminate\Support\Facades\Schema;
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    ```
- v brskalniku odpri [localhost/phpmyadmin](http://localhost/phpmyadmin/), klikni na *Databases* in ustvari novo bazo s *Collation* nastavljeno na `utf8mb4_unicode_ci`
- (preveri delovanje povezave na bazo) 
    - v korenu projekta zaženi `php artisan migrate`
    - v datoteko `ime_projekta\routes\web.php` dodaj
        ```
        Route::get('/users', function() {
    	return App\User::all();
        });
        ```
    - v korenu projekta zaženi `php artisan serve`, naslov [localhost:8000/users](http://localhost:8000/users/) bi moral vrniti prazen seznam []