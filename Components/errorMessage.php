<?php
 
    function showErrorMessage($errorMessage, $errorTitle){
        echo('
 
        <div id="error" class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">'.$errorTitle.'</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="hideModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>'.$errorMessage.'</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="hideModal()">Close</button>
            </div>
          </div>
        </div>
      </div>
 
      <script>
       $(window).on("load", function() {
        $("#error").modal().show();
    });
      </script>
      <script>
      function hideModal(){
        $("#error").modal().hide();
      }
      </script>
      ');
 
    }
 
?>
 
 