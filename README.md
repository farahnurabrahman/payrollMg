# 💸 Payroll Management System

[![Laravel Version](https://shields.io)](https://laravel.com)
[![License: MIT](https://shields.io)](https://opensource.org)

A robust, enterprise-ready payroll solution built with Laravel. Features automated payslip generation, real-time data filtering, and high-performance reporting.

---

## ✨ Key Features

*   📊 **Smart DataTables** - Server-side optimized for fast loading.
*   📄 **One-Click PDF** - Professional payslip generation via `domPDF`.
*   🖥️ **SB-Admin-2 Dashboard** - Clean, responsive UI for HR management.
*   🚀 **Performance** - Eager loading to prevent N+1 query issues.
*   🏗️ **SQL Server Integration** - Configured specifically for MSSQL environments.

---

## 🛠 Installation & Setup

### 1. Requirements
* **PHP:** 8.1 or 8.2
* **Laravel Framework:** 10.28.0
* **Database:** SQL Server (sqlsrv)

### 2. Initial Setup Steps
```bash
# 1. Clone the repository
git clone <your-repo-url>
cd <project-folder>

# 2. Install PHP dependencies
composer install

# 3. Create environment file
cp .env.example .env

# 4. Generate security key
php artisan key:generate
```

### 3. Database Configuration (SQL Server)
Update your `.env` file with your local credentials. Ensure `config/database.php` matches these settings:

```env
DB_CONNECTION=sqlsrv
DB_HOST=LAPTOP-STSQO10U\SQLE2014
DB_PORT=1433
DB_DATABASE=payrollManagement
DB_USERNAME=
DB_PASSWORD=
```

---

## 🔐 Demo Credentials


| Role | Username | Password |
| :--- | :--- | :--- |
| **Administrator** | `admin@gmail.com` | `password` |

### 🚀 Finalizing & Running
Run these commands to finish the setup and start the application:

```bash
# 5. Database Setup (Ensure SQL Server is running)
# This will wipe the DB, run migrations, and create the admin user
php artisan migrate:fresh --seed

# 6. Start the local server
php artisan serve
```
> [!TIP]
> Visit the app at: **http://127.0.0.1:8000**

---

## 📁 Tech Stack

*   **Backend:** Laravel 10.28
*   **Frontend:** Bootstrap 4 (SB Admin 2)
*   **Database:** SQL Server (MSSQL)
*   **PDF Engine:** DomPDF

---

## 🛠️ Troubleshooting

### 1. SQL Server Connection Issues
*   **Error:** `could not find driver` - Enable `php_sqlsrv` and `php_pdo_sqlsrv` in your `php.ini`.
*   **Error:** `SSL Provider... certificate chain not trusted.` - Set `'trust_server_certificate' => true` in `config/database.php`.

### 2. PDF Rendering Issues
*   **Error:** `Attempted to lazy load [relationship]` - Use `with()` in your controller queries.

### 3. Configuration Changes Not Reflecting
*   **Fix:** Run `php artisan config:clear` after editing your `.env`.

---
**Developed by Farah AR** ✨