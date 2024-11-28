Trade Finance Guarantee Issuance System

## Project Overview
The Trade Finance Guarantee Issuance System is a web application built using Laravel, dealing with the management of all the life cycles of financial guarantees Bank Guarantees, Bid Bonds, Insurance, and Surety. The solution will support secure CRUD, bulk uploads of data, and different levels of role-based access for efficient and reliable guarantee management. It leverages Laravel's MVC architecture, Eloquent ORM, and Blade templates for a robust and scalable solution.

## Learning Outcomes
The following are the objectives we want to achieve by this project:

- Design a secure, modular architecture using Laravel and follow the MVC pattern.
- Design a database schema with validations to maintain data integrity.
- Use the Repository pattern to manage data interactions and enhance modularity.
- Use Laravel's authentication middleware to implement secure access control.
- Enable bulk data uploads with support for CSV, JSON, and XML formats.
- Deploy and test the application locally for seamless integration and functionality.

## Setup Instructions
To set up the project locally, follow these steps:

- Set up the database:
    - Open MySQL and create a database named TradeFinanceGuaranteeSystem.
    - Run migrations to create tables using the following command: `php artisan migrate`
- Configure the environment:
- Copy.env.example file to.env: `cp.env.example.env`
    - Edit.env with database credentials:
      ` DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=TradeFinanceGuaranteeSystem
        DB_USERNAME=your_username`
DB_PASSWORD=your_password`
- Generate the application key: `php artisan key:generate`
- Run the application: `php artisan serve`
- Access the application at: http://127.0.0.1:8000.

## Contribution Summary

### Team Members

Apurva \n
Munish\n
Maharshi\n
Chidera
