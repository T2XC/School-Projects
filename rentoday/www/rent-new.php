
<?php
require_once('../db_config.php');
if (isset($_POST['createRecord'])) {
$RentID = filter_var($_POST['RentID'], FILTER_SANITIZE_NUMBER_INT);
$VehicleID = filter_var($_POST['VehicleID'], FILTER_UNSAFE_RAW);
$FullName = filter_var($_POST['FullName'], FILTER_UNSAFE_RAW);
$Email = filter_var($_POST['Email'], FILTER_UNSAFE_RAW);

// $query = "SELECT * FROM cars ORDER BY RentPrice, Make";
$query = "SELECT * FROM cars";
$results = $db_connection->query($query);

$query = "INSERT INTO rents (RentID, VehicleID, FullName, Email) VALUES (:RentID, :VehicleID, :FullName, :Email)";
$result = $db_connection->prepare($query);
$result->execute([
'RentID' => $RentID,
'VehicleID' => $VehicleID,
'FullName' => $FullName,
'Email' => $Email,
]);
$rows = $result->rowCount(); if ($rows == 1) {
header('Location: index.php');
} else {
$error_message = "Record creation failed";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rent a car</title>
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
<?php
if (isset($error_message)) {
?>
<div class="alert alert-success">
<strong>Error!</strong>
<?php echo $error_message; ?>
</div>
<?php
}
?>
<button class="btn btn-light"><a href="index.php">Back</a></button>
<form method="post" action="">
<div class="form-group row">
<label for="VehicleID" class="col-sm-2 col-form-label">VehicleID</label> <div class="col-sm-10">
<input type="number" class="form-control" id="VehicleID" name="VehicleID" readonly value="<?php echo $_GET['id'] ?>"> </div>
</div>
<div class="form-group row">
<label for="FullName" class="col-sm-2 col-form-label">Full Name</label> <div class="col-sm-10">
<input type="text" class="form-control" id="FullName" name="FullName"> </div>
</div>
<div class="form-group row">
<label for="Email" class="col-sm-2 col-form-label">Email</label> <div class="col-sm-10">
<input type="email" class="form-control" id="Email" name="Email">
</div>
</div>
<button type="submit" name="createRecord" class="btn btn-success">Submit</button>
</form>
</div>
</body>
</html>