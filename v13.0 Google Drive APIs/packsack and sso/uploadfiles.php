<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Viva Volt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="upload.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="upload.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style type="text/css">
    body{
        background-color: #1c9f98;
        text-align: center;
    }
    #progress-wrp {
        border: 1px solid #0099CC;
        padding: 1px;
        position: relative;
        height: 30px;
        width: 400px;
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
    .cardstyle{
        margin-top: 50px;
    }
</style>
</head>

<body>
    <div class="container">
      <div class="card">
        <div class="card-body cardstyle">
            <div class="row">
                <div class="col-sm-10 mx-auto d-block text-center">
                    <span class="dropboxDesign"> 
                        <label class="text-primary" style="font-size:20px;">Dropbox</label>
                        <input type="file" onchange="previewFile()">
                        <div id="container1" style="display: inline-block;"></div>

                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 mx-auto d-block text-center">
                    <span class="dropboxDesign"> 
                        <label class="text-primary" style="font-size:20px;">One Drive</label>
                        <input id="fileUploadControl" name="fileUploadControl" type="file" />
                        <a class="sidebar-header " href="javascript:;"  onclick="launchSaveToOneDrive()"> <span class="m-0"><img
                            src="<?=base_url('assets')?>/schoolassets/images/cloud.jpg"></span>
                        </a>

                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 mx-auto d-block text-center">
                    <span class="dropboxDesign"> 
                        <label class="text-primary" style="font-size:20px;">Google</label>
                        <input id="files" type="file" name="files[]" multiple/>
                        <button id="upload">Upload</button>
                        <div id="progress-wrp">
                            <div class="progress-bar"></div>
                            <div class="status">0%</div>
                        </div>

                        <div id="result">

                        </div>

                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 mx-auto d-block text-center">
                    <span class="dropboxDesign"> 
                         <label class="text-primary" style="font-size:20px;"><a href="<?=base_url('packsack')?>">Homepage</a></label>

                    </span>
                </div>
            </div>
             
        </div>
    </div>


</div>
</body>
</html>

<!--script library for one drive-->
<script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>
<!--script library for one drive-->

<!--dropbox-->
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="do0d2uue6oeqgiw"></script>

<script type="text/javascript">
    var fileUrl="";
    function previewFile() {

        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();
        reader.addEventListener("load", function () {

        }, false);

        if (file) {
            fileUrl=getBase64(file);
            reader.readAsDataURL(file);
        }
    }
</script>
<script type="text/javascript">
    var myimgurl='';
</script>
<script type="text/javascript">
    function getBase64(file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            myimgurl=reader.result;    
            console.log(reader.result);
            myfunction(myimgurl,file.name);
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
    }

// prints the base64 string
</script>
<script type="text/javascript">
    function myfunction(myimgurl,filename)
    {

        var options = {
            files: [
            {'url': myimgurl,'filename':filename},
            ],
    // Success is called once all files have been successfully added to the user's
    // Dropbox, although they may not have synced to the user's devices yet.
    success: function () {
        // Indicate to the user that the files have been saved.
        alert("Success! Files saved to your Dropbox.");
    },

    progress: function (progress) {},
    cancel: function () {},
    error: function (errorMessage) {}
};
var button = Dropbox.createSaveButton(options);
document.getElementById("container1").appendChild(button);
}
</script>




<script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>
<script type="text/javascript">


    $('#fileUploadControl').change(function() {
        var file = $('#fileUploadControl')[0].files[0].name;
    });


    function launchSaveToOneDrive(file){


        var odOptions = {
            clientId: "56f5349c-a6cf-4342-96aa-8d1295f323c4",
            action: "save",
            sourceInputElementId: "fileUploadControl",
            sourceUri: "",
            fileName: file,
            openInNewWindow: true,
            advanced: {},
            success: function(files) { 
                confirm("File uploaded successfully");
                window.location.href = "<?=base_url('/packsack');?>";
            /* success handler */ },
        progress: function(percent) { /* progress handler */ },
    cancel: function() { /* cancel handler */ },
    error: function(error) { /* error handler */
        alert(error); }
    }
    OneDrive.save(odOptions);
}
</script>



<script type="text/javascript">
 $(document).ready(function(){




    const urlParams = new URLSearchParams(window.location.search);
    const code = urlParams.get('code');
    //const code="4/0AY0e-g6cMdvyWVXuWAHmMrlrnQRNyWnXpKHt_PpsHjuOUeRKYK4f2QNn7MjNz-_qSIiJdg";
    const redirect_uri = "http://localhost/VIVA_VOLT_DEV/portal_volt/uploadfilestodrive" // replace with your redirect_uri;
    const client_secret = "sC7GtUE4cyuvKABj9hLwWGur"; // replace with your client secret localhost
    //const client_secret="zjumXRsMZtzps2aJT_L1pbCJ";
    const scope = "https://www.googleapis.com/auth/drive";
    var access_token= "";
    var client_id = "4655950119-3h7kdlruim2lblef6gmcrmbok46uki85.apps.googleusercontent.com"// replace it with your client id;
    //var client_id="4655950119-k1u7qvfsr90g4ic42dv5grofihmf70kp.apps.googleusercontent.com"
    var token ='';

    $.ajax({
        type: 'POST',

        url:"https://www.googleapis.com/oauth2/v4/token",  
        data: {code:code
            ,redirect_uri:redirect_uri,
            client_secret:client_secret,
            client_id:client_id,
            scope:scope,
            grant_type:"authorization_code"},
            dataType: "json",
            success: function(resultData) {

                console.log(resultData.access_token);

                token = resultData.access_token;
                localStorage.setItem("accessToken",resultData.access_token);
                localStorage.setItem("refreshToken",resultData.refreshToken);
                localStorage.setItem("expires_in",resultData.expires_in);
                window.history.pushState({}, document.title, "/Viva Volt/" + "uploadfiles.php");




            },  error: function (textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

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
                request.setRequestHeader("Authorization", "Bearer" + " " + token);
                request.setRequestHeader("Authorization", "Bearer" + " " + token);
                

                
            },
            url: "https://www.googleapis.com/upload/drive/v2/files",
            data:{
                uploadType:"media",

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
                alert("Success");
                window.location.href = "<?= base_url('packsack') ?>";

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