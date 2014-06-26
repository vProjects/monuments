<?php
/*
include('v-includes/Hashids.php');


$hashids = new Hashids\Hashids('sale',5);

for($i=5;$i<100;$i++){
	echo $i.'<br>';
 $hash = $hashids->encrypt($i);
	echo $hash;
echo '<br>';

$numbers = $hashids->decrypt($hash);

print_r($numbers);
echo '<br>';
}
*/


include('lib/class.uniqueKey.php');

$uniqueKey = new uniqueKey();

//$uniqueKey->uniqueKeyGenerator();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<title>Monuments | Registration</title>
</head>

<body>
	<div class="container">
		<header>
			
		</header>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<h4>Total No. of Keys Generated Till date:
					<?php $lastCount = $uniqueKey->getLastCount(); 
						echo $lastCount[0]['COUNT(*)'];	
						
					?>
				</h4>			
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<form role="form" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Download old keyes in excel format</label>
				    <input type="submit" class="btn btn-primary" value="Download Key" data-toggle="modal" data-target="#myModal">
				  </div>
				</form>
			</div>	
			
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h4>Please click the below button to generate more 100 keys</h4>
				<form role="form" action="lib/function.uniquekey.php" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Generate Key</label>
				    <input type="hidden" name="request" value="Generate Key">
				    <input type="submit" class="btn btn-default"  name="uniqueKey"  value="Generate Key">
				  </div>
				</form>
			</div>
			
		</div>
		<!-- table of uniques keys -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<?php 
					$uniqueKeyTableValues = $uniqueKey->getKeys($lastCount[0]['COUNT(*)']-100, $lastCount[0]['COUNT(*)']);
					if(count($uniqueKeyTableValues) <=1 ){
						echo '<h4>There is no key generated yet</h4>';
					}
					else{
						echo '<h4>Recent 100 keys</h4>';
				?>
				<div class="table-responsive">
				      <table class="table">
				        <thead>
				          <tr>
				            <th>ID</th>
				            <th>Unique Keys</th>
				            <th>Corresponding URLS</th>
				            <th>Unique Key No</th>
				          </tr>
				        </thead>
				        <tbody>
				        	
				          <?php for($i=0; $i< count($uniqueKeyTableValues); $i++){  ?>
				          <tr>
				          	<td><?php echo $uniqueKeyTableValues[$i]['id']?></td>
				            <td><?php echo $uniqueKeyTableValues[$i]['uniqueKey'] ?></td>
				            <td>http://www.livingmonument.org/registration.php?id=<?php echo  $uniqueKeyTableValues[$i]['uniqueKey']?></td>
				            <td><?php echo $uniqueKeyTableValues[$i]['serialKey'] ?></td>
				          </tr>
				          <?php }  //for ends here ?>
				        </tbody>
				      </table>
				</div>	
				
			</div>			
		</div>
		<!-- responsive table ends here -->
		<?php } //else ends here ?>
		
	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Download data in Excel</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
				<div class="col-lg-12 col-md-12 col-xs-12">
					<form class="form-horizontal" action="lib/function.uniquekey.php" method="post" role="form">
					  <div class="form-group">
					    <label for="from" class="col-sm-2 control-label">From</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="from" name="excelFrom" placeholder="Please enter the 'From' value  Ex: 20">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="to" class="col-sm-2 control-label">To</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="to" name="excelTo" placeholder="Please enter the 'to' value  Ex: 100">	
					      <input type="hidden" name="request" value="Download Excel">				    
					     </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <input type="submit" name="DownloadExcel" value="Download Excel" class="btn btn-default">
					    </div>
					  </div>
					</form>	
				</div>	
			</div>	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>	
	
</body>
</html>