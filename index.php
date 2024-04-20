<?php
include 'database.php';
session_start();

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
  $stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();    
  } else {
    header("Location: login.php");
    exit();
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      text-align: center;
    }

    h1 {
      color: #333333;
      margin-bottom: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    h1 .icon {
      margin-right: 10px;
    }

    p {
      font-size: 16px;
      margin-bottom: 20px;
      color: #666666; /* Slightly darker gray */
    }

    a {
      color: #007bff; /* Blue color */
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #0056b3; /* Darker blue on hover */
    }
  </style>
</head>

<body>
  <div class="container">
    <h1><i class="fas fa-home icon"></i> Home Page</h1>

    <?php if(isset($user)): ?>
      <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged In.</p>
      <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
      <p><a href="login.php">Login</a> or <a href="signup.php">SignUp</a></p>
    <?php endif; ?>

  </div>
</body>

</html>
