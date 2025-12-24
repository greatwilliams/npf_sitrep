<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>File Index</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
			#imagePreview {
				width: 450px;
				height: 450px;
				background-position: center center;
				background-size: cover;
			
				display: inline-block;
			}
		</style>		
		
		<script type="text/javascript">
			$(function() {
				$("#uploadFile").on("change", function()
				{
					var files = !!this.files ? this.files : [];
					if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
			
					if (/^image/.test( files[0].type)){ // only image file
						var reader = new FileReader(); // instance of the FileReader
						reader.readAsDataURL(files[0]); // read the local file
			
						reader.onloadend = function(){ // set image data as background of div
							$("#imagePreview").css("background-image", "url("+this.result+")");
						}
					}
				});
			});
		</script>	


<?php require_once '../conn.php' ;?>