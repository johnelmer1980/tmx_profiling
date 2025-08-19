<?php

 $api_key = "vkrzj8agbndldh3d"; // EMEA Testing
//$api_key = "muxxe7ezxaronnff"; // Careem
//$api_key = "uyuvy8mvey2katkh"; // HSBC Test
 $org_id = 'ctvkbfxp'; // EMEA Testing
//$org_id = '2u0n4npg'; // ePayments
//$org_id = 'aoa3ad0y'; // Careem
//$org_id = '257bbu15'; // HSBC Test
$policy = "policy_banking_login_draft_v3";


$apiparam = array(
	"org_id" => "$org_id",
	"api_key" => "$api_key",
	"session_id" => $_POST["session_id"],
	"event_type" => "account_creation",
	"service_type" => "all",
	"policy" => "$policy",
	"local_attrib_1" => "norris",
	"local_attrib_2" => "nerdy"
);

include "display_api_results.php";

$sq_apiurl = "https://h-api.online-metrix.net/api/session-query?" . http_build_query($apiparam);
$sq_apiresults = file_get_contents($sq_apiurl);
$sq_apiresults_text = file_get_contents($sq_apiurl . "&output_format=text");
$sq_parsed = parse_api($sq_apiresults);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>API Results</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
  </head>

  <body>


    <div class="container">
      <button class="btn btn-lg btn-primary btn-block" onClick="parent.location='index.php'" type="back" value="back">Back</button><br><br>

      <h1>Login request API response</h1>
      <h3>Request parameters:</h3>

<!--
      <div class="table">
          <div class="row">
            <div class="col-md-3">Policy</div>
            <div class="col-md-3"><?php echo $policy; ?></div>
          </div>
          <div class="row">
            <div class="col-md-3">Org ID</div>
            <div class="col-md-3"><?php echo $org_id; ?></div>
          </div>
      </div>
-->

      <table class="table">
            <tr>
                <th>Policy</th>
                <td><?php echo $policy; ?></td>
            </tr>
            <tr>
                <th>Org ID</th>
                <td><?php echo $org_id; ?></td>
            </tr>
            <tr>
                <th>API request</th>
                <td><?php echo $sq_apiurl; ?></td>
            </tr>
      </table>



      <h3>Results:</h3>

    <?php

    // Variables to print
    $vars = array(
        "policy_score",
        "risk_rating",
        "account_email",
        "digital_id",
        "http_referer_url",
        "policy",
        "profiled_url",
        "true_ip_geo",
        "true_ip_organization",
        "org_id",
        "unknown_session",
        "session_id",
        "reason_code"
    );
    //print_specific($sq_parsed, $vars);
    //print_kvp($sq_parsed);
    ?>

      <table class="table">
            <?php print_kvp_table($sq_parsed); ?>
      </table>



    </div> <!-- /container -->
  </body>
</html>
