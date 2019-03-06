<?php
include_once 'include/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="description" content="The Space Station Record">
<meta name="keywords" content="HTML,CSS,PHP,SQL">
<meta name="author" content="Mihaela Trempetić">
<title> The Space Station Record </title>
</head>

<style>
table, th, td {
  margin: auto;
  border: 1px solid white;
  border-collapse: collapse;
}
body {background-color: powderblue;}
h1 {
  color: #0099cc;
  font-size: 300%;
  font-family: courier;
  text-align: center;
}
legend {
  color: #0099cc;
  font-size: 150%;
  font-family: courier;
}
input[type=text], select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
button[type=submit] {
  width: 20%;
  background-color: #4da6ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button[type=submit]:hover {
  background-color: #80bfff;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
p {
    color: #007399;
    font-size: 150%;
    font-family: courier;
}
</style>

<body>
  <h1>Space station record</h1>
   <form action="include/save.php" method="POST">
    <fieldset>
      <legend> Space Ship </legend>
      <p>Type of the ship:
      <select name="type">
        <option value="Type 1">Type 1</option>
        <option value="Type 2">Type 2</option>
        <option value="Type 3">Type 3</option>
        <option value="Type 4">Type 4</option>
      </select>
      <p>Name of the space ship:
      <input type="text" name="name" value="" placeholder="Name a ship"> <br>
      <button type="submit" name="save">Save</button>
    </fieldset>
  </form> </p>
<br>

 <style>
  table {
   border-collapse: collapse;
   width: 60%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: center;
     }
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>

<body>
<table>
 <tr>
  <th>Ship type</th>
  <th>Ship name</th>
  <th>Date and Time</th>
 </tr>

<?php
$sql = "SELECT type, name, date
        FROM record
        ORDER BY date DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{ // output data of each row
while($row = mysqli_fetch_assoc($result))
{
  if (empty($row['name'])) { ?>
  <tr><td colspan = "3"> <?php echo "No data entered!";
}
else
{ ?>
</td></tr>
  <tr>
  <td><?php echo $row['type']; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['date']; ?></td>
</tr><?php
  }
}
} else {
  echo "<tr><td colspan = '3'>0 results</td></tr>";
}?>
</table>
<br>

<table>
<tr>
  <th>Ship type</th>
  <th>Ship points</th>
</tr>

<?php
$sql = "SELECT type,
        COUNT(CASE WHEN name <> '' THEN 1 ELSE NULL END)
        AS points
        FROM record
        GROUP BY type";

$result = mysqli_query($conn, $sql);
$sum = 0;

if (mysqli_num_rows($result) > 0) {
   // output data of each row
while($row = mysqli_fetch_assoc($result)) {
  $sum += $row['points'];?>
<tr><td><?php echo $row['type']; ?> </td>
    <td><?php echo $row['points']; ?>
    </td></tr><?php
  }
}  else {
  echo "<tr><td colspan = '3'>0 results</td></tr>";
}?>

<tr>
  <th>Total:</th>
  <th><?php echo $sum; ?></th>
</tr>
</table>
</body>
</html>
