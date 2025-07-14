## Book management system setup

instructions:

copy the commands and paste it on your terminal:

git clone https://github.com/junaidkaratt/Book-Management-System.git<br>
cd Book-Management-System<br>
composer install<br>
npm install<br>
npm run dev  <br>
cp .env.example .env<br>
php artisan key:generate<br>

create a sqlite file in the path : database\database.sqlite 

php artisan migrate --seed<br>
php artisan serve
