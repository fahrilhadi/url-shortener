# URL Shortener App

A **lightweight URL shortening application** built with **Laravel 12** and **TailwindCSS**. This project allows users to **convert long URLs into short links**, **manage generated links**, and **redirect seamlessly** using a clean and responsive UI.

## Screenshots

**Index Page (Empty State — No Links Yet)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/3284342c-04a9-4eb5-8499-1820d05d6056" /><br>

**Index Page (With Links)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/942d0191-0ae6-464b-b853-e378dff57bd8" /><br>

**Create Link**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/b5b6364a-7cf3-4492-89c6-8b01c764c3ae" /><br>

**Delete Confirmation**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/7d30e8f8-be01-4828-9670-30713bcc59d7" /><br>

## Tech Stack

- **Backend:** Laravel 12  
- **Frontend:** Blade Templates + TailwindCSS  
- **Database:** MySQL 
- **Version Control:** GitHub  

## Quick Start

```bash
# Clone repository
git clone https://github.com/fahrilhadi/url-shortener.git
cd url-shortener

# Install dependencies
composer install
npm install
npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Serve application
php artisan serve
