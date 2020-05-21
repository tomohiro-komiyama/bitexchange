<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once ("cfg.php");

  /* Parameter */
    $request_currency = "USD";
    if (!empty($_GET['currency'])) $request_currency = $_GET['currency'];

  $sql = "SELECT 
            name,
            vol_price AS vol,
            low AS low_price,
            high AS high_price,
            price AS price,
            raise AS is_raise
          FROM exchange";

  $result = db_query_array($sql);
  
  $response = array(
    "success" => true,
    "data" => $result,
    "transition" => 1.1,
    "message" => "Here is a list of Exchanges"
  );

  echo json_encode($response);

?>