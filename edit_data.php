<!DOCTYPE html>
<html lang="th">
<head>
	<title>แก้ไขข้อมูล</title>
</head>
<body>

<header>
	<?php include 'header.php' ?>
</header>

<div class="container" style="padding-top:150px; padding-bottom: 70px">
	<div class="card-deck">
		<!-- แก้ไขข้อมูลสถานที่สอบ -->
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="text-center text-white">ข้อมูลสถานที่สอบ</h3>
			</div>
			<div class="card-body">
				<div class="col-md-8 mx-auto">
					<form action="update_data.php" method="post" id="update_faculty_form">
						<div class="form-group">
							<label for="building">ชื่ออาคาร</label>
							<select class="form-control" id="building" name="building">
								<option value="">เลือกอาคาร</option>
							</select>
						</div>
						<div class="form-group">
							<label for="room_num">เลขที่ห้อง</label>
							<select class="form-control" id="room_num" name="room_num">
								<option value="0">เลือกห้องสอบ</option>
							</select>
						</div>
						<div class="form-group">
							<label for="new_room_num">เลขที่ห้องใหม่(ในกรณีที่ต้องการเปลี่ยนเลขที่ห้อง)</label>
							<input type="text" class="form-control" id="new_room_num" name="new_room_num" placeholder="เลขที่ห้องใหม่"/>
						</div>
						<div class="form-group">
							<label for="new_seat_amount">จำนวนที่นั่ง</label>
							<input type="text" class="form-control" id="new_seat_amount" name="new_seat_amount" placeholder="จำนวนที่นั่ง"/>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-outline-primary">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<footer>
	<?php include 'footer.php' ?>
</footer>

<!-- get building data -->
<script>
    $(document).ready(function(){
        $.ajax({
            url: 'get_building_name.php',
            dataType: 'json',
            success: function(data){
                var content = "";
                $.each(data, function (i, value) {
                    content += "<option value='" + value.ID + "'>" + value.b_name + "</option>";
                })
                $('#building').append(content);
            }
        });
    });
</script>
<!-- get building room data -->
<script>
    $(document).ready(function (){
        $('#building').change(function(){
            var b_id = $(this).val();
            if(b_id != ''){
                $.ajax({
                    url: 'get_room_num.php',
                    type: 'post',
                    dataType: 'json',
                    data: {b_id:b_id},
                    success: function(result){
                        var content = "";
                        $.each(result,function(i, value){
                            content += "<option value='" + value.ID + "'>" + value.num + "</option>";
                        })
                        $('#room_num').empty();
                        $('#room_num').html("<option value=''>เลือกห้องสอบ</option>");
                        $('#room_num').append(content);
                    }
                })
            }
        })
	    
	    $('#room_num').change(function(){
	        var r_id = $(this).val();
	        if(r_id != ''){
	            $.ajax({
		           url: 'get_room_seat.php',
		            type: 'post',
		            dataType: 'json',
		            data: {r_id:r_id},
		            success: function (result) {
			            $.each(result,function(index,value){
			                $('#new_room_num').val(value.num);
				            $('#new_seat_amount').val(value.seat_amount);
			            })
                    }
	            })
	        }
	    })
    })
</script>

</body>
</html>
