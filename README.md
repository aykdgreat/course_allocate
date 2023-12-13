# Course Allocate Laravel Project Setup

This guide outlines the steps to set up the "Course Allocate" Laravel project after cloning the repository.

## 1. Clone the Repository

```bash
git clone https://github.com/aykdgreat/course_allocate.git
```

## 2. Install Composer Dependencies

```bash
composer install
```

## 3. Install NPM Packages

```bash
npm install
```

Ensure you have Node.js and npm installed before running this command.

## 4. Create a Copy of the `.env` File

```bash
cp .env.example .env
```

## 5. Generate Application Key

```bash
php artisan key:generate
```

## 6. Configure the Database in `.env`

Set your database connection details in the `.env` file.

## 7. Migrate Database

```bash
php artisan migrate
```

## 8. Seed the Database

```bash
php artisan db:seed
```

## 9. Run Development Server

```bash
php artisan serve
```

Access the application in your browser at [http://localhost:8000](http://localhost:8000).

## Additional Notes

- For more details on Laravel commands, visit the [Laravel Documentation](https://laravel.com/docs).
