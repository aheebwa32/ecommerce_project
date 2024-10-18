# E-commerce Project - Group BSE24-26

This is an e-commerce platform built using Laravel. The platform includes essential features such as product browsing, cart management, and order processing. It also has an admin interface for managing products and orders.

---

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Introduction

The Laravel-based e-commerce project provides a complete shopping experience, integrating a front end and back end using Blade templates. It allows users to browse products, manage their shopping cart, and place orders. Additionally, an admin interface helps manage products and orders efficiently.

---

## Features

- User authentication and registration
- Product catalog with filtering
- Shopping cart management
- Order creation and tracking
- Admin dashboard for product and order management

---

## Technologies Used

- **Backend and Frontend**: Laravel 10
- **Database**: MySQL
- **Version Control**: GitHub
- **Server**: Apache (Localhost)
- **Mail Services**: Mailpit (SMTP)

---

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/aheebwa32/ecommerce_project-groupBSE24-26.git
    cd ecommerce_project-groupBSE24-26
    ```

2. **Install dependencies**:
    Make sure you have [Composer](https://getcomposer.org/) installed.
    ```bash
    composer install
    ```

3. **Set up the environment**:
    Copy the `.env.example` file to `.env` and update the environment variables.
    Example:
    ```bash
    cp .env.example .env
    ```

4. **Configure database**:
    Update the `.env` file with your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce_project
    DB_USERNAME=root
    DB_PASSWORD=root
    ```

5. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

6. **Run database migrations**:
    ```bash
    php artisan migrate
    ```

7. **Seed the database** (optional):
    ```bash
    php artisan db:seed
    ```

8. **Start the development server**:
    ```bash
    php artisan serve
    ```

---

## Project Structure

── app ├── config ├── database ├── public ├── resources ├── routes └── tests

yaml
Copy code

- **app/**: Core application logic, including models and controllers.
- **config/**: Application configuration files.
- **database/**: Migrations and seeders for the database.
- **resources/**: Blade templates and other front-end resources.
- **routes/**: API and web routes definitions.
- **tests/**: Unit and feature tests.

---

## Usage

Once installed, visit `http://localhost:8000` to view the homepage and interact with the platform. Admin functionality is accessible via the `/admin` route.

---

## API Documentation

APIs are available for managing products and orders. Example:

- **Get all products**: `GET /api/products`
- **Create an order**: `POST /api/orders`

For complete API documentation, refer to the `docs/` folder or use Postman.

---

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -m 'Add a feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Create a Pull Request.

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## Contact

For any questions or feedback, please contact:

- **Email**: your_email@example.com
- **GitHub**: [aheebwa32](https://github.com/aheebwa32)