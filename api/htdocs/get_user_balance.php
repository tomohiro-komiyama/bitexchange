<?php
  
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // require_once ("cfg.php");

  include '../lib/common.php';

  include "user/check_auth.php";

  $response = array(
    "success" => false,
    "message" => "Authentication failed."
  );

  $session = check_auth($_REQUEST);

  if (($session != false) && (!empty($session['user_id']))) {
    $user_id = $session['user_id'];

    $sql = "SELECT 
              site_users_balances.balance AS balance, 
              currencies.currency AS currency
            FROM site_users_balances
            LEFT JOIN site_users ON (site_users_balances.site_user = site_users.id)
            LEFT JOIN currencies ON (site_users_balances.currency = currencies.id)
            WHERE site_users_balances.site_user = $user_id";

    $result = db_query_array($sql);

    $response = array(
      "success" => true,
      "data" => ($result) ? $result : array(),
      "message" => "Here is a list of balances."
    );
  }

  echo json_encode($response);

?>