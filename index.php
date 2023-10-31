<?php

    include("connection.php");

    if(isset($_GET['id']))
    {
        $snos = $_GET['id'];
        // echo $sno;
        $sql = "DELETE FROM `todo_table` WHERE Sno = $snos";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo "Record was not deleted";
        }
    }
    
      
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset( $_POST['name']))
        {
            // try
            // {
                $task1 = $_POST['name'];
                $task2 = $_POST['date'];
                $sql = "INSERT INTO todo_table (`Name`, `Date`) VALUES ('$task1', '$task2')";

                $result = mysqli_query($conn, $sql);
                // echo "The record was inserted successfully";
            // }
            // catch(mysqli_sql_exception)
            // {
                // echo "The record was not inserted";
            // }
            if(!$result)
            {
                die("Not Success");
            }
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="top">
            <div class="nav"><h1>Todo List</h1></div>
            <form action="index.php" method="post">
                    <div class="todo-input-grid">
                        <div class="middle"><h5>S.No</h5></div>
                        <input type="text" name="name" class="name-input" placeholder="Add a todo">
                        <input type="date" name="date" class="date-input">
                        <button type="submit" class="add-button">Add</button>
                        <button type="reset" class="add-button">Reset</button>
                    </div>
            </form>
        </div>

        <div class="todo-list-grid">
            <?php
                try
                {
                    $sql = "SELECT *FROM `todo_table`"; 
                    $result = mysqli_query($conn, $sql);
                    $number = 0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $number = $number + 1;
                        echo "<div class = 'middle2'>". $number."</div>";
                        echo "<div>".$row['Name']."</div>";
                        echo "<div>".$row['Date']."</div>";
                        // $id = $row['Sno'];
                        // echo "<button class='delete delete-todo-button' onclick='href='index.php?id={$row['Sno']}'>Delete</button>";
                        // echo "<button class='delete delete-todo-button'><a href = '/javacrud/index.php?id = {$row['Sno']}'> Delete </a></button>";
                        echo "<a class='delete delete-todo-button' onclick='return checkdelete()' style = 'text-decoration: none; text-align: center;'  href='index.php?id={$row['Sno']}'>Delete</a>";
                        echo "<a class='update delete-todo-button' style = 'text-decoration: none; text-align: center;'  href='update.php?id={$row['Sno']}'>Update</a>";
                    }
                }
                catch(mysqli_sql_exception)
                {
                    echo mysqli_connect_error()."We are failed to execute SQL query";
                }
              
            ?>
        </div>
    </main>
 <script src="script.js"></script>
</body>
</html>