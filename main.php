<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Products</a>
                <div class="dropdown-content">
                    <?php
                    // Database connection settings
                    $servername = "localhost";  
                    $username = "root";  
                    $password = "";  
                    $database = "BeautyBrand";  
                    
                    try {
                        // Create a new PDO instance
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                        
                        // Set PDO error mode to exception
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        // Fetch categories from the database
                        $query = "SELECT * FROM Category";
                        $stmt = $pdo->query($query);
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Display categories in the dropdown menu
                        foreach ($categories as $category) {
                            echo '<a href="#">' . $category['name'] . '</a>';
                        }
                    } catch (PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                    ?>
                </div>
            </li>
        </ul>
    </nav>

    <h1>Welcome to the Home Page</h1>
    
    <!-- Rest of your page content -->
</body>
</html>


