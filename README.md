# My Futsal

**My Futsal** is a web-based futsal booking platform that allows users to book futsal courts online with ease. This project is built using Laravel for the backend and Tailwind CSS for the frontend, with additional UI libraries such as RippleUI and Flowbite. For payment processing, Midtrans is integrated to handle secure and seamless transactions. The admin panel is powered by **Filament**, providing an easy-to-use interface for managing bookings, users, and courts.

## Features

- **User Authentication**: Register, login, and manage user profiles.
- **Futsal Court Booking**: Real-time booking system for available futsal courts.
- **Payment Integration**: Secure payment gateway using Midtrans.
- **Admin Dashboard**: Manage bookings, users, court availability, and settings using Filament.
- **Responsive Design**: Optimized for both desktop and mobile experiences using Tailwind CSS.

## Tech Stack

### Backend
- **Laravel**: PHP framework used for backend development and RESTful API.

### Frontend
- **Tailwind CSS**: A utility-first CSS framework for designing responsive interfaces.
- **RippleUI**: A UI library built on top of Tailwind CSS for ready-to-use components.
- **Flowbite**: Tailwind CSS-based component library for interactive elements.

### Admin Panel
- **Filament**: A lightweight admin panel for managing your application's data, built with Laravel.

### Payment Integration
- **Midtrans**: Payment gateway for processing payments, supporting various payment methods such as credit cards, bank transfers, and e-wallets.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js & NPM/Yarn
- MySQL/MariaDB
- Midtrans Account (for payment gateway integration)

### Steps

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/my-futsal.git
    cd my-futsal
    ```

2. **Install backend dependencies**:
    ```bash
    composer install
    ```

3. **Install frontend dependencies**:
    ```bash
    npm install
    ```

4. **Set up environment variables**:
    - Create a `.env` file by copying the `.env.example`:
      ```bash
      cp .env.example .env
      ```
    - Configure the following values in `.env`:

      ```env
      APP_NAME=My Futsal
      APP_URL=http://localhost:8000

      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=myfutsal
      DB_USERNAME=root
      DB_PASSWORD=yourpassword

      MIDTRANS_SERVER_KEY=your_midtrans_server_key
      MIDTRANS_CLIENT_KEY=your_midtrans_client_key
      ```

5. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

6. **Run database migrations**:
    ```bash
    php artisan migrate
    ```

7. **Install Filament Admin Panel**:
    ```bash
    composer require filament/filament
    ```

8. **Install and build frontend assets**:
    ```bash
    npm run dev
    ```

9. **Start the development server**:
    ```bash
    php artisan serve
    ```

## Admin Panel Access

To access the admin panel powered by Filament, use the following URL after starting the server:

http://localhost:8000/admin


You can create an admin user by running:

```bash
php artisan make:filament-user
```
Follow the prompts to set up an admin account for accessing the panel.

