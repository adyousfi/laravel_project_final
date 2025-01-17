
# Referee Shop
 
This is a Laravel-based project built to meet the requirements of a dynamic data-driven website. The website serves as an online shop specifically tailored for referees, created by a referee, providing a comprehensive platform for purchasing essential referee gear.
 
## Table of Contents
 
- [Project Description](#project-description)
- [Features](#features)
  - [Functional Requirements](#functional-requirements)
  - [Additional Features](#additional-features)
- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Steps to Install Locally](#steps-to-install-locally)
  - [Running the Application](#running-the-application)
- [Usage](#usage)
- [License](#license)
- [Acknowledgements](#acknowledgements)
 
## Project Description
 
This project serves as a dynamic e-commerce website designed for referees to:
- Browse and purchase professional referee equipment.
- View news, FAQs, and contact information.
- Admins can manage content such as products, news, FAQs, and user roles.
- Implement a secure login system with multiple roles (Admin and User).
 
## Features
 
### Functional Requirements
 
1. **Login System**
   - Users can register and log in.
   - Role-based access:
     - Admins can promote/demote users to/from admin roles.
     - Admins can create users manually.
   - "Remember Me" and password reset functionality included.
 
2. **User Profiles**
   - Publicly accessible profile pages for each user.
   - Editable user data for logged-in users.
   - Profile fields include:
     - Username
     - Birthday
     - Profile photo (stored securely on the server)
     - "About Me" text.
 
   **To access a public profile:** Navigate to profiles and there you can find all the profiles.
 

3. **News Management**
   - Admins can create, edit, and delete news items.
   - Visitors can view news and detailed content.
   - News items include:
     - Title
     - Image
     - Content
     - Publication date.
 
4. **FAQ Section**
   - FAQs grouped by category.
   - Admins can manage categories, questions, and answers.
   - Publicly viewable by all visitors.
 
5. **Contact Page**
   - Visitors can submit a contact form.
   - Admins receive and manage submitted forms directly.
 
### Additional Features
 
- Admins have access to an overview of all submitted contact forms via an admin panel and can reply to messages directly through the panel.
- Users can leave comments on news items.
- Users can post messages on another user's profile or send private messages to other users.
 
## Installation
 
### Prerequisites
 
Ensure the following software is installed on your system:
- **PHP** >= 8.1
- **Composer**
- **Node.js** (LTS version recommended)
- **NPM** or **Yarn**
- A web server such as Apache or Nginx
- A database server such as MySQL or PostgreSQL
 
### Steps to Install Locally
## Clone the repository:
 
  git clone: https://github.com/adyousfi/laravel_project_final.git
 
## Install PHP dependencies using Composer:
  composer install
## Install JavaScript dependencies using NPM or Yarn:
 
  npm install
## Copy the .env file:
 
  cp .env.example .env
## Configure the .env file with your database credentials:
 
Open the .env file and modify the following lines:
```bash
DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel_project
# DB_USERNAME=root
# DB_PASSWORD=
  ````
## Generate the application key:
 
 
php artisan key:generate
 
7.**Run database migrations and seed the database:**
 
php artisan migrate --seed
 
8.**Compile front-end assets:**
 
 
npm run dev
 
# Running the Application
 
1.**Start the development server:**
 
 
php artisan serve
 
2.**Access the application at http://localhost:8000.**
 
# Usage
 
Log in as the default admin using:
 
Email: **admin@ehb.be**
 
Password: **Password!321**
 
Explore the features, such as managing news, FAQs, and contact forms.
 
# License
 
This project is open-source and licensed under the MIT License. See the LICENSE file for details.
 
### Acknowledgements


- [Laravel Documentation](https://laravel.com/docs) – for guidance on using the Laravel framework.
- [OpenAI](https://openai.com) – for assistance and support during development.
- [Dark Admin Bootstrap 4 Template](https://www.templateshub.net/template/Dark-Admin-Bootstrap-4-PREMIUM-Free-Download) – for providing the admin page design template.
- [Dark Admin Template Implementation in Laravel by @WebTechKnowledge](https://www.youtube.com/watch?v=34OveOMX6K0&list=PLm8sgxwSZofdmlPxaDB7fRLv_NVe2uFKl&index=4) – for demonstrating how to implement the Dark Admin Bootstrap 4 Template into a Laravel project.
- [HTML Template and Tutorial by @WebTechKnowledge](https://www.youtube.com/watch?v=oiAlDjARrOU&list=PLm8sgxwSZofdmlPxaDB7fRLv_NVe2uFKl&index=3) – for the HTML template used on the homepage and guidance on integrating it into a Laravel project.





 

 
 
