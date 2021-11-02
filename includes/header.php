<?php


use App\Db\Database;

$host = Database::HOST;
$user = Database::USER;
$database = Database::NAME;
$password = Database::PASSWORD;

try {

    $PDO = new PDO( 'mysql:host=' . $host . ';dbname=' . $database, $user, $password );
}
catch (PDOException $e) {
    die('Error' . $e->getMessage());
}


$sql = "SELECT sum(quantity) from card as total;";
$result = $PDO->query($sql);
$rows = $result->fetchAll();
$total = $rows[0][0];

$sqlIntants = "SELECT sum(quantity) from card WHERE type = 'instant'";
$resultIntants = $PDO->query($sqlIntants);
$rowsInstants = $resultIntants->fetchAll();
$totalInstants = $rowsInstants[0][0];

$sqlCreature = "SELECT sum(quantity) from card where type = 'creature'";
$resultCreature = $PDO->query($sqlCreature);
$rowCreature = $resultCreature->fetchAll();
$totalCreatures = $rowCreature[0][0];




?>

<!doctype html>
<html lang="pt-br">
  <head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Cards</a>
      </li>
    </ul>
  </div>
</nav>
    <title>Gatherer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- default Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
     <!-- Bootstrap sketchy CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css" integrity="sha384-RxqHG2ilm4r6aFRpGmBbGTjsqwfqHOKy1ArsMhHusnRO47jcGqpIQqlQK/kmGy9R" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/bf4bc90827.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg-dark text-light">
    <div class="container mt-4">
      <div class="jumbotron bg-danger">
          <h1 class="text-center">Gatherer - Magic: The Gathering Collection</h1>
          <h5 class="text-center">The total cards i have is: <?= $total ?></h5>
          <h5 class="text-center">The total of instant cards i have is: <?= $totalInstants ?></h5>
          <h5 class="text-center">The total of creature cards i have is: <?= $totalCreatures ?></h5>
      </div>
