<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hostel Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(2, 247, 255);
            margin: 0;
            padding: 0;
        }
        form {
            background: linear-gradient(to right, rgb(17, 203, 191) 0%, #2575fc 100%);
            padding: 50px;
            margin: 50px auto;
            width: 450px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }
        form:hover {
            transform: scale(1.05);
        }
        h2 {
            color: black;
            font-size: 28px;
            margin-bottom: 30px;
        }
        input[type="text"] {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 80%;
            padding: 15px;
            border: none;
            background-color: #ff7f50;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #e56b3b;
        }
        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        th {
            background-color: #f8f9fa;
            color: #333;
        }
        td {
            background-color: #f9f9f9;
        }
        td:hover {
            background-color: #f1f1f1;
        }
        p {
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Hostel Information</h2>
        Enter Command (e.g., Display Name, Display RollNo): 
        <input type="text" name="command" required><br><br>
        <input class="button" type="submit" name="search" value="Submit"><br><br>
    </form>
    <?php
        if (isset($_POST['search'])) {
            $host = 'localhost:3306';
            $user = 'root';
            $pass = '';
            $dbname = 'hostel management';
            $conn = mysqli_connect($host, $user, $pass, $dbname);
            if ($conn == false) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $command = $_POST['command'];
            if (preg_match('/Display (.+)/', $command, $matches)) {
                $column = ucfirst(strtolower(trim($matches[1])));
                $valid_columns = ['rollno', 'name', 'block', 'roomno', 'mobileno', 'city'];
                $column = strtolower($column);
                if (in_array($column, $valid_columns)) {
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<h2 style='text-align:center;'>Student Details</h2>";
                        echo "<table>
                                <tr>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Block</th>
                                    <th>Room No</th>
                                    <th>Mobile No</th>
                                    <th>City</th>
                                </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            if ($column == 'rollno') {
                                echo "<td>" . $row['RollNo'] . "</td>";
                            }
                            if ($column == 'name') {
                                echo "<td>" . $row['Name'] . "</td>";
                            }
                            if ($column == 'block') {
                                echo "<td>" . $row['Block'] . "</td>";
                            }
                            if ($column == 'roomno') {
                                echo "<td>" . $row['RoomNo'] . "</td>";
                            }
                            if ($column == 'mobileno') {
                                echo "<td>" . $row['MobileNo'] . "</td>";
                            }
                            if ($column == 'city') {
                                echo "<td>" . $row['City'] . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p style='text-align:center; color:red;'>No records found.</p>";
                    }
                } else {
                    echo "<p style='text-align:center; color:red;'>Invalid column name. Please use one of the following: RollNo, Name, Block, RoomNo, MobileNo, City</p>";
                }
            } else {
                echo "<p style='text-align:center; color:red;'>Invalid command format. Please use: Display [Column]</p>";
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
