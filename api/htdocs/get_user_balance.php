<?php
  
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // require_once ("cfg.php");

  include '../lib/common.php';

  $user_id=501;

  $session = User::checkAuth();

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

  echo json_encode($response);

?>