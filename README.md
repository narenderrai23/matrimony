# Project Setup and Instruction

## Introduction

This guide provides step-by-step instructions to set up and run the project locally. Follow the steps below to clone the repository, migrate and seed the database, and start the server.

## Prerequisites

Ensure you have the following installed on your local machine:

-   PHP
-   Composer
-   Git
-   A web browser

## Installation Steps

### Clone the Repository

Open your terminal and run the following command to clone the repository:

```
git clone https://github.com/narenderrai23/test-inter.git

```

## Navigate to the Project Directory

`cd test-inter`

### Install Dependencies

`composer install`

### Environment Configuration

`cp .env.example .env`

### Run Database Migrations

```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Accessing the Application

### Open the Application

`http://127.0.0.1:8000/`

### Admin Dashboard

`http://127.0.0.1:8000/admin/login`

### Credentials

```
Email : admin@gmail.com,
Password : Pa$$w0rd!,
```

### User Login and Registration

```
http://127.0.0.1:8000/login
http://127.0.0.1:8000/register

```

## Roles in the Project

> **Admin**: Has access to the admin dashboard and can manage various aspects of the application.

> **User**: Can log in and use the application as a regular user.
