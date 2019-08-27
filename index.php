<?php
	// html grabber
	// get the ptt content by using php
	include("class/simple_html_dom.php");
	
	$url_prefix 	= "http://www.ptt.cc";
	
	$codejob_url 	= "http://www.ptt.cc/bbs/CodeJob/index.html";
	$soho_url 		= "http://www.ptt.cc/bbs/soho/index.html";
	$parttime_url 	= "http://www.ptt.cc/bbs/part-time/index.html";
	$softjob_url 	= "http://www.ptt.cc/bbs/Soft_Job/index.html";
	$hometeach_url 	= "http://www.ptt.cc/bbs/HomeTeach/index.html";
	$teacher_url 	= "http://www.ptt.cc/bbs/teacher/index.html";
	
	function get_result_array($url_prefix, $url){
		$result_array = array();
		$html = file_get_html($url);
		
		
		// get the prev page
		$get_url = "";
		$prev_url = "";
		foreach($html->find("div[class=btn-group pull-right] a") as $element){
			if(preg_match_all("/上頁/", $element->plaintext)){
				$prev_url = $element->href;
			}
		}
		
		$get_url = file_get_html("".$url_prefix."".$prev_url."");
		
		// Find all links 
		foreach($get_url->find('div.title a') as $element){
			array_push($result_array, $element);
		}
		
		// Find all links 
		foreach($html->find('div.title a') as $element){	
			array_push($result_array, $element);
		}
		
		// sort
		krsort($result_array);
		
		return $result_array;
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Code Job Opportunity</title>
	<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
	<div class="container">
		<h1><a href="./">Code Job Opportunity</a></h1>
		<h3>Get data from PTT</h3>
		<div class="well">
			<ul class="nav nav-tabs" id="myTab">
			  <li><a href="#codejob" data-toggle="tab">Code Job</a></li>
			  <li><a href="#soho" data-toggle="tab">Soho</a></li>
			  <li><a href="#parttime" data-toggle="tab">Part Time</a></li>
			  <li><a href="#softjob" data-toggle="tab">Soft Job</a></li>
			  <li><a href="#hometeach" data-toggle="tab">Home Teach</a></li>
			  <li><a href="#teacher" data-toggle="tab">Teacher</a></li>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane active" id="codejob">
				<?php			
					$get_array = get_result_array($url_prefix, $codejob_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			  <div class="tab-pane" id="soho">
				<?php			
					$get_array = get_result_array($url_prefix, $soho_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			  <div class="tab-pane" id="parttime">
				<?php			
					$get_array = get_result_array($url_prefix, $parttime_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			  <div class="tab-pane" id="softjob">
				<?php			
					$get_array = get_result_array($url_prefix, $softjob_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			  <div class="tab-pane" id="hometeach">
				<?php			
					$get_array = get_result_array($url_prefix, $hometeach_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			  <div class="tab-pane" id="teacher">
				<?php			
					$get_array = get_result_array($url_prefix, $teacher_url);
					
					// arrange 
					foreach($get_array AS $result){
						$gethref = $result->href;
						echo "<p><a href=\"".$url_prefix."".$gethref."\" target=\"_blank\"> ".$result->plaintext."</a></p>";
					}
				?>
			  </div>
			</div>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	  $(function () {
		$('#myTab a:first').tab('show');
	  })
	  
	  $('#myTab a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
	  })
	</script>
  </body>
</html>