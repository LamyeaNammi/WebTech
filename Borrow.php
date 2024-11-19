<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Borrowing System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .books img {
            width: 104px;
            height: 142px;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .books {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .books label {
            display: block;
            text-align: center;
            margin-bottom: 5px;
        }
        .book-option {
            display: inline-block;
            width: 150px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Book Borrowing System</h1>

    <form action="process.php" method="post">
        <div class="books">
            <div class="book-option">
                <img src="Book 1.png" alt="Philosopher's Stone">
                <label for="Philosopher">Philosopher's Stone</label>
                <input type="radio" id="Philosopher" name="book" value="Philosopher's Stone">
            </div>
            
            <div class="book-option">
                <img src="Book 2.AVIF" alt="ABDF">
                <label for="ABDF">ABDF</label>
                <input type="radio" id="ABDF" name="book" value="ABDF">
            </div>

            <div class="book-option">
                <img src="Book 3.AVIF" alt="Thrones">
                <label for="Thrones">Thrones</label>
                <input type="radio" id="Thrones" name="book" value="Thrones">
            </div>

            <div class="book-option">
                <img src="Book 4.AVIF" alt="Fire">
                <label for="Fire">Fire</label>
                <input type="radio" id="Fire" name="book" value="Fire">
            </div>

            <div class="book-option">
                <img src="Book 3.AVIF" alt="ok">
                <label for="ok">ok</label>
                <input type="radio" id="ok" name="book" value="ok">
            </div>

            <div class="book-option">
                <img src="Book 4.AVIF" alt="Goblet">
                <label for="Goblet">Goblet</label>
                <input type="radio" id="Goblet" name="book" value="Goblet">
            </div>
        </div>

        <label for="studentname">Student Name:</label>
        <input type="text" id="studentname" name="studentname" required>

        <label for="studentid">Student ID:</label>
        <input type="number" id="studentid" name="studentid" required>

        <label for="borrowdate">Borrowing Date:</label>
        <input type="date" id="borrowdate" name="borrowdate" required>

        <label for="returndate">Return Date:</label>
        <input type="date" id="returndate" name="returndate" required>

        <input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.html">REFRESH</a>

</body>
</html>
