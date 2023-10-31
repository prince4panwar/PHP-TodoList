<?php
    include("connection.php");
    $snos = $_GET['id'];
    // echo "{$snos}";
    $sql = "SELECT * FROM `todo_table` WHERE Sno = '$snos'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="updateStyle.css">
</head>
<body>
    <main>
        <div class="top">
            <div class="nav"><h1>Update Todo List</h1></div>
            <form action="#" method="post">
                    <div class="todo-input-grid">
                        <div class="middle"><h5>S.No</h5></div>
                        <input type="text" value = "<?php echo $row['Name'] ?>" name="name" class="name-input" placeholder="Add a todo">
                        <input type="date" value = "<?php echo $row['Date'] ?>" name="date" class="date-input">
                        <button type="submit" class="add-button">Update</button>
                        <button type="reset" class="add-button">Reset</button>
                    </div>
            </form>
        </div>

    </main>
 <script src="script.js"></script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $task1 = $_POST['name'];
    $task2 = $_POST['date'];
    // echo $task1;
    // echo $task2;

    // $sql = "UPDATE todo_table SET Name = '$task1' , Date = '$task2' WHERE Sno = '$snos'";
    $sql = "UPDATE `todo_table` SET `Name` = '$task1', `Date` = '$task2' WHERE `todo_table`.`Sno` = '$snos'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Todo was updated";
        ?>

<meta http-equiv = "refresh" content = "0; url = http://localhost/javacrud/index.php" />

<?php
    }
    else
    {
        die("Todo was not updated");
    }
 
}
?>