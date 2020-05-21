<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once ("cfg.php");

  /* Parameter */
    $request_currency = "USD";
    if (!empty($_GET['currency'])) $request_currency = $_GET['currency'];


  // /* Get Currency */
  //   $sql = "SELECT id FROM currencies WHERE currency = '$request_currency'";
  //   $result = db_query_array($sql);
  //   if (count($result) > 0) $currency = $result[0];

  $sql = "SELECT 
            currencies.currency AS currency, 
            currencies.fa_symbol AS symbol, 
            exchange.price AS price, 
            exchange.vol_price AS vol, 
            currencies.usd_ask AS ask, 
            currencies.usd_bid AS bid
          FROM exchange
          LEFT JOIN currencies ON (exchange.currency = currencies.id)";

  $result = db_query_array($sql);
  
  $response = array(
    "success" => true,
    "data" => $result,
    "message" => "Here is a list of Currencies"
  );

  echo json_encode($response);

?>