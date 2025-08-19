<?php

$org_id = $_POST["org_id"];
$hostname = $_POST["hostname"];

$random_number = intval( "0" . mt_rand() . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
$session_id = md5($random_number . $random_string);

?>

<!doctype html>
<html lang="en">
  <head>

    <!--  Toolkit for Tag Obfuscation  -->
    <script type="text/javascript" src="fp-clientlib-v5.js"></script>

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

    <!-- Basic TMX tags -->
    <!-- <head>
      <script type="text/javascript" src="https://<?php echo $hostname; ?>/fp/tags.js?org_id=org<?php echo $hostname; ?>id123&session_id=<?php echo $session_id; ?>"></script>
    </head>      -->
  </head>

  <script>
        function redirectToPage() {
            // Define the URL of the page you want to navigate to
            var pageURL = 'index_otp.php';

            // Use window.location to navigate to the specified URL
            window.location.href = pageURL;
        }
  </script>


  <body class="text-center">
    <div class="container-fluid">

      <script type="text/javascript">
          var session_id = "<?php echo $session_id; ?>";
          securesite.profile("<?php echo $hostname; ?>", "<?php echo $org_id; ?>", "<?php echo $session_id; ?>");
      </script>

      <!-- <iframe id="utag_510_iframe" src="https://h.online-metrix.net/fp/tags.js?org_id=<?php echo $org_id; ?>&amp;session_id=<?php echo $session_id; ?>" style="width: 1px; height: 1px; border: 0px; position: absolute; top: -5000px; display: none;"></iframe> -->

      <!-- <noscript>
          <iframe id = "test" src="https://cdntm.hsbc.co.uk/fp/tags?org_id=<?php echo $org_id; ?>&session_id=<?php echo $session_id; ?>" style="width: 100px; height: 100px; border: 0; position: absolute; top: -5000px;" ></iframe>
      </noscript> -->

      <button><a href="index.php">Back</a></button>

      <form action="submit.php" class="form-signin" method="post" id="login" name="login">
        <img class="mb-4" src="assets/brand/bank.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="jelmer@threatmetrix.com" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="abcd1234" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">OTP Sign in</button>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>" />
        <input type="hidden" name="org_id" value="<?php echo $org_id; ?>" />
        <p class="text-muted">&copy; 2017-2018</p>
        <p class="text-muted">Session ID: <?php echo $session_id; ?></p>
        <!-- <input type="OrgId" id="inputOrgId" name="OrgId" class="form-control" placeholder="Org ID" value="ctvkbfxp" required autofocus> -->
        <p class="text-muted">Org ID: <?php echo $org_id; ?></p>
        <p class="text-muted">Hostname: <?php echo $hostname; ?></p>
      </form>
    </div>
  </body>
</html>
