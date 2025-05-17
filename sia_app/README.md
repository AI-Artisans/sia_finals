

## Getting Started with Bitbybit Project

### Prerequisites

1. PHP version 8.1 or higher
2. MySQL database (XAMPP, MAMP, or standalone MySQL installation)
3. Composer

### Installation & Setup

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/bitbybit.git
   cd bitbybit
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Copy `env` to `.env` and configure your environment:
   ```
   cp env .env
   ```
   
4. Open the `.env` file and set your baseURL and other settings:
   ```
   app.baseURL = 'http://localhost:8080'
   ```

5. Database Configuration:
   - Make sure MySQL server is running
   - The database configuration is already set up in `app/Config/Database.php` with:
     - Hostname: 127.0.0.1
     - Username: root
     - Password: (empty by default, change if your MySQL setup has a different password)
     - Database: bitbybit

6. Database Setup:
   - Create the database by running:
     ```
     /path/to/mysql -u root -e "CREATE DATABASE IF NOT EXISTS bitbybit;"
     ```
     Or if using XAMPP:
     ```
     /Applications/XAMPP/xamppfiles/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS bitbybit;"
     ```

7. Run migrations to create all database tables:
   ```
   php spark migrate
   ```

8. Start the development server:
   ```
   php spark serve
   ```

9. Open your browser and visit `http://localhost:8080`

## Project Database Structure

The project uses a MySQL database with the following tables:

- `bitbybit_role`: User roles
- `bitbybit_users`: User accounts
- `bitbybit_posts`: Blog posts/content
- `bitbybit_comments`: Comments on posts

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) for MySQL database connection
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Troubleshooting

If you encounter database connection issues:
1. Ensure MySQL is running
2. Check your database credentials in `app/Config/Database.php`
3. If using XAMPP/MAMP, make sure the services are started
4. Try using '127.0.0.1' instead of 'localhost' as the hostname
