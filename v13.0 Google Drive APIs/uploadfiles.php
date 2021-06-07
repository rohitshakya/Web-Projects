<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Git Login App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="upload.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="upload.js"></script>
</head>
<body>
   <style type="text/css">
      #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    height: 30px;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
  }
  
  #progress-wrp .progress-bar {
    height: 100%;
    border-radius: 3px;
    background-color: #f39ac7;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
  }
  
  #progress-wrp .status {
    top: 3px;
    left: 50%;
    position: absolute;
    display: inline-block;
    color: #000000;
  }
   </style>
   <div>
     <input id="files" type="file" name="files[]" multiple/>
     <button id="upload">Upload</button>
     <div id="progress-wrp">
        <div class="progress-bar"></div>
        <div class="status">0%</div>
    </div>
   </div> 
   <div id="result">
       
   </div>
</body>
</html>
<script type="text/javascript">
   $(document).ready(function(){
    

    const urlParams = new URLSearchParams(window.location.search);
    const code = urlParams.get('code');
    const redirect_uri = "" // replace with your redirect_uri;
    const client_secret = "sC7GtUE4cyuvKABj9hLwWGur"; // replace with your client secret
    const scope = "https://www.googleapis.com/auth/drive";
    var access_token= "ya29.a0AfH6SMBF8EWrS9Vci7L5VGiB8BUYi2I0roRfkEK5O4ojX9nwZDCeYwFCleH0VxBrn6FP1yq6xJsk3jRwzaQHj7-vGAXDAdaOFDJRpUCa2HwRxa7__e9fkxt2TwZYfoRr8mT_ouvjn3Dy9iTvgpYc13bPJQrD";
    var client_id = "4655950119-3h7kdlruim2lblef6gmcrmbok46uki85.apps.googleusercontent.com"// replace it with your client id;
    
/*
    $.ajax({
        type: 'POST',
        url: "https://www.googleapis.com/oauth2/v4/token",
        url:"https://accounts.google.com/o/oauth2/v2/auth",
        data: {code:code
            ,redirect_uri:redirect_uri,
            client_secret:client_secret,
        client_id:client_id,
        scope:scope,
        grant_type:"authorization_code"},
        dataType: "json",
        success: function(resultData) {

            alert(resultData);
           
            
           localStorage.setItem("accessToken",resultData.access_token);
           localStorage.setItem("refreshToken",resultData.refreshToken);
           localStorage.setItem("expires_in",resultData.expires_in);
           window.history.pushState({}, document.title, "/GitLoginApp/" + "uploadfiles.php");
           
           
           
           
        }
  });*/

    function stripQueryStringAndHashFromPath(url) {
        return url.split("?")[0].split("#")[0];
    }   

    var Upload = function (file) {
        this.file = file;
    };
    
    Upload.prototype.getType = function() {
        localStorage.setItem("type",this.file.type);
        return this.file.type;
    };
    Upload.prototype.getSize = function() {
        localStorage.setItem("size",this.file.size);
        return this.file.size;
    };
    Upload.prototype.getName = function() {
        return this.file.name;
    };
    Upload.prototype.doUpload = function () {
        var that = this;
        var formData = new FormData();
    
        // add assoc key values, this will be posts values
        formData.append("file", this.file, this.getName());
        formData.append("upload_file", true);
    
        $.ajax({
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", "Bearer" + " " + localStorage.getItem("accessToken"));
                request.setRequestHeader("Authorization", "Bearer" + " " + "ya29.a0AfH6SMBF8EWrS9Vci7L5VGiB8BUYi2I0roRfkEK5O4ojX9nwZDCeYwFCleH0VxBrn6FP1yq6xJsk3jRwzaQHj7-vGAXDAdaOFDJRpUCa2HwRxa7__e9fkxt2TwZYfoRr8mT_ouvjn3Dy9iTvgpYc13bPJQrD");
                

                
            },
            url: "https://www.googleapis.com/upload/drive/v2/files",
            data:{
                uploadType:"media"
            },
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', that.progressHandling, false);
                }
                return myXhr;
            },
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            },
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            timeout: 60000
        });
    };
    
    Upload.prototype.progressHandling = function (event) {
        var percent = 0;
        var position = event.loaded || event.position;
        var total = event.total;
        var progress_bar_id = "#progress-wrp";
        if (event.lengthComputable) {
            percent = Math.ceil(position / total * 100);
        }
        // update progressbars classes so it fits your code
        $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
        $(progress_bar_id + " .status").text(percent + "%");
    };

    $("#upload").on("click", function (e) {
        var file = $("#files")[0].files[0];
        var upload = new Upload(file);
    
        // maby check size or type here with upload.getSize() and upload.getType()
    
        // execute upload
        upload.doUpload();
    });



    
});
</script>