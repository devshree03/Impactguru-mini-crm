# ImpactGuru Mini CRM (Laravel)

A mini CRM built with Laravel to manage customers and orders, created as part of the ImpactGuru PHP internship assignment. It includes authentication with roles, customer and order modules, dashboard metrics, CSV export, and basic email-style notifications (logged in local environment).

## Tech stack

- Laravel 12.x (PHP 8.2)
- MySQL
- Blade + Tailwind CSS
- Laravel Breeze authentication
- Laravel Sanctum (API work in progress)

## Setup

1. **Clone the repository**

git clone https://github.com/devshree03/Impactguru-mini-crm.git
cd Impactguru-mini-crm


2. **Install PHP dependencies**

composer install



3. **Environment**

cp .env.example .env
php artisan key:generate



- Ensure your MySQL settings in `.env` match your local database.
- Example:

  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=impactguru_crm
  DB_USERNAME=root
  DB_PASSWORD=
  ```

4. **Database**

You can use the provided dump:

- Create a database `impactguru_crm` in MySQL.
- Import `database.sql` into it using phpMyAdmin or the MySQL client.

5. **Run the application**

php artisan serve


- Visit `http://127.0.0.1:8000` in your browser.
- Log in using one of the users from the imported database (e.g. an admin and a staff user).

## Features

The interface uses Tailwind-based cards, tables, and a top navigation bar for a clean, dashboard-style CRM experience.

### Authentication & Roles

- Login / registration using Laravel Breeze scaffolding.
- Users have a role (Admin or Staff) stored in the database.
- All CRM pages (dashboard, customers, orders) are protected by auth middleware.
- Certain actions are restricted to Admin only (for example deleting records).

### Customer module

- `customers` table with fields such as name, email, phone, address, and profile image.
- Full CRUD:
- List, view, create, edit, soft delete customers.
- Validation on all input fields.
- Profile image upload (stored under `storage` and shown in the UI).
- Search by customer name or email.
- Pagination (10 customers per page).
- CSV export of the customers list.

### Order module

- `orders` table linked to customers (`customer_id` foreign key).
- Fields include order number, amount, order date, status, and description.
- Full CRUD for orders.
- Validation for all fields on create/update.
- Status filter (e.g. Pending / Completed / Cancelled).
- Pagination (10 orders per page).
- CSV export of the orders list.

### Dashboard

- `/dashboard` shows:
- Total customers.
- Total orders.
- Total revenue.
- Recent 5 customers with name, email, and joined date.
- Dashboard text/sections differ for Admin vs Staff to highlight their permissions.

### Notifications

- When a new order is created, a notification is triggered using Laravel’s notification system.
- In local development `MAIL_MAILER=log`, so email notifications are written to the log instead of sending real emails (SMTP can be configured via `.env` if needed).

## Roles

**Admin**

- Full CRUD on customers and orders.
- Can delete records.
- Can export CSV.
- Sees admin-specific content on the dashboard.

**Staff**

- Can view/add/edit customers and orders.
- Restricted from certain destructive actions like delete.
- Sees staff-focused dashboard content.

## REST API (work in progress)

- Laravel Sanctum is installed to support token-based APIs.
- Initial API routes for customers are defined in `routes/api.php` and protected with `auth:sanctum`.
- Token endpoint and full API consumption are partially implemented and can be completed as future enhancement.