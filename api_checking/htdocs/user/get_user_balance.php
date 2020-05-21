<?php 
  $api_base = "https://local.bitmahavi.com/api/htdocs";
  $public_api_base = "https://local.bitmahavi.com/frontend/htdocs";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $asset_url = "https://local.bitmahavi.com/frontend/htdocs/api/admin"; ?>
  <link href="<?= $asset_url ?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form class="row" action="<?= "$api_base/get_user_balance.php" ?>" style="padding-top: 50px;">

  <div class="col-sm-12 text-center">
    <h4>
      <strong>URL: </strong>
      <?= "$api_base/get_user_balance.php" ?>
    </h4>
    <br>
    <br>
  </div>

  <div class="col-sm-offset-3 col-sm-6"><!-- 
    <div class="form-group ">
      <label>currency</label>
      <input type="text" name="currency" class="form-control" value="BTC">
    </div>
    <div class="form-group ">
      <label>limit</label>
      <input type="text" name="limit" class="form-control" value="5">
    </div> -->
    <button class="btn btn-primary">Submit</button>
  </div>
</form>

<div class="row">
  <div class="col-sm-offset-3 col-sm-6" style="padding-top: 30px;">
    <label style="margin-bottom: 15px">Sending Data</label>
    <pre class="send-data" style="margin-bottom: 30px;border:1px solid #a5a5a5;background: #fff; min-height: 100px"></pre>
    <label style="margin-bottom: 15px">Response Data</label>
    <pre class="response-area" style="margin-bottom: 30px;border:1px solid #a5a5a5;background: #fff; min-height: 200px"></pre>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  $('form').submit(function(e) {
    e.preventDefault();

    var $form = $(this);
    var action = $form.attr('action');
    placeSendData($form);

    $.ajax({
      url: action,
      type: 'POST',
      data: $form.serialize(),
      success: function(data) {
        console.log(data);
        processData(data);
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  function processData(data) {
    if (isJson(data)) {
      $('.response-area').html(JSON.stringify(JSON.parse(data), null, 4));
    }
  }

  function placeSendData($form) {
    console.log(getFormData($form));
    $(".send-data").html(JSON.stringify(getFormData($form), null, 4));
  }

  function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
      indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
  }

  function isJson(str) {
    try {
      JSON.parse(str);
      return true;
    } catch {
      return false;
    }
  }
</script>

</body>
</html>