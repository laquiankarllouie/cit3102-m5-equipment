Partners: Karl Louie Laquian and Yrej Talawec
Section: IT1E
Resource: Equipment

Step 1: Clone the repository:
   git clone https://github.com/laquiankarllouie/cit3102-m5-equipment.git
   cd cit3102-m5-equipment

Step 2: Install dependencies:
```
   composer install
```
Step 3: Create the environment file and app key:
```
   copy .env.example .env
   php artisan key:generate
```
Step 4: Create the database and run migrations (answer `yes` if asked to create the SQLite file):
```
   php artisan migrate
```
Step 5: Start the server:
```
   php artisan serve
   The API runs at `http://localhost:8000`.
