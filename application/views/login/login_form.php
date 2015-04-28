	<div class="row login_box col-lg-offset-4">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="outter"><img src="<?php
			echo base_url();
			if(!(isset($profimg)&&$uname!=""))
			{
			echo "img/noimage.png"; 
			}
			else
			{
			echo "avatars/".$profimg; 	
			}
			?>" class="image-circle img-circle" alt="Profile Image"/></div>   
			
            <h2 style="color:#fff">
			<?php
			if(!(isset($uname)&&$uname!=""))
			{
			echo "Hi User"; 
			}
			else
			{
			echo "Hi ".$uname; 	
			}
			?></h2>
	    </div>
		
        <div class="col-md-12 col-xs-12 login_control">
		<?php
								if( $error ) {
									echo '<div class="alert alert-danger text-center">';
										echo "No Such User or Password found";
									echo '</div>'; 
									}
									
									$error= FALSE;
	   ?>
		
		
		
			<?php
			 // Attributes for HTML
			 $fattr = array('class'=>"form-horizontal",'id'=>"loginForm",'name'=>"loginForm");
			 $uattr = array('id'=>"username" ,'type'=>"text", 'class'=>"form-control" ,'name'=>"login", 'placeholder'=>"Student/Faculty Id");
			 $pattr = array('id'=>"password" , 'class'=>"form-control" ,'name'=>"password", 'placeholder'=>"Password");
			 $rtattr = array('value'=>"login-faculty" ,'name'=>"category" ,'checked'=>TRUE);
			 $rsattr = array('value'=>"login-student" ,'name'=>"category" ,'checked'=>TRUE);
			 $chkrem = array('type'=>"checkbox",'name'=>"remme" ,'id'=>"remme");
			 $butsub = array ('class'=>"btn btn-success", 'id'=>"login_button", 'type'=>"submit", 'style'=>"width:60%;margin-top:15px;margin-bottom:15px");
			 
			 echo form_open('loginmanager/process_form', $fattr);
             
             echo '<div class="control input-group" id="duser">
			 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';
			 
             echo form_input($uattr);
             
             echo '</div>';
                
             echo '<div class="control input-group" id="dpwd">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
			 
			 echo form_password($pattr);
             
             echo '</div>';
			 echo'<div class="control-group text-center">
             <div class="radio">';
             
             echo '<label>';
             echo form_radio($rsattr); echo'Faculty';
             echo '</label>';
			 echo '<label style="padding-left:24px">';
             echo form_radio($rtattr); echo'Student';
             echo '</label>
             </div>';
			
			 echo '<div class="checkbox">';
			
			 echo'<label>';
			 echo form_checkbox($chkrem); echo 'Remember Me';
			 echo '</label>';
			
			echo '</div>
												
            </div>';
				
            echo '<div align="center">';
           echo form_submit($butsub, "Submit");
            echo '</div>';
            echo form_close(); 
        echo '</div>';
        
        ?>
            
