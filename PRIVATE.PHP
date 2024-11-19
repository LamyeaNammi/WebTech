<?php
$token = "";
$token2 = "";
session_start();

// Define an array of books (this could come from a database in a real application)
$books = [
    "The Catcher in the Rye",
    "To Kill a Mockingbird",
    "1984",
    "Pride and Prejudice",
    "The Great Gatsby",
    "Moby Dick"
];

if (isset($_SESSION["uname"])) {
    echo "Hello, you are now logged in"."<br>";
    $token = "signout.php";
    $token2 = "Sign Out";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .profile {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .profile p {
            font-size: 18px;
        }
        .profile b {
            color: red;
            font-size: 20px;
        }
        .profile img {
            margin-top: 15px;
            border-radius: 8px;
        }
        .book-list {
            margin-top: 20px;
            text-align: left;
        }
        .book-list h3 {
            color: #333;
        }
        .book-list ul {
            list-style-type: none;
            padding: 0;
        }
        .book-list ul li {
            padding: 10px;
            border: 1px solid #ccc;
            margin: 5px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .book-list ul li:hover {
            background-color: #f1f1f1;
        }
        .nav-links {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .nav-links a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 10px 15px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav-links a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="profile">
        <p>
            <?php
            if (isset($_SESSION["uname"])) {
                echo "Username: <b>".$_SESSION["uname"]."</b><br>";
                echo "<br>Your Profile Pic:<br>";
                echo "<img src=\"https://media.gcflearnfree.org/content/5ef2084faaf0ac46dc9c10be_06_23_2020/box_model.png\" width=\"250\">";
            }
            ?>
        </p>

        <!-- Display the list of books -->
        <div class="book-list">
            <h3>Available Books:</h3>
            <ul>
                <?php
                foreach ($books as $book) {
                    echo "<li>$book <a href='#' style='float: right;'>Borrow</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="<?php echo $token; ?>"><?php echo $token2; ?></a>
    </div>
</body>
</html>
