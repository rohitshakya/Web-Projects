<!--script library for one drive-->
<script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>
<!--script library for one drive-->


<!--dropbox-->
<div class="page-body">

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="page-header-left">
            <h3>Packsack</h3>

          </div>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12">
          <form name="upload" action="<?php echo base_url("packsackupload"); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="uploadtitle" class="form-control" required="" style="width: 40%; height: 44px; float: left; margin-right: 10px;" placeholder="Name of file" />
            <input type="file" name="uploadfile" class="form-control" required="" style="width: 40%; float: left; margin-right: 10px;" />
            <input type="submit" name="submit" class="btn btn-secondary" value="upload"/>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for add from library tab -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content sizemodel">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add from Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
          aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="sidebar-menu">

          <li class="mt-2">
            <a class="sidebar-header closed" href="javascript:;"  onClick="launchOneDrivePicker()"> <span class="m-0"><img
              src="<?=base_url('assets')?>/schoolassets/images/cloud.jpg"></span>
            </a>
          </li>
          <li class="mt-2">
            <a class="sidebar-header closed" href="javascript:;" onclick="loadPicker();"> <span class="m-0"><img
              src="<?=base_url('assets')?>/schoolassets/images/googledrive.png"></span>
            </a>
          </li>
          <li class="mt-2">
            <div id="dropbox-container" class="closed"></div>

          </li>
        </ul>

      </div>
    </div>
  </div>
</div>

<!-- Modal for add from library tab -->

<!-- Modal for add to library tab -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content sizemodel">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel2">Add to Library</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
        aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <ul class="sidebar-menu">

        <li class="mt-2">
          <a class="sidebar-header " href="<?=base_url('test')?>"> <span class="m-0"><img
            src="<?=base_url('assets')?>/schoolassets/images/cloud.jpg"></span>
          </a>
        </li>
        <li class="mt-2">
          <a class="sidebar-header " href="javascript:;" id="uploaddrive"> <span class="m-0"><img
            src="<?=base_url('assets')?>/schoolassets/images/googledrive.png"></span>
          </a>
        </li>
        <li class="mt-2">
         <a class="sidebar-header " href="<?=base_url('test')?>"> <span class="m-0"><img
            src="<?=base_url('assets')?>/schoolassets/images/dropbox.png" style="width: 30px;"></span>
          </a>
        </li>

      </ul>

    </div>
  </div>
</div>
</div>
<!-- Modal for add to library tab -->




<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">

    <div class="col-xl-12">
      <div class="card tab2-card">
        <div class="card-body">
          <div class="row">
            <div class="small-12 columns">

              <ul id="img_list" class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">

              </ul>
            </div>
          </div>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
            Add from library
          </button>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2">
            Add to library
          </button>

          <?php
          $uses = 0; 
          $allow = ($getLogin->vc_usertype=='teacher' || $getLogin->vc_usertype=='admin')?'1 GB':'500 MB';

          if($filelist){
            foreach($filelist as $getSize){


              if($getSize->filesize!='' && $getSize->filesize>=0){
                $uses = $uses+$getSize->filesize;
              }
            }
          }
        //$uses = (round($uses/1024)<1024)?round($uses/1024).' MB':round($uses/1024).' GB';
          $uses = ($uses>0)?formatSizeUnits($uses):0;
          ?>
          <button class="btn pull-right">Disc Usage : <?php echo $uses . " / ".$allow; ?></button>

          <div class="tab-content" id="top-tabContent">
            <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">

                    <div class="card-body order-datatable">

                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>File Name</th>
                            <th>File</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($filelist): 
                            foreach($filelist as $getFile):
                              $keyname  = str_replace('https://voltdata.s3.ap-south-1.amazonaws.com/', '', $getFile->url);
                              ?>
                              <tr>
                                <td><?php echo $getFile->title;?></td>
                                <td><a href="<?php echo $getFile->url;?>" class="badge badge-info" target="_blank">View</a></td>
                                <td><a href="<?php echo base_url('packsack?action=remove&file='.$keyname.'&ids='.$getFile->id); ?>" onclick="return confirm('Are you sure! Do you want remove this file?')" class="badge" style="background-color: #ff0909; color: #FFF;">Remove</a></td>
                              </tr>
                            <?php endforeach; endif; ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

</div>

<script type="text/javascript">
  $(document).ready(function(){

     var clientId = "4655950119-3h7kdlruim2lblef6gmcrmbok46uki85.apps.googleusercontent.com";
     /*keyforlocal*/
    //var clientId="4655950119-k1u7qvfsr90g4ic42dv5grofihmf70kp.apps.googleusercontent.com";
     var redirect_uri = "<?=base_url('')?>/uploadfilestodrive";
     var scope = "https://www.googleapis.com/auth/drive";
     var url = "";
     $("#uploaddrive").click(function(){
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
  <script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>
  <script type="text/javascript">
    function launchOneDrivePicker(){
      var odOptions = {
        clientId: "56f5349c-a6cf-4342-96aa-8d1295f323c4",
        action: "query",
        multiSelect: true,
        advanced: {
          queryParameters: "select=id,name,size,file,folder,photo,@microsoft.graph.downloadUrl",
        filter: "all" /* display folder and files with extension '.png' only or folder,.png,.jpg,.pdf,  */},
        success: function(files) { 
          /* success handler */
          console.log("success");
        
         console.log(files.value[0]['@microsoft.graph.downloadUrl']);
          },
        cancel: function() { /* cancel handler */ },
        error: function(error) { 
          alert(error);

        /* error handler */ }
      }
      OneDrive.open(odOptions);
    }
  </script>


  <!--dropbox picker-->
  <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="do0d2uue6oeqgiw"></script>
  <style type="text/css">
  h1 {
    font-family: 'open-sans'; 
  }
  #img_list {
    background-color: #ccc;
    min-width: 100%;
    min-height: 50px;
  }
  #img_list li {
    list-style-type: none;
    display: inline;
  }
  #img_list img {
    max-width: 200px;
  }
</style>

<script type="text/javascript">
    /**
 * Chooser (Drop Box)
 * https://www.dropbox.com/developers/dropins/chooser/js
 */
 options = {
  success: function(files) {
    files.forEach(function(file) {
      add_img_to_list(file);
    });
  },
  cancel: function() {
      //optional
    },
    linkType: "preview", // "preview" or "direct"
    multiselect: true, // true or false
    extensions: ['.png', '.jpg','.pdf', '.doc', '.docx','.csv','.xls'],
  };

  var button = Dropbox.createChooseButton(options);
  document.getElementById("dropbox-container").appendChild(button);

  function add_img_to_list(file) {
    console.log(file);

    var li  = document.createElement('li');
    var a   = document.createElement('a');
    a.href = file.link;
    var img = new Image();
    var src = file.thumbnailLink;
    src = src.replace("bounding_box=75", "bounding_box=256");
    src = src.replace("mode=fit", "mode=crop");
    img.src = src;
    img.className = "th"
    document.getElementById("img_list").appendChild(li).appendChild(a).appendChild(img);
  }
</script>
<!--dropbox picker-->

<script type="text/javascript">


    // The Browser API key obtained from the Google API Console.
    // Replace with your own Browser API key, or your own key.
    var developerKey = 'AIzaSyAz3K3wI24uLawM63ZDKJBI_LokaSHyKww';
   

    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
    //var clientId = "4655950119-3h7kdlruim2lblef6gmcrmbok46uki85.apps.googleusercontent.com"
    var clientId="4655950119-k1u7qvfsr90g4ic42dv5grofihmf70kp.apps.googleusercontent.com"

    // Replace with your own project number from console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "drivedemo-314206";

    // Scope to use to access user's Drive items.
    var scope = ['https://www.googleapis.com/auth/drive.file'];

    var pickerApiLoaded = false;
    var oauthToken;

    // Use the Google API Loader script to load the google.picker script.
    function loadPicker() {
      gapi.load('auth', {'callback': onAuthApiLoad});
      gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
      window.gapi.auth.authorize(
      {
        'client_id': clientId,
        'scope': scope,
        'immediate': false
      },
      handleAuthResult);
    }

    function onPickerApiLoad() {
      pickerApiLoaded = true;
      createPicker();
    }

    function handleAuthResult(authResult) {
      if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createPicker();
      }
    }

    // Create and render a Picker object for searching images.
    function createPicker() {
      if (pickerApiLoaded && oauthToken) {
        var view = new google.picker.View(google.picker.ViewId.DOCS);
        view.setMimeTypes("image/png,image/jpeg,image/jpg");
        var picker = new google.picker.PickerBuilder()
        .enableFeature(google.picker.Feature.NAV_HIDDEN)
        .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
        .setAppId(appId)
        .setOAuthToken(oauthToken)
        .addView(view)
        .addView(new google.picker.DocsUploadView())
        .setDeveloperKey(developerKey)
        .setCallback(pickerCallback)
        .build();
        picker.setVisible(true);
      }
    }

    // A simple callback implementation.
    function pickerCallback(data) {
      if (data.action == google.picker.Action.PICKED) {
        var fileId = data.docs[0].id;
        window.open("https://drive.google.com/file/d/"+fileId+"/view?usp=drivesdk");
        window.location.href = "<?php echo base_url();?>" +"/packsack";
      }
    }
  </script>
</head>
<!-- The Google API Loader script. -->
<script type="text/javascript" src="https://apis.google.com/js/api.js"></script>

 

