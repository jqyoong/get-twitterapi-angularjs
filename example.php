<?php 	require "library/autoloader.php";
		use Abraham\TwitterOAuth\TwitterOAuth;
?>

<?php

	$consumer = "";
	$consumersecret = "";
	$accesstoken = "";
	$accesstokensecret = "";

	$date = date('d-m-Y');
	$connection = new TwitterOAuth($consumer,$consumersecret,$accesstoken,$accesstokensecret);
	$delimiter = "\n";
	$contentarray = array();
	$tweets_count=20;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Tweets Location System:Example </title>
		<link rel="stylesheet" href="css/angular-material.css">
		<link rel="stylesheet" href="css/app.css">
		<link rel="stylesheet" href="css/map.css">
	</head>
	<body  lang="en" ng-app="myApp">
		
    	
		<div layout="column">
			
			<md-toolbar>
				<md-content style="background-color: #2196F3"   layout="column">
					<md-card>
   						<md-input-container>
							<h1 class="md-toolbar-tools">Tweets Location System:Example</h1>
						</md-input-container>
   		    		</md-card>
 		    	</md-content>
			</md-toolbar>
			
		</div>
	<!-- start div for input container box for search keywords-->
	<div layout="row" layout="column" style="background-color: #6cbbf4">
		<div>
			<md-content style="background-color: #6cbbf4">
		   		<md-card>
			   		<div ng-controller="AppCtrl" id="search-panel">
			         	<md-card>
				         	<md-input-container>
					            <form action="" method="POST">
					                <label>Search : </label>
					                <input name="keyword"/>
					                <md-content>
						                <md-card-actions layout="column" layout-align="start">
						                	<md-button type="submit"  class="md-raised md-primary" >Submit</md-button>
						                </md-card-actions>
						                <input type="checkbox" name="csv" value="csv" id="csv"/><label>Save CSV</label>
						                <input type="radio" name="type"
											<?php if(isset($_POST['type'])){
												$result_type="recent";
											}?>
										value="recent"><label>Recent</label>
										<input type="radio" name="type"
											<?php if(isset($_POST['type'])){
												$result_type="mixed";
											}?>
										value="mixed"><label>Mixed</label>
					                </md-content>
					            </form>
					        </md-input-container>
				        </md-card>
				        	<input type="hidden" id="passstr" name="passstr" value=""/> 
			   		</div>
			   		<div id="floating-panel">
				      	<md-button type="button" onclick="changeRadius()" class="md-raised md-primary" >Change Radius</md-button>
				      	<md-button type="button" onclick="toggleHeatmap()" class="md-raised md-primary" >Heat Map</md-button>
				    </div>
		     		<div id="map">
		     		</div>
		     		<script src="js/map.js"></script>
		     		     <script async defer
						      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw74yXNYkKSiDGQNNGh7qzsvrf0zYipxY&signed_in=true&libraries=visualization&callback=initMap">
						 </script>
		   		</md-card>
	 		 </md-content>
 		</div>
  	</div>
	<!-- end div for input container box for search keywords-->
	<!-- start div for query to get for location 1-->
	<div>
 	 	<md-content style="background-color: #E3F2FD" class="md-padding">
    		<md-card>
   			<h1 class="md-title"> Location : 3.115022,101.678453,1km</h1>
    			<md-card-content>
					<?php
					
						if(isset($_POST['keyword']))
						{
							$keyword = htmlentities($_POST{'keyword'});
							$content = $connection->get("search/tweets",array(
							"q" => $keyword,
							"result_type"=>$result_type,
							"count"=>$tweets_count,
							"geocode"=>"3.115022,101.678453,1km", //federal highway
							));
						
							if(isset($content->statuses) && is_array($content->statuses)) 
							{
						    if(count($content->statuses)) 
						    	{

						        foreach($content->statuses as $contents)
						        	{
						        	$count=0;
						            echo '<div>
						 	 			<md-content class="md-padding">
						    			<md-card>
						    			<md-card-content>'.'.<img src="'.$contents->user->profile_image_url.'" />.'.$contents->user->name.'<br>' .$contents->text.'<br>'.$contents->created_at.'<br><br></md-card-content>
										</md-card>
										</div>';
										array_push($contentarray,$contents->text);
										$count++;
									}
										
						        }
						    }
						    else 
							    {
							        echo 'The result is empty';
							    }
							        if(isset($_POST['csv']))
							        {
								        $file = fopen($date.".csv","w");
										fputcsv($file,$contentarray,$delimiter);
										fclose($file);
									}
					    }
					?>
				</md-card-content>
			</md-card>
		</md-card-content>
	</div>
	<!-- end div for query to get for location 1-->
	<!-- start div for query to get for location 2-->
	<div>
 	 	<md-content style="background-color: #E3F2FD" class="md-padding">
    		<md-card>
   			<h1 class="md-title"> Location : 3.109216,101.651381,1km</h1>
    			<md-card-content>
					<?php
					
						if(isset($_POST['keyword']))
						{
							$keyword = htmlentities($_POST{'keyword'});
							$content = $connection->get("search/tweets",array(
							"q" => $keyword,
							"result_type"=>$result_type,
							"count"=>$tweets_count,
							"geocode"=>"3.109216,101.651381,1km", //federal highway
							));
							
							if(isset($content->statuses) && is_array($content->statuses)) 
							{
						    if(count($content->statuses)) 
						    	{

						        foreach($content->statuses as $contents) 
						        	{
							        	$count=0;
							            echo '<div>
							 	 			<md-content class="md-padding">
							    			<md-card>
							    			<md-card-content>'.'.<img src="'.$contents->user->profile_image_url.'" />.'.$contents->user->name.'<br>' .$contents->text.'<br>'.$contents->created_at.'<br><br></md-card-content>
											</md-card>
											</div>';
											array_push($contentarray,$contents->text);
											$count++;
									}
										
						        }
						    }
						    else 
						    	{
						        	echo 'The result is empty';
						    	}
						        if(isset($_POST['csv']))
						        	{
								        $file = fopen($date.".csv","w");
										fputcsv($file,$contentarray,$delimiter);
										fclose($file);
									}
					    }
					?>
				</md-card-content>
			</md-card>
		</md-card-content>
	</div>
	<!-- end div for query to get for location 2-->
	
	<!--design,controller,module for angular material-->
	<script src="js/angular.js"></script>
    <script src="js/angular-animate.js"></script>
    <script src="js/angular-aria.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/angular-material.js"></script>
	<script src="js/app.js"></script>
	</body>
</html>
