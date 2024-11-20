# Acme Widget Basket 🛒

A simple yet robust shopping basket for Acme Widgets, built with PHP and Dockerized for ease of use. The basket supports adding products, applying offers, and calculating delivery charges based on dynamic rules.

---

## 🚀 Features
- **Product Catalogue**: Predefined products with pricing (e.g., Red, Green, and Blue Widgets).
- **Special Offers**: Apply dynamic offers such as "Buy one Red Widget, get the second one half price."
- **Delivery Charges**: Tiered delivery fees based on the order total.
- **Fully Dockerized**: Set up, run, and test the application seamlessly in a containerized environment.
- **Test Suite**: PHPUnit tests to validate functionality and ensure code quality.

---

## 🛠️ Prerequisites
Make sure you have the following installed:
- [Docker](https://www.docker.com/) (including Docker Compose)
- [Composer](https://getcomposer.org/) (optional, for local development)
- PHP 8.2 or higher (optional, for local development)

---

## 🐳 Getting Started with Docker

### 1. Clone the Repository
    git clone https://github.com/shekhar396/acme-widget-basket.git
    cd acme-widget-basket

### 2. Build the Docker Image
    docker-compose build

### 3. Start the Docker Containers
    docker-compose up -d

### 4. Run the Application
    docker-compose exec php php -S 0.0.0.0:8000 -t public/

### 5. Access the Application
    http://localhost:8000

### 6. Run the Test
    docker-compose exec php vendor/bin/phpunit tests/

## 💻 Running Locally (Without Docker)

### 1. Install Dependencies
    composer install

### 2. Serve the Application
    php -S 0.0.0.0:8000 -t public/

### 3. Access the Application
    http://localhost:8000
    
### 4. Run the Tests Locally
    vendor/bin/phpunit tests/






