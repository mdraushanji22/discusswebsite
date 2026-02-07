# Discuss Website - Q&A Forum

A simple Q&A forum built with PHP, MySQL, and Bootstrap. Users can register, log in, ask questions, answer questions, and browse content by categories.

## Features

### Authentication
- User registration with username, email, password, and address
- Secure login system with session management
- User logout functionality

### Question Management
- Ask new questions with titles and descriptions
- View all questions on the main page
- View detailed question pages with answers
- Delete own questions (when logged in as the question owner)

### Category Management
- Browse questions by categories
- View all categories on the sidebar
- Filter questions by specific categories

### Answer Management
- Submit answers to questions
- View all answers for a specific question

## How to Run the Project

### Prerequisites
- XAMPP installed (Apache, MySQL, PHP)
- Web browser

### Installation Steps

1. **Clone or copy the project:**
   ```
   Copy the entire project folder to your XAMPP htdocs directory
   ```

2. **Start XAMPP services:**
   - Open XAMPP Control Panel
   - Start Apache and MySQL services

3. **Set up the database:**
   - Go to phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `discusswebsite`
   - Import the database schema (if you have a .sql file) or manually create the following tables:

   **users table:**
   ```sql
   CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `username` varchar(255) NOT NULL,
     `email` varchar(255) NOT NULL,
     `password` varchar(255) NOT NULL,
     `address` text,
     PRIMARY KEY (`id`)
   );
   ```

   **questions table:**
   ```sql
   CREATE TABLE `questions` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `title` varchar(255) NOT NULL,
     `description` text NOT NULL,
     `category_id` int(11) DEFAULT NULL,
     `user_id` int(11) DEFAULT NULL,
     PRIMARY KEY (`id`)
   );
   ```

   **answers table:**
   ```sql
   CREATE TABLE `answers` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `answer` text NOT NULL,
     `question_id` int(11) NOT NULL,
     `user_id` int(11) NOT NULL,
     PRIMARY KEY (`id`)
   );
   ```

   **category table:**
   ```sql
   CREATE TABLE `category` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `name` varchar(255) NOT NULL,
     PRIMARY KEY (`id`)
   );
   ```

4. **Configure the database connection:**
   - Make sure your `common/db.php` file has the correct database credentials

5. **Access the application:**
   - Open your browser and navigate to `http://localhost/discusswebsite`

## Project Structure

```
discusswebsite/
├── client/                 # Client-side files
│   ├── Category.php       # Category dropdown component
│   ├── Login.php          # Login form
│   ├── SignUp.php         # Registration form
│   ├── answers.php        # Answers display component
│   ├── ask.php            # Ask question form
│   ├── categorylist.php   # Category list component
│   ├── commonFiles.php    # Common CSS/JS includes
│   ├── header.php         # Navigation header
│   ├── question-details.php # Question details page
│   └── questions.php      # Questions listing page
├── common/                # Common utilities
│   └── db.php            # Database connection
├── public/                # Public assets
│   ├── logo.png          # Website logo
│   └── style.css         # Custom styles
├── server/                # Server-side processing
│   └── requests.php      # Form processing and API endpoints
├── index.php              # Main entry point
└── README.md             # This file
```

## Screenshots

<!-- Add your screenshots here -->
![Screenshot 1](screenshots/screenshot1.png)
![Screenshot 2](screenshots/screenshot2.png)
![Screenshot 3](screenshots/screenshot3.png)

*(Note: Create a 'screenshots' folder in your project root and add your actual screenshots)*

## Security Features

- Session-based authentication
- Prepared statements to prevent SQL injection (in updated version)
- Input sanitization
- Proper access controls

## Technologies Used

- PHP (Backend)
- MySQL (Database)
- HTML/CSS (Frontend)
- Bootstrap (UI Framework)
- JavaScript (Client-side functionality)

## Possible Enhancements

- Add user profiles and avatars
- Implement search functionality
- Add question tagging system
- Implement voting/rating system
- Add admin panel for moderation
- Add email notifications
- Implement pagination for questions
- Add rich text editor for questions and answers

## Troubleshooting

If you encounter any issues:
1. Ensure XAMPP services (Apache and MySQL) are running
2. Check that the database is properly configured
3. Verify file permissions
4. Check PHP error logs for specific error messages
