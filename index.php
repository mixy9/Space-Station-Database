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
<title> The Space station record </title>
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
      <p>Vrsta:
<select id="type" name="type">
<option value="Vrsta 1">Vrsta 1</option>
<option value="Vrsta 2">Vrsta 2</option>
<option value="Vrsta 3">Vrsta 3</option>
<option value="Vrsta 4">Vrsta 4</option>
</select>
      <p>Naziv broda:
      <input type="text" name="name" value="" placeholder="Ship name"> <br>
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
$sql = "SELECT type, name, date FROM record ORDER BY date DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
   // output data of each row
while($row = mysqli_fetch_assoc($result))
{
  if (empty($row['name'])) { ?>
  <tr><td colspan = "3"> <?php echo "Nema unesenih brodova!";
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
} // End of while loop
} // End of if statement
else
{
?>
<tr><th colspan "3"> Something is wrong! </th></tr>
<?php
}
?>
</table>
<br>
<table>
<tr>
  <th>Ship type</th>
  <th>Ship points</th>
</tr>

<?php
$sql = "SELECT type, name FROM record ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$points = 0;
$sum = 0;

if (mysqli_num_rows($result) > 0) {
   // output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
    <td><?php echo $row['type']; ?> </td>
    <td><?php
    if (empty($row['name'])) {
        echo $points = 0;
      } else {
        echo $points = 1;
        $sum += $points;
      } ?>
    </td>
    </tr>
    <?php
  }
  }
else
{
?>
<tr><th colspan "3"> Something is wrong! </th></tr>
<?php
}
?>

<tr>
  <th>Ukupno:</th>
  <th><?php echo $sum; ?></th>
</tr>

</table>
</body>
</html>
