
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./eye.css">
    <link rel="stylesheet" href="./home.css">
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Dancing+Script"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600&family=Barlow:wght@100&family=Delicious+Handrawn&family=Fjalla+One&family=Heebo:wght@100;200&family=Montserrat:ital@1&family=Mukta:wght@200&family=Nunito+Sans:wght@300&family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Passion+One&family=Pathway+Extreme:wght@200&family=Playfair+Display&family=Titillium+Web:ital,wght@1,200&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            flex-direction: column;
        }
        
        form {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            border: 1px solid #ccc;
            padding: 5px;
            width: 100%;
            margin-bottom: 20px;
        }
        
        input[type="submit"] {
            background: black;
            color: white;
            border: 1px solid black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>
