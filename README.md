## ejecutar primero la creacionde los esquemas en la base de datos -- ejecutar solo la pagina web  
    CREATE SCHEMA albumqr;

# migracion del modulo album 
    php artisan migrate:refresh --path=database/migrations/albumqr
# Procede a ejecutar el seeder de hotel
    php artisan db:seed --class='Database\Seeders\albumqr\RunSeeder'

# comando 
    php artisan make:seeder CARPETA/NOMBRESeeder
