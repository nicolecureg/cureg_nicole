<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f0f0; /* Soft pastel shade */
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #ffffff;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .header h1 {
      margin: 0;
      font-weight: 600;
    }
    .nav-links a {
      color: #007bff; /* Blue color */
      text-decoration: none;
      margin-left: 20px;
      transition: color 0.3s ease;
    }
    .nav-links a:hover {
      color: #0056b3; /* Darker blue on hover */
    }
    .container {
      width: 400px;
      margin: 50px auto;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
    }
    h1 {
      text-align: center;
      color: #333333;
      margin-bottom: 30px;
    }
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f5f5f5; /* Light gray background */
      font-size: 16px;
      transition: border-color 0.3s ease;
      outline: none;
    }
    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
      border-color: #4CAF50; /* Green border on focus */
    }
    input[type="password"]::placeholder, input[type="email"]::placeholder, input[type="text"]::placeholder {
      color: #999999; /* Light gray placeholder text */
    }
    button {
      width: 100%;
      padding: 15px;
      background-color: #007bff; /* Blue color */
      color: #ffffff;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
    }
    button:hover {
      background-color: #0056b3; /* Darker blue on hover */
    }
    .error-message {
      color: #ff0000;
      font-size: 14px;
      margin-top: 5px;
      text-align: center;
    }
    .footer {
      text-align: center;
      margin-top: 20px;
    }
    .footer a {
      color: #007bff; /* Blue color */
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .footer a:hover {
      color: #0056b3; /* Darker blue on hover */
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Website</h1>
    <div class="nav-links">
      <a href="index.php">Home</a>
    </div>
  </div>

  <div class="container">
    <h1>Sign Up</h1>
    <form action="process_signup.php" method="POST" novalidate>
      <input autocomplete="off" type="text" placeholder="Your Name" name="username" required>
      <input autocomplete="off" type="email" placeholder="Your Email" name="email" required>
      <input autocomplete="off" type="password" placeholder="Create a Password" id="password" name="password" required>
      <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
      <button type="submit">Sign Up</button>
      <div class="links">
        <span>Already have an account? </span><a href="login.php">Login here</a>
      </div>
    </form>
  </div>
</body>
</html>
