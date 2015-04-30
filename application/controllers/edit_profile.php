<?php
	require_once('auth.php');
	if (isset($_GET['act'])&&isset($_SESSION['ext'])) 
	{
	$res_imgupd=file_get_contents($url."im/indexsite.php?username=".$_SESSION['SESS_FIRST_NAME']."&password=".$_SESSION['PASS']."&action=upd_profimg_".$_SESSION['LOGIN_ID']."&fname="."t_".$_SESSION['p']."_".$_SESSION['SESS_MEMBER_ID'].".".$_SESSION['ext']);	
	$_SESSION['profimg']="t_".$_SESSION['p']."_".$_SESSION['SESS_MEMBER_ID'].".".$_SESSION['ext'];
	unset($_SESSION['p']);
	unset($_SESSION['user_file_ext']);
	unset($_SESSION['ext']);
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Profile - JussConnect</title>
	<link rel="icon" type="image/png" href="img/jussicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="css/juss.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

	
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

      <?php
			//include('sidebar.php');
		?>

        <div id="page-wrapper">
            <div class="page_inside">
			
            <div class="row">
                <div class="col-lg-12">
					
                  <div class="panel panel-default">
                       
                        <div class="panel-body" style="background-color:#f6f6f6">
						  <div class="col-md-4 col-sm-6 col-xs-12 text-center">
							<img src="<?php echo "avatars/".$_SESSION['profimg']; ?>" class="img-circle img-thumbnail" style="height:200px;width:200px" alt="avatar">
							<h5 class="upld_err">Upload new photo...</h5>
							
							<form name="photo" enctype="multipart/form-data" action="edit_profileimg.php" method="post">
								<input type="file" id="browse_btn" class="center-block well well-sm" style="padding:5px;padding-right:0" name="image" size="30" /> 
								<input type="submit" id="upload_btn" name="upload" class="btn btn-default hidden-xs" value="Upload Photo" style="display:none"/>
							</form>	
							
						   </div>
						   <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
							<form id="addPost" class="form-horizontal"  role="form" action="update_profile.php" method="post"> 
								<?php 
								$errflag=false;
								$result=file_get_contents($url."im/indexsite.php?username=".$_SESSION['SESS_FIRST_NAME']."&password=".$_SESSION['PASS']."&action=get_profile_".$_SESSION['LOGIN_ID']);
								if($result=="0"||$result=="")
								{
								$errflag=true;
								$errorval = array("Error - Updating User Profiles",$url."im/indexsite.php?username=".$_SESSION['SESS_FIRST_NAME']."&password=".$_SESSION['PASS']."&action=get_profile_".$_SESSION['LOGIN_ID']);
								}
								else
								{	
								$xmlobject=new SimpleXMLElement($result);
								?>
								
								<div class="form-group">
									<label for="icode" class="col-md-3 control-label">Username/College ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" value="<?php echo $xmlobject->username; ?>" disabled>
                                    </div>
                                </div>
								<?php if($_SESSION['LOGIN_ID']=="Student"){ ?>
								<div class="form-group">
									<label for="icode" class="col-md-3 control-label">Branch</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="branch" value="<?php echo $xmlobject->branch; ?>" disabled>
                                    </div>
                                </div>
								<div class="form-group">
									<label for="icode" class="col-md-3 control-label">Year</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="year" value="<?php echo $xmlobject->year; ?>" disabled>
                                    </div>
                                </div>
								<?php }else{ ?>
								<div class="form-group">
									<label for="icode" class="col-md-3 control-label">Department</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="depart" value="<?php echo $xmlobject->depart; ?>" id="depart">
                                    </div>
                                </div>
								<?php } ?>
								<div class="form-group" id="dphone">
									<label for="icode" class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control change_font" name="phone" value="<?php echo $xmlobject->phone; ?>" id="phone">
                                    </div>
                                </div>
								<div class="form-group" id="dmail">
									<label for="icode" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="mail" value="<?php echo $xmlobject->email; ?>" id="mail">
                                    </div>
                                </div>
								<div class="form-group" id="dpwd">
									<label for="icode" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="pwd" id="pwd">
										<small>* leave it blank if you don't want to change it. </small>
                                    </div>
                                </div>
								<div class="form-group" id="dcpwd">
									<label for="icode" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="cpwd" id="cpwd">
										<p id="pwd_ntsame" style="color:red;display:none">Passwords don't match</p>
                                    </div>
                                </div>
									<?php 
									}
									if($errflag) 
									{
									$_SESSION['ERRMSG_ARR'] = $errorval;
									session_write_close();
									header("location:dashboard.php");
									}
											
									?>
								
								<div class="col-md-12 text-center">
								<div class="col-md-4 col-lg-offset-5">
								<button class="btn btn-success btn-lg" type="submit" style="width:100%" id="update">Update</button>
								</div>
								</div>
							</div>	
                        </div>
                        <!-- .panel-body -->
						</form>
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg11 -->
            </div>
            <!-- /.row -->
			</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
	 
	 <script>
		$(document).ready(function() {
			
			$("#browse_btn").click(function(event){
				$("#upload_btn").show();
				$(".upld_err").html("<div class='visible-xs' style='color:red'>You can't upload from here :(</br></br>Make your Profile Picture look great :)</br></br>Upload from Desktop...Hurry!!!</div>");
			});
			
			$("#upload_btn").click(function(event){
				var image = $("#browse_btn").val();
				if(!image)
				{
					$(".upld_err").html("<div style='color:red'>Select Image to Upload</div>")
					event.preventDefault();
				}	
				
				var fileSize = $("#browse_btn")[0].files[0].size;
				var sizeInMb = (fileSize/2097152);
				if(fileSize>2097152)
				{
					$(".upld_err").html("<div style='color:red'>Choose File less than 2MB</div>");
					event.preventDefault();
				}

			});
			
			$("#update").click(function(event){
				var input_user = $("#phone").val();
				if (input_user==''){
					$("#dphone").addClass("has-error");
					event.preventDefault(); 
				}
				else{
				$("#dphone").removeClass("has-error");
				}	

			<!-- mail can't be blank-->
				var input_mail = $("#mail").val();
				
				if (input_mail==''){
					$("#dmail").addClass("has-error");
					event.preventDefault(); 
				}
				else{
				$("#dmail").removeClass("has-error");
				}
				
				var input_pwd = $("#pwd").val();
				var input_cpwd = $("#cpwd").val();
				
				if(input_pwd==input_cpwd)
				{
					if((input_pwd.length)<6&&(input_pwd.length)!=0)
					{
						alert("please input password of minimum 5 characters");
						event.preventDefault();
					}
					else
					{
					$("#dpwd").removeClass("has-error");
					$("#dcpwd").removeClass("has-error");
					}
				}
				
				else
				{
					$("#dpwd").addClass("has-warning");
					$("#dcpwd").addClass("has-warning");
					$("#pwd_ntsame").show();
					event.preventDefault();
				}	
			
			});
		});		
</script>
</body>

</html>
