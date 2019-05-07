# Class Management Software

Create a basic CRUD application for a school to manage its classes, teachers and students.

__Clone this repository to work on.__

Upload your finished project to either github, bitbucket or gitlab, ensure that it is open for public viewing.

## Test Details

#### There are 4 main entities:

__Users__
 - School admin staff who log into this app

__Classes__
 - A class must have one teacher
 - A class can have one or many students

__Teachers__
 - A teacher can have none or many classes

__Students__
 - A student can belong to none or one class

![ERD](readme-resources/entity-relationship-diagram.png?raw=true "ERD")

#### Properties
 - Every User has an email, password.
 - Every Classroom, Teacher and Student has a name property.

## Application Requirements
 - a login page
 - once logged in, the user can list/create/edit/delete Classrooms, Teachers and Students.
 - the user can assign teachers and students to classrooms
 - the user can download a PDF file that lists all the Classrooms with the names of Teachers and Students in them.

## Basic Requirements
 - Clone this repository to work on
 - The completed work should be based on Laravel 5.6, this repository is already based on Laravel 5.6
 - Cleanly written code with descriptive variable, method and function names
 - Follow the [PSR-1 Basic Coding Standard](https://www.php-fig.org/psr/psr-2/) and [PSR-2 Coding Style Guide](https://www.php-fig.org/psr/psr-2/)
 - Make full use of [Laravel's Eloquent models](https://laravel.com/docs/5.6/eloquent).
 - Make use of [Laravel's Database Migrations](https://laravel.com/docs/5.6/migrations) to setup the database structure
 - Make use of [Laravel's Database Seeding](https://laravel.com/docs/5.6/seeding) to setup the first user account.
 - Implement [Foreign Key Constraints](https://laravel.com/docs/5.6/migrations#foreign-key-constraints) in your database
 - Use git version control

## Bonus
Not required but good to have
 - Write PHPUnit Tests
 - Small git commits with descriptive commit messages
 - Usage of Laravel's various features
