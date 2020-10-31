<!DOCTYPE html>
<html>
<head>
	<title>หน้าหลัก</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<?php include 'header.php'?>

<div class="card" style="padding-top: 70px;border: none">
	<div class="card-img">
		<img src="images/PhraSri1.jpg" alt=""/>
	</div>
</div>

<?php include 'footer.php' ?>

<script>
    $(document).ready(function(){

        $.ajax({
            url: 'sql/getRoom.php',
            success: function(data){
                $("#roomDetail").html(data);
            }
        })
    });
</script>

</body>
</html>
