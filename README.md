#LIBRARY DEV

This project is a basic CRUD (Create, Read, Update, Delete) developed with the Laravel framework. The system allows you to create, view, update, and delete records in the database.

TECHNOLOGIES USED
+ Composer (2.7.8)
+ Laravel (11.x)
+ MySQL
+XAMPP

##TO INSTALL AND RUN THE PROJECT

1st Download the project from GitHub

+ git clone git@github.com/library-dev.git

2nd Navigate to the folder where the project was downloaded

+ cd your-repository

Open the project in your preferred IDE (VS Code was used for development)

Now, pay close attention to running the project on your machine.

Open the terminal and run the following commands:

3rd Install Composer dependencies

+ composer install

###4th Copy the .env.example file

After copying, it will look like this: .env.example.copy

Delete the '.example.copy' and leave it as .env

5th Generate a new application key Run this command in the terminal at the root of the folder

+ php artisan key

###6th Configure the database environment variables

+ DB_CONNECTION=mysql
+ DB_HOST=127.0.0.1
+ DB_PORT=3306
+ DB_DATABASE=library_dev_db
+ DB_USERNAME=root
+ DB_PASSWORD=

7th Run the migrations to create the tables in the database

+ php artisan migrate

8th To start the project:

+ php artisan serve

A link with localhost will appear in the terminal

Endpoints:

+ index -> /book-index (GET) - Listing all books
+ create -> /book-create (GET) - Form to register a new book
+ store -> /book-store (POST) - Route where the registration is submitted
+ show -> /book-show/{id} (GET) - View a book by its ID
+ edit -> /book-edit/{id} (GET) - Form to edit a book
+ update -> /book-update/{id} (PUT) - Route where the edit is submitted
+ destroy -> /book-destroy/{id} (DELETE) - Route to delete a record