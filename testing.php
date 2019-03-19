
<?php
require_once ("objects/program.php");
require_once ("objects/group.php");
require_once ("objects/userTracking.php");
require_once ("objects/phase.php");
require_once ("objects/exercise.php");
require_once ("objects/databaseManagement.php");

$database = new databaseManagement();
$programs = new program();
$groups = new group();

//Testing Plan For Pricing
//Create 5 Default Pricing Tiers
$groups->newDefaultPricingTier(0, 2, 1);
//Check Each Tier's Validity
$isValid = $groups->checkValidTier(2, 3, 4, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newDefaultPricingTier(3, 4, 1.5);

$isValid = $groups->checkValidTier(4, 5, 6, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newDefaultPricingTier(5, 6, 2);

$isValid = $groups->checkValidTier(6, 7, 8, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newDefaultPricingTier(7, 8, 2.5);

$isValid = $groups->checkValidTier(8, 9, 10, 50);
echo "New Tier Validity: " . $isValid;
$groups->newDefaultPricingTier(9, 50, 5);

//Assign the Defaults To Corp "25"
assignAllDefaultsToCorp(25);
//Make 5 Custom Pricing Tiers
$groups->newPricingTier(0, 2, 1);
//Check Each Tier's Validity
$isValid = $groups->checkValidTier(2, 3, 4, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newPricingTier(3, 4, 1.5);

$isValid = $groups->checkValidTier(4, 5, 6, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newPricingTier(5, 6, 2);

$isValid = $groups->checkValidTier(6, 7, 8, NULL);
echo "New Tier Validity: " . $isValid;
$groups->newPricingTier(7, 8, 2.5);

$isValid = $groups->checkValidTier(8, 9, 10, 50);
echo "New Tier Validity: " . $isValid;
$groups->newPricingTier(9, 50, 5);

//Check Each Tier's Validity

	// Have One Fail

//Assign Customs To Corp "26"

//Get Number of Users For Both Corps

//Get Price Per User of Both Corps

//Get Total Price for Both Corps

//Add Enough Users To Group 40 - Increased Tier 

// New Price Per User

// New Total Price





//     if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//       echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }
// echo "<h1>API Testing</h1>";
// echo "<h2>API Connections - Token & Validation</h2>";
 
// echo "<h3>Getting the Admin user Token for Local Development  </h3>";
   
//     $apiQueryURL = "http://curastream.test/wp-json/curastream/v2/bodypart/1";

//     $response = wp_remote_post($apiQueryURL, array(
//         'method' => 'POST',
//        ));
//    // var_dump($response);
//     $data = wp_remote_retrieve_body( $response );

// $database = new databaseManagement();
//  $programs = new program();
// // New Corp
//     $corpId = $programs->getCorpIdByMemprId(6769);
//     echo $corpId;
//     echo "<br> --------------- <br>";
//     $groupId = $programs->getGroupIdByCorpId($corpId);
//     echo $groupId;
//     //echo phpinfo();


//     var_dump($data);

//     if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//       echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

//echo "Status: " .$status;

//Testing for Move Exercise/Phase Code
// $newProg = $programs->createProgram("Testphp Prog9");
// $newPhaseId = $programs->createPhase("Testphp Phase2", $newProg);

// $newExerciseId = $programs->createExercise(434, $newPhas eId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,1);

// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,2);


// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,3);

// // New Exercise
// $newExerciseId = $programs->createExercise(434, $newPhaseId);
// $highestOrder = $programs->getHighestExerciseOrder($newPhaseId);
// echo "HO: " .  $highestOrder;
// $programs->updateExercise($highestOrder+1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $newExerciseId);
// // Order the Exercise to the final order 
// $programs->moveExerciseOrder($newPhaseId,$newExerciseId,$highestOrder+1,2);


// echo "<h1>API Testing</h1>";
// echo "<h2>API Connections - Token & Validation</h2>";
 
// echo "<h3>Getting the Admin user Token for Local Development  </h3>";
   
//     $apiQueryURL = "http://curastream.test/wp-json/jwt-auth/v1/token/";

//     $response = wp_remote_post($apiQueryURL, array(
//       	'method' => 'POST',
//     	'body'=> array('username'=>'admin',
//     	'password'=>'#7fFWF0FIeED!hyZwPNPCP*X'
//       	)
//        ));
//    // var_dump($response);
//     $data = wp_remote_retrieve_body( $response );

//     var_dump($data);

//     if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }
// echo "<h3>Testing the iOS Device Token Locally</h3>";
   
//      $apiQueryURL = "http://curastream.test/wp-json/jwt-auth/v1/token/validate";

//     $response = wp_remote_post($apiQueryURL, array(
//        	'method' => 'POST',
//      	'headers'=> array('Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jdXJhc3RyZWFtLnRlc3QiLCJpYXQiOjE1NDg3OTg3NTksIm5iZiI6MTU0ODc5ODc1OSwiZXhwIjoxNTQ5NDAzNTU5LCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.vuk9VVxONb999DivAdjYzDEw1SBzlBpXOBNClfcF72U','Content-type' => 'application/json'
//        	)
//         ));
//      //echo "Response  ";
//     //print_r($response);
//     $data = wp_remote_retrieve_body( $response );
//    // echo "Data  ";
//    var_dump($data);

//          if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

// echo "<h3>Getting the Admin user Token for Staging  </h3>";
   
//     $apiQueryURL = "https://curastream.serveit.work/wp-json/jwt-auth/v1/token/";

//     $response = wp_remote_post($apiQueryURL, array(
//       	'method' => 'POST',
//     	'body'=> array('username'=>'admin',
//     	'password'=>'#7fFWF0FIeED!hyZwPNPCP*X'
//       	)
//        ));
//    // var_dump($response);
//     $data = wp_remote_retrieve_body( $response );

//     var_dump($data);

//          if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

// echo "<h3>Testing the iOS Device Token Staging</h3>";
   
//      $apiQueryURL = "https://curastream.serveit.work/wp-json/jwt-auth/v1/token/validate";

//     $response = wp_remote_post($apiQueryURL, array(
//        	'method' => 'POST',
//      	'headers'=> array('Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvY3VyYXN0cmVhbS5zZXJ2ZWl0LndvcmsiLCJpYXQiOjE1NDg3OTE2NDcsIm5iZiI6MTU0ODc5MTY0NywiZXhwIjoxNTQ5Mzk2NDQ3LCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.tJ8mM2rWHyYgU_M7keDbeQEXXwn-lkKmObp9k3wbl_U','Content-type' => 'application/json'
//        	)
//         ));
//      //echo "Response  ";
//     //print_r($response);
//     $data = wp_remote_retrieve_body( $response );
//    // echo "Data  ";
//    var_dump($data);

//                  if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

 
// echo "<h3>Getting the Admin user Token for Production  </h3>";
   
//     $apiQueryURL = "https://www.curastream.com/wp-json/jwt-auth/v1/token/";

//     $response = wp_remote_post($apiQueryURL, array(
//       	'method' => 'POST',
//     	'body'=> array('username'=>'admin',
//     	'password'=>'#7fFWF0FIeED!hyZwPNPCP*X'
//       	)
//        ));
//    // var_dump($response);
//     $data = wp_remote_retrieve_body( $response );

//     var_dump($data);

//                 if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

// echo "<h3>Testing the iOS Device Token Production</h3>";
   
//      $apiQueryURL = "https://www.curastream.com/wp-json/jwt-auth/v1/token/validate";

//     $response = wp_remote_post($apiQueryURL, array(
//        	'method' => 'POST',
//      	'headers'=> array('Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvY3VyYXN0cmVhbS5jb20iLCJpYXQiOjE1NDg3OTAwOTYsIm5iZiI6MTU0ODc5MDA5NiwiZXhwIjoxNTQ5Mzk0ODk2LCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.SFehIzUg79fw0ZFF2fdRyOlGdGaoDBo-pCA6lUCG-9A','Content-type' => 'application/json'
//        	)
//         ));
//      //echo "Response  ";
//     //print_r($response);
//     $data = wp_remote_retrieve_body( $response );
//    // echo "Data  ";
//    var_dump($data);

//                if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }
// echo "<h2>User Registration & Transaction Creation</h2>";
// echo "<h3>Testing the User Creation on the local dev</h3>";
   
//      $apiQueryURL = "http://curastream.test/wp-json/mp/v1/members";
//      $jsonBody = json_encode(array(
//        		"email"=>'testing@serveit.ca',
//        		"username"=>"Nathan Test",
//        		"first_name"=> "Nathan",
//        		"last_name"=>"Tymos",
//        		"password"=>"Bacon123!",
//        		"address"=>array(
//        			"mepr-address-one"=>"2277 Galloway Pl",
//        			"mepr-address-two"=>"",
//        			"mepr-address-city"=>"Kamloops",
//        			"mepr-address-state"=>"BC",
//        			"mepr-address-zip"=>"V1S1K3",
//        			"mepr-address-country"=>"Canada"
//        			),
//        		"transaction"=>array(
//        			"membership"=>"4214",
//        			"amount"=>"9.99",
//        			"gateway"=>"manual",
//        			"status"=>"complete",
//        			"tax_class"=>"114be7fea4d3dd0cf2e88a8fa9a56d4ea741efbabd07d61d08cf0810be2254fd",
//        			"tax_desc"=>"Testing A Transaction"
//        			)
//        		)
//        );
//      echo $jsonBody;
//     $response = wp_remote_post($apiQueryURL, array(
//        	'method' => 'POST',
//      	'headers'=> array('Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jdXJhc3RyZWFtLnRlc3QiLCJpYXQiOjE1NDg3OTg3NTksIm5iZiI6MTU0ODc5ODc1OSwiZXhwIjoxNTQ5NDAzNTU5LCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.vuk9VVxONb999DivAdjYzDEw1SBzlBpXOBNClfcF72U','Content-type' => 'application/json'
//        	),
//        	'body'=>$jsonBody
//     ));
//      //echo "Response  ";
//     //print_r($response);
//     $data = wp_remote_retrieve_body( $response );
//    // echo "Data  ";
//    var_dump($data);

//          if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }

//     echo "<h3>Testing the User Creation on the Production</h3>";
   
//      $apiQueryURL = "https://www.curastream.com/wp-json/mp/v1/members";
//      $jsonBody = json_encode(array(
//        		"email"=>'testing@serveit.ca',
//        		"username"=>"Nathan Test",
//        		"first_name"=> "Nathan",
//        		"last_name"=>"Tymos",
//        		"password"=>"Bacon123!",
//        		"address"=>array(
//        			"mepr-address-one"=>"2277 Galloway Pl",
//        			"mepr-address-two"=>"",
//        			"mepr-address-city"=>"Kamloops",
//        			"mepr-address-state"=>"BC",
//        			"mepr-address-zip"=>"V1S1K3",
//        			"mepr-address-country"=>"Canada"
//        			),
//        		"transaction"=>array(
//        			"membership"=>"4214",
//        			"amount"=>"9.99",
//        			"gateway"=>"manual",
//        			"status"=>"complete",
//        			"tax_class"=>"114be7fea4d3dd0cf2e88a8fa9a56d4ea741efbabd07d61d08cf0810be2254fd",
//        			"tax_desc"=>"Testing A Transaction"
//        			)
//        		)
//        );
//      echo $jsonBody;
//     $response = wp_remote_post($apiQueryURL, array(
//        	'method' => 'POST',
//      	'headers'=> array('Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvY3VyYXN0cmVhbS5jb20iLCJpYXQiOjE1NDg3OTAwOTYsIm5iZiI6MTU0ODc5MDA5NiwiZXhwIjoxNTQ5Mzk0ODk2LCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.SFehIzUg79fw0ZFF2fdRyOlGdGaoDBo-pCA6lUCG-9A','Content-type' => 'application/json'
//        	),
//        	'body'=>$jsonBody
//     ));
//      //echo "Response  ";
//     //print_r($response);
//     $data = wp_remote_retrieve_body( $response );
//    // echo "Data  ";
//    var_dump($data);

//          if(wp_remote_retrieve_response_code( $response ) == 200){ echo( "<div class='alertSuccess'><br/><br/><br/>Success Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }else {
//     	echo( "<div class='alertError'><br/><br/><br/>Error Code: ".wp_remote_retrieve_response_code( $response )."</div>"); 
//     }
?>









