# Task Manager - MVC PHP Application

## Introduction

Welcome to the Task Manager, a simple web application built using the Model-View-Controller (MVC) architecture in PHP, enhanced with CSS for styling and Ajax for seamless interaction. This application allows users to manage their tasks efficiently, providing a user-friendly interface for adding, editing, and deleting tasks.

## Features

1. **User Authentication:** Users can register and log in securely to manage their tasks. 🔐

2. **Task Management:**
   - Add tasks with details such as title, description, and due date. 📝
   - Edit existing tasks to update information. ✏️
   - Delete tasks when they are no longer needed. 🗑️

3. **Responsive Design:** The application is designed to work seamlessly across various devices, ensuring a consistent experience for users. 📱

4. **Ajax Integration:** Tasks can be added, edited, and deleted without reloading the entire page, providing a smooth and dynamic user experience. 🔄

## Installation

1. Clone the repository to your local machine

2. Configure your web server to point to the `public` directory as the root.

3. Import the database schema from the `database.sql` file into your MySQL database.

4. Copy the `config/config.example.php` file to `config/config.php` and update the database connection details.

5. Open the application in your web browser.

## Technologies Used

- **PHP:** The backend logic and server-side scripting are implemented in PHP. 🐘

- **MySQL:** Database management is handled using MySQL to store task-related information. 🛢️

- **HTML and CSS:** The frontend structure and styling are implemented using HTML and CSS to provide an intuitive user interface. 🎨

- **Ajax:** Asynchronous JavaScript and XML are used to update the content dynamically without reloading the entire page. 🌐

## MVC Structure

The application follows the MVC architecture for better organization and separation of concerns:

- **Model:** Manages the data and database interactions.
  
- **View:** Represents the user interface and displays information to the user.
  
- **Controller:** Handles user input, processes requests, and interacts with the model to update the data.


## Acknowledgments

- The Task Manager was inspired by the need for a simple yet effective task management solution.
  
- Special thanks to the PHP, MySQL, and Ajax communities for their valuable contributions.

Feel free to explore, use, and contribute to make the Task Manager even better! 🚀
