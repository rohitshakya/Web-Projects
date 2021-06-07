

<!DOCTYPE html>
<html>
<head>
  <title>Viva Volt</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <meta name="google-signin-client_id" content="4655950119-k1u7qvfsr90g4ic42dv5grofihmf70kp.apps.googleusercontent.com">

</head>
<body>
 <script src="https://apis.google.com/js/platform.js" async defer></script>
 <div class="g-signin2" data-onsuccess="onSignIn"></div>
 
</body></html>
<script type="text/javascript">
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo base_url('/tokensignin');?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    console.log('Signed in as: ' + xhr.responseText);
    if(xhr.responseText==1)
    {
      var base_url = '<?=base_url()?>';
       window.location = base_url;
    }
    else if(xhr.responseText=="Unverified email")
    {
      alert("Verify your email or login with default form!")
    }
    else
    {
      alert(xhr.responseText);
      alert("Something went wrong");
    }
  };
  xhr.send('idtoken=' + id_token);
}

</script>

