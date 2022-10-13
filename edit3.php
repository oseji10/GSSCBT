<div class="modal fade" id="edit<?php echo $i['course_id']?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left">Update</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form class="form-sample" method="POST" action="View-Course">
                                        <div class="row">
                                          <div class="col-md-12">
                                                <input type="hidden" name="course_id" value="<?php echo $i['course_id']?>"  />
                                          </div>
                                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Course Title</label>
                            <div class="col-sm-9">
                              <input type="text"  name="course_title" class="form-control" value="<?php echo $i['course_title']?>" />
                            </div>
                          </div>
                        </div>  
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <input type="submit" value="Update" name="update" class="btn btn-success">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
