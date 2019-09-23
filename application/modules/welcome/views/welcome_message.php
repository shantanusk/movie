<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome Movie Library App</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
        * {
          box-sizing: border-box;
        }
	body {
		background-color: #fff;
		margin: 10px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	#container {
		margin: 5px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
    #search{
        display: block;
        width: 100%;
        margin: 0px 0 14px 0;
		padding: 12px 10px 12px 10px;
        font-size: 1rem;
        line-height: 1.5;
        color:
        #495057;
        background-color:
        #fff;
        background-clip: padding-box;
        border: 1px solid
            #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
		.row::after {
			content: "";
			clear: both;
			display: table;
			}
			.col-4 {width: 33.33%;}
			.col-12 {width: 100%;}

			[class*="col-"] {
				float: left;
				padding: 15px;
				}
				.thumb{
					width:100%;
					height:350px;
				}
				@media only screen and (max-width: 400px) {
					.col-4 {width: 100%;}
				
				}
	</style>
		<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
			<script>
				$(document).ready(function(){
					
						$.ajax({
							type: "POST",
							url: "http://localhost/welcome/call_api",
							data: {"movie": 'Matrix'},
							success: function (data, status, jqXHR) {

								$( "#result" ).html(data);
							},

							error: function (jqXHR, status) {
								// error handler
								console.log(jqXHR);
								alert('fail' + status.code);
							}
						});
					$('#search').blur(function(){
						var movie = $('#search').val();
						$.ajax({
							type: "POST",
							url: "http://localhost/welcome/call_api",
							data: {"movie": movie},
							success: function (data, status, jqXHR) {

								$( "#result" ).html(data);
							},

							error: function (jqXHR, status) {
								// error handler
								console.log(jqXHR);
								alert('fail' + status.code);
							}
						});
					});
				});
			</script>
</head>
<body>

<div id="container">
	<h1>Welcome To Movie Library App!</h1>

		<div class="row">

			<div class="col-12">
				<input type="text" name="search" id="search" value="Matrix" placeholder="Enter Movie Title" />				
			</div>
			<div class="col-12" id="result"></div>
		</div> 
	
</div>

</body>
</html>
