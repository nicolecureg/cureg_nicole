<?php
include 'database.php';
$is_invalid = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // $is_invalid = true;
//   } else {
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();

    if($user) {
        // Debugging output
        var_dump($password); // Check the password entered by the user
        var_dump($user['password_hash']);
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();
            header("Location: index.php");
            exit();
        } else {
            $is_invalid = true;
            $message = "Incorrect Password";
        }
    } else {
        $is_invalid = true;
        $message = "Email not found";
    }   
}


// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
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
      text-align: center; /* Center align text */
    }

    h1 {
      color: #333333;
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="email"],
    input[type="password"] {
      width: calc(100% - 30px); /* Adjusted width to match sign-up page */
      padding: 15px;
      margin-bottom: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      background-color: #f5f5f5; /* Light gray background */
      font-size: 16px;
      transition: border-color 0.3s ease;
      outline: none;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #4CAF50; /* Green border on focus */
    }

    input[type="password"]::placeholder,
    input[type="email"]::placeholder {
      color: #999999; /* Light gray placeholder text */
    }

    .input-icon {
      position: relative;
      width: 100%; /* Ensure input fields and icons are centered */
    }

    .input-icon i {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #999999; /* Light gray icon color */
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
    <h1>Login Page</h1>
    <?php if ($is_invalid) : ?>
      <p class="error-message">Invalid Email or Password</p>
    <?php endif; ?>
    <form method="post">
      <div class="input-icon">
        <input autocomplete="off" type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <i class="far fa-envelope"></i> <!-- Email icon -->
      </div>
      <div class="input-icon">
        <input autocomplete="off" type="password" placeholder="Password" name="password" id="password">
        <i class="fas fa-lock"></i> <!-- Lock icon -->
      </div>
      <button type="submit">Login</button>
    </form>
    <div class="footer">
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</body>

</html>
