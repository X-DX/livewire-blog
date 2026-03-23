## Modern, production-ready blog application from scratch using Laravel 12 and Livewire 4

This project focused on building a modern, production-ready blog application from scratch using Laravel 12 and Livewire 4. Unlike a simple CRUD tutorial, this project aims to create a multi-user platform with a sophisticated role-based access control (RBAC) system.

### The key aspects of the project include:

1. User Roles & Permissions: The application features four distinct roles: Admins (full access), Editors (manage all posts), Authors (manage only their own posts), and Subscribers (read and comment). This system is implemented using the industry-standard Spatie Laravel Permission package.
2. Modern Tech Stack: It utilizes the latest tools, including Tailwind CSS and the Flux UI component library, which are part of the new Laravel 12 Livewire starter kit.
3. Livewire 4 Features: The project explores new Livewire 4 capabilities, such as:
    - New Component Formats: Demonstrating single-file components (PHP and Blade in one file), multi-file components, and traditional class-based components.
    - Islands: Creating isolated regions within components that update independently.
    - Animations: Using the wire:transition directive for hardware-accelerated animations via the browser's View Transitions API
4. Built-in Authentication: Instead of building from scratch, the project leverages Laravel 12’s starter kits to provide functional login, registration, password resets, and email verification
5. Core Blog Features: The series covers the creation of essential blog components, such as a post list and a create post form, while emphasizing "snappy" performance through features like wire:model.live

### Tech Stack

1. Core Framework: Laravel 12, utilizing its new application starter kits
2. Frontend Framework: Livewire 4, which introduces features like single-file components (coexisting PHP and Blade), multi-file components, and "islands" for independent updates
3. Styling & UI: Tailwind CSS and the Flux UI component library, both of which are integrated into the Laravel 12 Livewire starter kit
4. Authentication: Laravel's built-in authentication system, providing functional login, registration, password reset, and email verification out of the box
5. Roles & Permissions: Spatie Laravel Permission package, an industry-standard tool used to manage user roles (Admin, Editor, Author, Subscriber) and their respective capabilities
6. Database: MySQL, which stores the user data, roles, permissions, and blog posts
7. Animations: The View Transitions API via Livewire's wire:transition directive for hardware-accelerated animations
8. Development Tools: The project uses VS Code as the text editor and leverages the starter kit's built-in testing workflows and development server commands

### Day 1 ( Project Setup - Roles & Permissions with Spatie )

1. Project Initialization and Setup:
    - Updated the Laravel installer by running composer global require laravel/installer.
    - Created a new Laravel 12 project using the Livewire starter kit.
    - Configured the project during installation by selecting the default Laravel authentication and the Livewire starter kit.
    - Opened the project in VS Code
2. Database and Authentication Configuration:
    - Updated the .env file to use the MySQL driver
    - Ran the initial database migrations to set up the authentication tables (users, password resets, etc.) provided by the starter kit.
3. Role-Based Access Control (RBAC) Setup:
    - Installed the Spatie Laravel Permission package via Composer
    - Published the package's migration and configuration files
    - Ran migrations to create the roles, permissions, and pivot tables
    - Updated the User model by adding the HasRoles trait to enable permission methods like assignRole and hasPermissionTo
4. Models and Data Seeding:
    - Created the Post model and its corresponding migration file to define the blog post structure
    - Created and ran a Database Seeder to initialize four roles: Admin, Editor, Author, and Subscriber
5. Livewire 4 Component Exploration:
    - Created a Single File Component (SFC) where PHP logic and Blade templates coexist in one file
    - Created a Multi-file Component (MFC) after publishing the Livewire configuration file and tweaking the namespace to avoid conflicts with the starter kit
    - Created a traditional Class-based Component consisting of a PHP class and a separate Blade file
6. Application Testing:
    - Started the development server to run the application, queue, and logs simultaneously
    - Verified the setup by registering a new account on the local server to confirm the authentication and dashboard layouts were working correctly
