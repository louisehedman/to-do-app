<?php include('php_db.php'); 

$notset = '';
if (isset($_POST['add'])) {
   if (empty($_POST['title'])) {
      $notset = "Title can't be blank";
   }
    else{
      $query = <<<SQL
      INSERT INTO list (title, task) VALUES (:title, :task);  
      SQL;   
      $statement = $db->prepare($query);
      $params = [
      'title' => $_POST['title'],
      'task' => $_POST['task']
   ];
   $statement->execute($params);
   }
}

?>

<!DOCTYPE html>
<html lang="sv">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>U04-to-do-app</title>
</head>
<body>
   <h1>U04 - To do app</h1>
   <form method="post" action="index.php" >
      <label>title</label>
      <input type="text" name="title" value="">
      <label>task</label>
      <input type="text" name="task" value="">
      <div>
         <button name="add" type="submit" value="add_task">Add task</button>
      </div>

   </form>
   <?php if (isset($notset)) { ?>
	<p><?php echo $notset; ?></p>
<?php } ?>
</body>
</html>



