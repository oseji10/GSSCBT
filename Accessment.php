
<div class="modal fade" id="acm<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title text-center" >Add Accessment For <?php echo $i['username']?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
<form class="form-horizontal custom-form" action="View-Result-Staff"  method="POST">
<input class="form-control" name="id"  id="name-input-field" value="<?php echo $i['id']?>" type="hidden">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <input type="text"  class="form-control" name="acm" placeholder="Add Mark">
                                          <div class="input-group-append">
                                            <span class="input-group-text">
                                              <i class="fa fa-check-circle"></i>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
          
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">Add Mark </button> 
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<!--MODEL-->