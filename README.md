# Portfolio with CMS Features

This is a personal portfolio project built with a Content Management System (CMS) to manage and showcase your work. The project is developed using Laravel, Tailwind CSS, Inertia.js, and Vue.js, and it is containerized using Docker for seamless local development.

## Features

- **CMS for Portfolio Management**: Easily add, update, and delete portfolio items through an admin interface.
- **Dynamic Routing**: Routes are managed using Laravel and Inertia.js, providing a seamless single-page application experience.
- **Responsive Design**: Built with Tailwind CSS to ensure the portfolio is fully responsive and optimized for different devices.
- **Component-Based Architecture**: The front-end is developed using Vue.js components, enabling reusable and maintainable code.
- **Dockerized Environment**: The project includes a Docker setup for easy local development, ensuring consistency across different environments.

## Tech Stack

- **Laravel**: Backend framework for handling routing, controllers, and database interactions.
- **Inertia.js**: Middleware for creating single-page applications using Laravel and Vue.js.
- **Vue.js**: Front-end framework for building interactive user interfaces.
- **Tailwind CSS**: Utility-first CSS framework for styling the application.
- **Docker**: Containerization tool for creating a consistent development environment.

## Prerequisites

Before you begin, ensure you have the following installed:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Node.js](https://nodejs.org/) and npm

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/DannJohnrem/laravel-portfolio-2024.git
    cd laravel-portfolio-2024
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Set up environment variables**:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database and other configuration details.

4. **Build and start the Docker containers**:
    ```bash
    ./vendor/bin/sail up -d
    ```
    or
   
    ```bash
    ./vendor/bin/sail up
    ```

6. **Run migrations and seeders**:
    ```bash
    php artisan migrate --seed
    ```
    or
    ```bash
    sail artisan migrate --seed
    ```

8. **Compile the front-end assets**:
    ```bash
    npm run dev
    ```

9. **Access the application**:
    Open your browser and navigate to `http://localhost` to view your portfolio.

## Usage

- **Admin Panel**: Access the admin panel by navigating to `http://localhost/admin`. Use the CMS features to manage your portfolio items.
- **Front-End**: The front-end displays your portfolio with all the items managed through the CMS.

## Deployment

To deploy the application, follow the standard deployment practices for Laravel applications. Ensure the production server meets the Laravel requirements and set up the environment variables accordingly.

## Contributing

If you'd like to contribute to this project, please fork the repository and submit a pull request. We welcome all contributions!

## License

This project is open-source and available under the [MIT License](LICENSE).
