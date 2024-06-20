Project Setup and Instructions
Introduction
This guide provides step-by-step instructions to set up and run the project locally. Follow the steps below to clone the repository, migrate and seed the database, and start the server.

Prerequisites
Ensure you have the following installed on your local machine:

PHP
Composer
Git
A web browser
Installation Steps
Clone the Repository

Open your terminal and run the following command to clone the repository:

sh
Copy code
git clone https://github.com/narenderrai23/test-inter.git
Navigate to the Project Directory

Change your working directory to the project folder:

sh
Copy code
cd test-inter
Install Dependencies

Install the necessary dependencies using Composer:

sh
Copy code
composer install
Environment Configuration

Copy the example environment file and set up your environment variables:

sh
Copy code
cp .env.example .env
Open the .env file and configure your database and other environment variables as needed.

Generate Application Key

Generate a new application key:

sh
Copy code
php artisan key:generate
Run Database Migrations

Migrate the database schema:

sh
Copy code
php artisan migrate
Seed the Database

Seed the database with initial data:

sh
Copy code
php artisan db:seed
Start the Development Server

Start the Laravel development server:

sh
Copy code
php artisan serve
Accessing the Application
Open the Application

Open your web browser and navigate to:

sh
Copy code
http://127.0.0.1:8000/
Admin Dashboard

To access the admin dashboard, navigate to:

sh
Copy code
http://127.0.0.1:8000/admin/login
Use the following credentials to log in:

sh
Copy code
'email' => 'admin@gmail.com',
'password' => 'Pa$$w0rd!',
User Login and Registration

To log in as a user, navigate to:

sh
Copy code
http://127.0.0.1:8000/login
To register as a new user, navigate to:

sh
Copy code
http://127.0.0.1:8000/register
