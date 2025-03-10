Hostel Management System
This is a simple Hostel Management System built using PHP and MySQL. It allows users to retrieve student details from a database using a command-based input system.

Features
Retrieve student details by entering a specific command.
Displays results in a tabular format.
Provides an interactive form for users to query the database.
Simple and easy-to-use UI with CSS styling.
Uses MySQL database for storing hostel student data.
Technologies Used
Frontend: HTML, CSS
Backend: PHP
Database: MySQL
Installation & Setup
Prerequisites
PHP (version 7 or later)
MySQL Server
Apache (or any local server like XAMPP, WAMP)
Steps
Clone the repository:

sh
Copy
Edit
git clone https://github.com/your-username/hostel-management-system.git
cd hostel-management-system
Import the database:

Open phpMyAdmin or any MySQL client.
Create a database named hostel management.
Import the hostel_management.sql file (if available).
Configure database connection:

Open index.php and locate:
php
Copy
Edit
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$dbname = 'hostel management';
Update database credentials if needed.
Start the server:

If using XAMPP, place the project in the htdocs folder and start Apache and MySQL.
Access the project in a browser:
perl
Copy
Edit
http://localhost/hostel-management-system/
Usage
Enter a command in the input field.
Example commands:
css
Copy
Edit
Display Name
Display RollNo
Click Submit to retrieve data from the database.
Troubleshooting
Database Connection Failed: Check if MySQL is running and credentials are correct.
No Records Found: Ensure the database has student data.
Invalid Command Error: Use the correct format (Display ColumnName).
License
This project is open-source and available under the MIT License.
