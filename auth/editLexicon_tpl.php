<!-- Modal -->
  <div class="modal fade " id="newItemModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
       <form action="./../inc/saveEntry.inc.php" method ="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?php echo (($itemID==-1)?"Add new item":"Edit item"); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-wrap">
            <div class="left-side px-3 col-sm-12 col-md-4">
                <div class="image-holder">
                    <img id="image-holder-editLexicon" src="<?php echo ("./../lexicon-img/".$imgpath); ?>" alt="My image to load"  >
                </div>
                <input type='file' id="imgInp" name="file" accept="image/*" onchange="onFileSelected(event);" value="<?php echo($imgpath); ?>" />
                <div class="browse-button-area">

                </div>
            </div>
            <div class="right-side px-3 col-sm-12 col-md-4">
               
                    <div class="form-group d-flex flex-wrap">
                        <label for="title">Title : </label>
                        <input type="text" name="title" id="title" placeholder="add a title" value="<?php echo ($title)?>">
                    </div>
                    <div class="form-group d-flex flex-wrap">
                        <label for="teaser">Teaser: </label>
                        <input type="text" name="teaser" id="teaser" placeholder="add a teaser"  value="<?php echo ($teaser)?>">
                    </div>
                    <div class="form-group d-flex flex-wrap">
                        <label for="description">Description: </label>
                        <input type="textarea" name="description" id="description" placeholder="add a description" value="<?php echo ($description)?>" >
                    </div>
                    <input type="text" name ="new-or-old" value ="<?php echo ($itemID); ?>">

                
            </div>
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        
        </div>
        </form>
      </div>
    </div>
  </div>

  <script> // will change the image when selected in the frame
        "use strict";
        function onFileSelected(event){
            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            console.log(selectedFile);
            var imgtag = document.getElementById("image-holder-editLexicon");
            console.log(imgtag)
            imgtag.title = selectedFile.name;

            reader.onload = function(e) {
                imgtag.src = e.target.result;
                
            }
            reader.readAsDataURL(selectedFile);
        };

        
        
    </script>

