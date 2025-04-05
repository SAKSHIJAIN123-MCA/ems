# Event Planner

## Overview
Event Planner is a web-based application designed to help users create, manage, and attend events efficiently. The project utilizes HTML, CSS, and JavaScript for the frontend, PHP for the backend, and MySQL as the database.

## Features
- User authentication (registration & login)
- Create, edit, and delete events
- View upcoming events
- Admin panel for event management

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL

## Installation Guide
### Prerequisites
- XAMPP/WAMP for running Apache and MySQL
- PHP installed
- MySQL Database

### Steps to Install
1. Clone the repository or download the project files.
   ```bash
   git clone https://github.com/yourusername/ems.git
   ```
2. Move the project folder to the `htdocs` directory (if using XAMPP) or the `www` directory (if using WAMP).
3. Start Apache and MySQL from XAMPP/WAMP control panel.
4. Import the database:
   - Open phpMyAdmin (`http://localhost/phpmyadmin/`).
   - Create a new database named `admin`.
   - Import the `admin.sql` file from the project directory.
5. Configure the database connection in `config.php`:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "admin";
   ```
6. Open the browser and go to:
   ```
   http://localhost/ems/
   ```

## Usage
- **Sign Up/Login:** Users can register and log in.
- **Create Events:** Users can add new events with details.
- **Manage Events:** Edit or delete created events.
- **Admin Panel:** Admin users can manage all events.

 ## 📸 EMS Screenshots
 
### 🏠 Home EMS Page 2
![Home EMS](https://github.com/SAKSHIJAIN123-MCA/ems/blob/main/event%20management%20system/admin/image/homeems.jpg?raw=true)

### 🏠 Home EMS Page 2
![Home EMS 2](https://github.com/SAKSHIJAIN123-MCA/event%20management%20system/blob/main/admin/image/homeems2.jpg?raw=true)

### 📅 Book Event Page
![Book Event](admin/image/bookevent.jpg)

### 🎉 Events Page 1
![Events Page 1](https://github.com/SAKSHIJAIN123-MCA/event%20management%20system/blob/main/admin/image/events.jpg?raw=true)

### 🎉 Events Page 2
![Events Page 2](https://github.com/SAKSHIJAIN123-MCA/event%20management%20system/blob/main/admin/image/events2.jpg?raw=true)

## Contact
For any questions or suggestions, please contact sakshijainmorena@gmail.com


