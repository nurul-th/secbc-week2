# Product API – Laravel & PostgreSQL

This project is a RESTful Product API developed using **Laravel** and **PostgreSQL** as part of a backend assignment.

The API supports basic CRUD operations and returns JSON responses with proper HTTP status codes.

---

## Tech Stack
- PHP 8+
- Laravel
- PostgreSQL
- Laravel Herd
- Bruno (API Testing)

---

## Features
- List all products
- Create a product
- Update a product
- Delete a product
- JSON responses only
- Input validation
- Proper HTTP status codes

---

## API Endpoints

| Method | Endpoint | Description |
|------|--------|------------|
| GET | /api/products | Retrieve all products |
| POST | /api/products | Create a new product |
| PUT | /api/products/{id} | Update a product |
| DELETE | /api/products/{id} | Delete a product |

---

## Setup Instructions

### Clone Repository
git clone <your-github-repository-url>
cd products

### Install Dependencies
composer install

### Environment Configuration
cp .env.example .env

DB_DATABASE=products_db
DB_USERNAME=postgres
DB_PASSWORD=your_password

### Generate Application Key
php artisan key:generate

### Run Database Migration
php artisan migrate

### Run Application
http://localhost:8000

## API Testing

- All API endpoints were tested using Bruno.
- Screenshots of the following requests are included in the screenshots/ folder:
- GET products
- POST product
- PUT product
- DELETE product

## HTTP Status Codes Used

200 – Success
201 – Resource created
404 – Resource not found
422 – Validation error

## Notes

- All responses are returned in JSON format.
- Validation is implemented for create and update requests.
- Missing resources return a 404 response.

## Author
nurul-th
