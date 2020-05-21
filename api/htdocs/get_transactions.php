<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once ("cfg.php");

  /* Parameter */
    $request_currency = $_GET['currency'];
    if (empty($request_currency)) $request_currency = "USD";


  // /* Get Currency */
  //   $sql = "SELECT id FROM currencies WHERE currency = '$request_currency'";
  //   $result = db_query_array($sql);
  //   if (count($result) > 0) $currency = $result[0];

  $sql = "SELECT 
            transactions.id, site_users.first_name AS name, 
            currencies.currency AS currency, 
            transaction_types.name_en AS transaction_type, 
            transaction_types.id AS transaction_type_code,
            transaction_types.id AS transaction_type_code
          FROM transactions
          LEFT JOIN site_users ON (transactions.site_user = site_users.id)
          LEFT JOIN currencies ON (transactions.currency = currencies.id)
          LEFT JOIN transaction_types ON (transactions.transaction_type = transaction_types.id)
          WHERE currencies.currency = '$request_currency'";

  $result = db_query_array($sql);
  
  $response = array(
    "success" => true,
    "data" => $result,
    "message" => "Here is a list of Transitions"
  );

  echo json_encode($response);

?>