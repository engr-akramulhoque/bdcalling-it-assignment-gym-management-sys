# Gym Class Scheduling and Membership Management System
## BD Calling IT


### Description:

<p>This Gym Class Scheduling and Membership Management System aims to simplify gym management while enhancing the user experience for members, allowing gyms to scale efficiently while improving operational workflows.</p>

### Features

<p>
Login and Role-Based Dashboard: <br>
Separate dashboards for Admin, Trainers, and Trainees.<br>
Trainees: Profile management and class booking functionality.<br>
Trainers: View their class schedules.<br>
Admin: Manage trainers and class schedules.
</p>

## Requirements:

```bash
    "php": "^8.2",
    "laravel/framework": "^11.0",
```

# How to run the script?

### step 1: Clone the repository

```bash
    git clone https://github.com/engr-akramulhoque/bdcalling-it-assignment-gym-management-sys.git
```

### step 2: Go to the Directory

```bash
    cd bdcalling-it-assignment-gym-management-sys
```

### step 3: Install all dependencies

```bash
    composer install
    # or
    composer update
```

### step 4: Copy .env files

```bash
    cp .env.example .env
    # it will generate .env file from .env.example
```

### step 5: Configure environment

<p>Open .env file inside any of your code editor and fill all the following credentials</p>

```bash
    # Set .env configuration

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bdcalling_test_db
    DB_USERNAME=root
    DB_PASSWORD=
```

### step 6:

```bash
    php artisan key:generate
    # it will generate the application key
```

### step 6: Dump Database

```bash
    php artisan migrate
    # it will run the database migrations

    php artisan db:seed
    # it will seeding dummy data into the database
```

### step 7:

```bash
    php artisan serve
```
<p>Go to Local Server:
    <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a>
</p>

### Login Credentials :

<p>Login URI:
    <a href="http://127.0.0.1:8000/login" target="_blank">http://127.0.0.1:8000/login</a>
</p>

<p>
    Admin: <br>
    <span>Username: admin@gmail.com</span> <br>
    <span>Password: password</span>
</p>

<p>
    Trainer: <br>
    <span>Username: trainer@gmail.com</span> <br>
    <span>Password: password</span>
</p>

<p>
    Trainee: <br>
    <span>Username: trainee@gmail.com</span> <br>
    <span>Password: password</span>
</p>

### contributions :

<p>
    Akramul Hoque (Software Engineer)<br>
</p>

<small> More about this assignment : 
    <a href="https://docs.google.com/document/d/1MWQgBkcmNGP4YECS7BiFEEEVbw4YjXpXtn6m9AiKBro/edit?usp=sharing">Read Documentation</a>
</small> <br>

<span>copyright: <a href="https://github.com/engr-akramulhoque">Engr-Akramul Hoque</a></span>

### Hope you enjoying this project. Have a good day!

## Thank you!
