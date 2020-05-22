<?php

  function check_auth($request) {
    $session_id=(!empty($request['session_id'])) ? $request['session_id'] : '';
    $nonce=(!empty($request['nonce'])) ? $request['nonce'] : '';

    if (!empty($session_id) && !empty($nonce)) {
      $sql = "SELECT 
        *
        FROM sessions
        WHERE
          session_id = $session_id AND nonce = '$nonce'
      ";

      $sessions = db_query_array($sql);
      if ($sessions && (count($sessions) > 0)) {
        $session = $sessions[0];

        return $session;
      }
    }

    return false;
  }

?>