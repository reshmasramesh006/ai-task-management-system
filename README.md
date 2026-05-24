# AI Assisted Task Management System

## Project Overview

This project is a production-ready AI-assisted Task Management System built using Laravel 10 following clean architecture principles.

The application allows admins and users to manage tasks efficiently with AI-generated summaries and intelligent priority suggestions.

---

# Tech Stack

- Laravel 10
- PHP 8+
- MySQL
- Blade + Tailwind CSS
- Repository Pattern
- Service Layer Architecture
- REST APIs
- OpenAI / Mock AI Integration

---

# Architecture

This project follows clean architecture principles using:

- Repository Pattern
- Service Layer
- Policy-based Authorization
- Form Request Validation

Application Flow:

Controller
→ Service Layer
→ Repository Layer
→ Eloquent Model

---

# Folder Structure

app/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Resources/
├── Models/
├── Repositories/
│   ├── Contracts/
│   └── Eloquent/
├── Services/
├── Policies/
├── Enums/
└── Providers/

---

# Repository Pattern

All database operations are handled through repositories.

No direct Eloquent queries are used inside controllers.

Example:

TaskController
→ TaskService
→ TaskRepositoryInterface
→ TaskRepository

---

# Service Layer

## TaskService Responsibilities

- Business logic handling
- Database transactions
- Repository communication
- AI processing trigger

## AIService Responsibilities

- AI prompt creation
- AI API communication
- Response parsing
- Error handling
- Mock fallback support

---

# AI Prompt Example

Analyze the following task and generate:

1. Short summary
2. Suggested priority level

Task:
Title: Fix authentication bug
Description: Users cannot login after password reset.

---

# Features

- Authentication using Laravel Breeze
- Role-based access (Admin/User)
- Task CRUD operations
- AI-generated summaries
- AI-based priority suggestion
- Dashboard analytics
- REST APIs
- Responsive Tailwind UI
- Policy-based authorization
- Form Request validation

---

# Dashboard Analytics

- Total Tasks
- Completed Tasks
- Pending Tasks
- High Priority Tasks

---

# API Endpoints

| Method | Endpoint |
|--------|----------|
| GET | /api/tasks |
| POST | /api/tasks |
| PATCH | /api/tasks/{id}/status |
| GET | /api/tasks/{id}/ai-summary |

---

# Installation Steps

```bash
git clone https://github.com/reshmasramesh006/ai-task-management-system.git

cd ai-task-management-system

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

npm install

npm run build

php artisan serve