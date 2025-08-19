<?php

// $org_id = 'ctvkbfxp'; //EMEA Test 2
// $org_id = '8m2y5jp3'; //Credit Agricole Test
// $org_id = '257bbu15'; //HSBC Test
$org_id = '2mookzjc'; //HSBC APAC Test


// $random_number = intval( "0" . mt_rand() . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
// $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
// $session_id = md5($random_number . $random_string);

//$session_id = 1;

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Bank Login</title>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>


  <body class="text-center">
    <div class="container-fluid">

      <form action="index_2.php" class="form-signin" method="post" id="org_id" name="org_id">
        <img class="mb-4" src="assets/brand/bank.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please enter an Org ID, hostname & policy</h1>
        <label for="inputOrgId" class="sr-only">Org ID</label>
        <label for="inputHostName" class="sr-only">Hostname</label>
        <label for="inputPolicy" class="sr-only">Policy</label>
        <input type="org_id" id="inputOrgId" name="org_id" class="form-control" placeholder="Org ID" value="ctvkbfxp" required autofocus>
        <input type="hostname" id="hostName" name="hostname" class="form-control" placeholder="Host name" value="h.online-metrix.net" required>
        <input type="policy" id="policy" name="policy" class="form-control" placeholder="Policy" value="default" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Continue to sign in</button>
      </form>
    </div>

  </body>
</html>
