<?php
  //connect to database
  $db = mysqli_connect("localhost", "root", "", "todo");

  if(isset($_POST["submit"])){
    $task = $_POST["task"];

    mysqli_query($db, "INSERT INTO tasks (task) VALUES ("$task")");
    header("location: index.php");
  }

  $tasks = mysqli_query($db, "SELECT * FROM tasks");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="heading">
    <h2>To-do list application withPHP and MYsql</h2>
  </div>

  <form action="index.php" method="POST">
    <input type="text" name="task" class="task-input" />
    <button type="submit" class="add_btn" name="submit">Add Task</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>N</th>
        <th>Task</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($row = mysqli_fetch_array($tasks)){ ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td class="task"><?php echo $row["task"]; ?></td>
          <td class="delete">
            <a href="#">x</a>
          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>

</body>
</html>
