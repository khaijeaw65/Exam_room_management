<!DOCTYPE html>
<html>
<head>
	<title>ข้อมูลห้องสอบ</title>
	<meta charset="UTF-8";
</head>
<body>
<?php include 'header.php' ?>

<div class="container" style="padding-top:230px; padding-bottom:150px">
	<div class="card">
		<div class="card-header py-3 bg-dark">
			<h3 class="text-center text-white">ข้อมูลสถานที่สอบ</h3>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>ชื่ออาคาร</th>
					<th>เลขที่ห้อง</th>
					<th>จำนวนที่นั่ง</th>
				</tr>
				</thead>
				<tbody id="room_detail" name="room_detail">
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>

<script>
	
    $(document).ready(function(){
        $.ajax({
            url: 'get_building_detail.php',
	        dataType: 'json',
            success: function(data){
	            var content = "";
	            $.each(data,function (i,value) {
		            content += "<tr class='text-center'>" + "<td>" + value.Name + "</td>" + "<td>" + value.num + "</td>" + "<td>" + value.seat_amount + "</td>" + "</tr>";
                })
	            $('#room_detail').append(content);
            }
        })
    });
	
</script>
</body>
</html>
