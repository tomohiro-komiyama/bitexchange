<?php
$CFG = (object) array();

// $CFG->dbhost = "localhost";
// $CFG->dbname = "bitexchange_cash";
// $CFG->dbuser = "bmx_user";
// $CFG->dbpass = "123bmx!@#";

$CFG->dbhost = "localhost";
$CFG->dbname = "bitexchange_cash";
$CFG->dbuser = "root";
$CFG->dbpass = "xchange123";
$CFG->db_debug = 'N';

$system_classes = get_declared_classes();
$system_classes[] = 'DB';

include '../lib/common.php';

$session_id1 = (!empty($_POST['session_id'])) ? preg_replace("/[^0-9]/","",$_POST['session_id']) : false;
$signature1 = (!empty($_POST['signature'])) ? hex2bin($_POST['signature']) : false;
$nonce1 = (!empty($_POST['nonce'])) ? preg_replace("/[^0-9]/","",$_POST['nonce']) : false;
$token1 = (!empty($_POST['token'])) ? preg_replace("/[^0-9]/","",$_POST['token']) : false;
$settings_change_id1 = (!empty($_POST['settings_change_id'])) ? $_REQUEST['settings_change_id'] : false;
$request_id1 = (!empty($_POST['request_id'])) ? $_REQUEST['request_id'] : false;
$api_key1 = (!empty($_POST['api_key'])) ? preg_replace("/[^0-9a-zA-Z]/","",$_POST['api_key']) : false;
$api_signature1 = (!empty($_POST['api_signature'])) ? preg_replace("/[^0-9a-zA-Z]/","",$_POST['api_signature']) : false;
$raw_params_json = (!empty($_POST['raw_params_json'])) ? $_POST['raw_params_json'] : false;
$update_nonce = false;
$awaiting_token = false;

$CFG->language = (!empty($_POST['lang']) && in_array(strtolower($_POST['lang']),array('en','es','ru','zh','pt'))) ? strtolower($_POST['lang']) : false;
$CFG->client_ip = (!empty($_POST['ip'])) ? preg_replace("/[^0-9\.]/","",$_POST['ip']) : false;
$CFG->session_id = $session_id1;
$CFG->session_locked = false;
$CFG->session_active = false;
$CFG->session_api = false;
$CFG->token_verified = false;
$CFG->email_2fa_verified = false;
$CFG->unset_cache = false;
?>
