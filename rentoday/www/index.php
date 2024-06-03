<?php
require_once('../db_config.php');
$query = "SELECT * FROM cars";
$results = $db_connection->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rentoday</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
<h1 class="display-1 text-center">Rentoday</h1>
<table class="table table-hover">
<thead>
<tr>
<th>Make</th>
<th>Model</th>
<th>Year</th>
<th>Rent Price</th>
<th> </th>
</tr>
</thead>
<tbody>
<?php
foreach ($results as $result) {
?>
<tr>
<td>
<?php echo $result['Make'] ?>
</td>
<td>
<?php echo $result['Model'] ?>
</td>
<td>
<?php echo $result['Year'] ?>
</td>
<td>
<?php echo $result['RentPrice'] . "€" ?>
</td>
<td><a href="rent-new.php?id=<?php echo $result['VehicleID'] ?>"><button class="btn btn-primary">Rent This Car</button></a></td> 
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</body>
</html>