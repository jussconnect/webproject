<?php
	require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User-<?php echo $_SESSION['SESS_U_NAME']; ?></title>
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
			//Vishnu do not worry about this page I will tell you more about this.
	?>
	
        <div id="page-wrapper">
		<?php 
								$errflag=false;
								$id = $_GET['id'];
								$type=$_GET['type'];
								$result=file_get_contents($url."im/indexsite.php?username=".$_SESSION['SESS_FIRST_NAME']."&password=".$_SESSION['PASS']."&action=profile_".$_SESSION['LOGIN_ID']."&id=".$id."&type=".$type);
								if($result=="0"||$result=="")
								{
								$errflag=true;
								$errorval = array("Error - Showing User Profile");
								}
								else
								{	
								$xmlobject=new SimpleXMLElement($result);
		?>
		<div class="page_inside">
		<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4 text-center doc-item">
            <img alt="" style="width:200px;height:200px;" title="" class="img-circle img-thumbnail doc-img" src="<?php echo "avatars/".$xmlobject->profimg; ?>" data-original-title="Usuario"> 
			<h4><?php echo $xmlobject->name; ?></h4>
		</div>
        <div class="col-md-7">
            <table class="table table-striped table-hover">
                <tbody>
				<?php if($type=="0"){ ?>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk"></span>
                                ID                                            
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->username; ?>     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user"></span>    
                                Name                                                
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->name; ?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="fa fa-graduation-cap"></span>  
                                Year                                              
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->year; ?>  
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-book"></span> 
                                Branch                                              
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->branch; ?> 
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope"></span> 
                                Email                                                
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->email; ?>  
                        </td>
                    </tr>
					<?php
						if($_SESSION['LOGIN_ID'] == "Teacher")
					{
						 echo "<tr>        
							<td>
								<strong>
									<span class='glyphicon glyphicon-earphone'></span>
									Phone                                              
								</strong>
							</td>
							<td class='change_font'>
								".$xmlobject->phone."
							</td>
						</tr>";
					}
					?>
					 <?php }else{ ?>
					<tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user"></span>    
                                Name                                                
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->name; ?>     
                        </td>
                    </tr>	

					 <tr>
                        <td><strong><span class="glyphicon glyphicon-asterisk"></span> Department</strong></td>
                        <td><?php echo $xmlobject->depart; ?>
						</td>
                      </tr>
					  
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope"></span> 
                                Email                                                
                            </strong>
                        </td>
                        <td>
                            <?php echo $xmlobject->email; ?>  
                        </td>
                    </tr>    
					<?php } ?>
                </tbody>
            </table>
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
        </div>
      </div>
	  
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

</body>
<script>
$('[data-toggle="tooltip"]').tooltip();
</script>

</html>
