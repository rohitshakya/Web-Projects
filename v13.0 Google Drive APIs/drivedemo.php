<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Git Login App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
   <div>
       <button id="login">
           Upload Files to Drive
       </button>
   </div> 
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

     // client id of the project

     var clientId = "4655950119-3h7kdlruim2lblef6gmcrmbok46uki85.apps.googleusercontent.com";

     // redirect_uri of the project

     var redirect_uri = "http://localhost/VIVA_VOLT_DEV/portal_volt/uploadfilestodrive";

     // scope of the project

     var scope = "https://www.googleapis.com/auth/drive";

     // the url to which the user is redirected to

     var url = "";


     // this is event click listener for the button

     $("#login").click(function(){

        // this is the method which will be invoked it takes four parameters

        signIn(clientId,redirect_uri,scope,url);

     });

     function signIn(clientId,redirect_uri,scope,url){
      
        // the actual url to which the user is redirected to 

        url = "https://accounts.google.com/o/oauth2/v2/auth?redirect_uri="+redirect_uri
        +"&prompt=consent&response_type=code&client_id="+clientId+"&scope="+scope
        +"&access_type=offline";

        // this line makes the user redirected to the url
        window.location = url;

     }


});
</script>