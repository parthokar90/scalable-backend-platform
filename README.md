### Scalable Backend Platform

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

### Project Overview

**Scalable Backend Platform** is a professional, modular, and production-ready backend system built with **Laravel 12**.  
It follows **clean architecture** with **Controller → Service → Repository → API Resource** pattern for maintainable and scalable development.  

This project is designed for:

- Rapid development of SaaS products or enterprise APIs  
- Recruiter/ATS-friendly portfolio showcasing senior backend skills  
- Best practices in Laravel, API design, and clean code

---

### Features

- **User Module** (CRUD)  
- **API Resource** responses for standardized JSON  
- **FormRequest Validation** for input sanitization  
- **Sanctum Authentication** (token-based API auth)  
- **API Versioning** (`v1`)  
- **Pagination & Search Filter** for user listing  
- **Service + Repository Pattern** (Separation of concerns)  
- **Unit & Feature Test Ready**

---

### Tech Stack

- PHP 8.2  
- Laravel 12.x  
- MySQL / MariaDB  
- Laravel Sanctum (API Authentication)  
- GitHub Actions (optional for CI/CD)  

---

### Folder Structure
app/
├── Http/
│ ├── Controllers/Api/V1/UserController.php
│ └── Resources/UserResource.php
├── Services/UserService.php
├── Repositories/
│ ├── Contracts/UserRepositoryInterface.php
│ └── UserRepository.php
└── Models/User.php

routes/
└── api.php


---

### API Endpoints (v1)

| Method | Endpoint           | Description                    |
|--------|------------------|--------------------------------|
| GET    | /api/v1/users      | List users (pagination & search) |
| POST   | /api/v1/users      | Create new user                |
| GET    | /api/v1/users/{id} | Get single user by ID          |
| PUT    | /api/v1/users/{id} | Update user by ID             |
| DELETE | /api/v1/users/{id} | Delete user by ID             |

**Query Params:**

- `search` → filter by name/email  
- `per_page` → customize pagination

---

### Authentication

- Token-based API authentication using **Laravel Sanctum**  
- Protect routes using `auth:sanctum` middleware  

**Example:**  

```bash
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
});
```

### Clone the repo
```bash
git clone git@github.com:parthokar90/scalable-backend-platform.git
cd scalable-backend-platform
```

### Install dependencies
```bash
composer install
```

### Copy env file
```bash
cp .env.example .env
```

### Generate app key
```bash
php artisan key:generate
```

### Set up database in .env
```bash
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

#### Run migrations
```bash
php artisan migrate
```

### Start dev server
```bash
php artisan serve
```

### Testing
```bash
php artisan test
```


