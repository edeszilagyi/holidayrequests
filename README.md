# Holiday requests app

A leaave request system for employees to digitally request their leave and managers to approve or deny them.

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Seeding The Database
To add the dummy requests with a single user, run the following
```
php artisan db:seed
```

### Running The App
Run 
```
php artisan serve
```