## Candidate CV data organizer

Simple application for storing candidate CV data:

-   Register
-   Login
-   Add candidate (create, edit, delete)
-   Add candidate experience (project) (create, edit, delete)
-   Define technologies (create, edit, delete)
-   Assign technologies to a candidate
-   Add custom tag to a candidate

## Run project

Download / clone project. Navigate to project folder.</br>
Install composer dependencies (composer install).</br>
Install npm dependencies (npm install).</br>
Create .env file (copy from .env.example).</br>
Generate application key (php artisan key:generate).</br>
Create empty DB and set up .env file with database information.</br>
Run migrations with command:

```
php artisan migrate
```

Seed database:

```
php artisan db:seed
```

Users table contain demo user:</br>
admin@test.com (passwords 12345678)</br>
