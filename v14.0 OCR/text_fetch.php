<div class="page-body">

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>Sync with school</h3>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row product-adding">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h5 id=fetchedText>Fetch</h5>
          </div>
          <div class="card-body">
            <div class="digital-add needs-validation">
              <?php

              if(session()->get('msg')){?>
               <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('msg') ?>
              </div>
            <?php  }

            ?>

            <input type="file" onchange="previewFile()">
            
            
          </div>
          <button id="fetchText" class="btn btn-info pull-right">Fetch</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>



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
  function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
      myimgurl=reader.result;    
            //console.log(reader.result);
          };
          reader.onerror = function (error) {
            console.log('Error: ', error);
          };
        }

// prints the base64 string
</script>





<script type="text/javascript">

  $('#fetchText').on('click',function(){
    //console.log(myimgurl);
    let xhr = new XMLHttpRequest();
    var sourceImage2=encodeURIComponent(myimgurl);
    var sourceImage="http://jeroen.github.io/images/testocr.png";
    var apiKey="d8e707b9b288957";
   //var filetype='png';
   var params = 'apikey='+apiKey+'&language=eng&isOverlayRequired=true&iscreatesearchablepdf=false&issearchablepdfhidetextlayer=false'+'&base64Image='+sourceImage2;

   xhr.open('POST', 'https://api.ocr.space/parse/image');

   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   xhr.onload = function() {
  //console.log('Fetch Text: ' + xhr.responseText);
  const obj = JSON.parse(xhr.responseText);
  //console.log(obj.ParsedResults[0]['ParsedText']);
  document.getElementById("fetchedText").innerHTML = obj.ParsedResults[0]['ParsedText'];
};
xhr.send(params);

});
</script>




<!-- dropbox -->


