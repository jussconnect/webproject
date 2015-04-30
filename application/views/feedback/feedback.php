    <div id="wrapper">

     
        
		<div class="page_inside">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
					
                  <div class="panel panel-default">
                       
                        <div class="panel-body" style="background-color:#fcfcfc">
						
						<h3 class="text-center"><strong>Help Us Improve!</strong></br><small><?php echo $_SESSION['SESS_U_NAME'];?></small></h3>
						<div class="col-md-12 text-center">
							<img alt="" style="width:150px;height:150px;margin-bottom:20px" title="" class="img-circle img-thumbnail" src="<?php echo "avatars/".$_SESSION['profimg']; ?>" data-original-title="Usuario"> 
                                                </div>
						
                                                <?php
                                                $attributes = array('class' => 'form-horizontal', 'id' => 'feedback_form');
                                                echo form_open('feedback/f_validation', $attributes); 
                                             
                                                ?>
                                                
                                                <div class="col-lg-12">
						<div class="alert alert-success text-center col-lg-5 col-lg-offset-4" id="feedback_sent" style="display:none">	
							Thank You for your valuable Feedback
						</div>
						</div>
                                                <div class="form-group" id="dthought">
									<label for="icode" class="col-md-3 control-label">What did you find most interesting?</label>
                                    <div class="col-md-9">
                                        <textarea type="text"  name="thought" class="form-control" rows="3" placeholder="Lets value each other!" id="thought"></textarea>  
                                    </div>
                                </div>
								<div class="form-group" id="dsuggestion">
									<label for="icode" class="col-md-3 control-label">How easy was it to interact with everyone?</label>
										<div class="col-md-9">

										    
											<label class="radio-inline">
                                                <input name="optionsRadiosInline" id="optionsRadiosInline" value="very easy" checked="" type="radio">Very Easy
                                            </label>
											<label class="radio-inline">
                                                <input name="optionsRadiosInline" id="optionsRadiosInline" value="easy" checked="" type="radio">Easy
                                            </label>
																						<label class="radio-inline">
                                                <input name="optionsRadiosInline" id="optionsRadiosInline" value="average" checked="" type="radio">Average
                                            </label>
											<label class="radio-inline">
                                                <input name="optionsRadiosInline" id="optionsRadiosInline" value="difficult" checked="" type="radio">Somewhat Difficult
                                            </label>
										</div>
                                </div>
								
								<div class="form-group">
									<label for="icode" class="col-md-3 control-label">How well did we communicate with you?</label>
										<div class="col-md-9">		
											<label class="radio-inline">
                                                <input name="optionsRadiosInline2" id="optionsRadiosInline" value="Very Easy" checked="" type="radio">Very Easy
                                            </label>
											<label class="radio-inline">
                                                <input name="optionsRadiosInline2" id="optionsRadiosInline" value="Easy" checked="" type="radio">Easy
                                            </label>
																						<label class="radio-inline">
                                                <input name="optionsRadiosInline2" id="optionsRadiosInline" value="Average" checked="" type="radio">Average
                                            </label>
											<label class="radio-inline">
                                                <input name="optionsRadiosInline2" id="optionsRadiosInline" value="Somewhat Difficult" checked="" type="radio">Somewhat Difficult
                                            </label>
										</div>
                                </div>
								
								<div class="form-group" id="dthought">
									<label for="icode" class="col-md-3 control-label">Do you have any other comments, questions, or concerns?</label>
                                    <div class="col-md-9">
                                        <textarea type="text"  name="comments" class="form-control" rows="3" placeholder="Any unanswered query of yours? Please share!" id="thought"></textarea>  
                                    </div>
                                </div>
								
								<div style="height:20px"></div>
								<div class="col-md-12 text-center">
                                                                    <button class="btn btn-success btn-lg" type="submit" style="width:50%" id="submit" name="submit">Submit</button>
								</div>
                        <?php echo form_close(); ?>                   
                        </div>
                        <!-- .panel-body -->
					
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg11 -->
            </div>
            <!-- /.row -->
			</div>
        
        <!-- /#page-wrapper -->

    </div>
