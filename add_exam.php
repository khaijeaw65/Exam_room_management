<!DOCTYPE html>
<html>
<head>
	<title>ข้อมูลการสอบ</title>
</head>
<body>
<header>
	<?php include 'header.php' ?>
</header>

<div class="container" style="padding-top:150px; padding-bottom: 120px">
	<div class="card">
		<div class="card-header py-2 bg-dark">
			<h3 class="text-center text-white">เข้อมูลการสอบ</h3>
		</div>
		<div class="card-body">
			<form action="insert_data.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-6 mx-auto">
						<label for="building">อาคาร</label>
						<select class="form-control" id="building" name="building">
							<option value="">เลือกอาคาร</option>
						</select>
					</div>
					<div class="form-group col-md-6 mx-auto">
						<label for="room">ห้องสอบ</label>
						<select class="form-control" id="room" name="room">
							<option value="">เลือกห้องสอบ</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6 mx-auto">
						<label for="date">วันที่</label>
						<input type="date" class="form-control" id="date" name="date"/>
					</div>
					<div class="form-group col-md-6 mx-auto">
						<label for="subject">วิชาที่เข้าสอบ</label>
						<input type="text" class="form-control" id="subject" name="subject"/>
					</div>
				</div>
				<label>ไฟล์ข้อมูลนักศึกษา ไฟล์ .xlsx .xls หรือ .csv</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="student_file" name="student_file">
					<label class="custom-file-label" for="student_file">Choose file</label>
				</div>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-outline-primary">บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>

<footer>
	<?php include 'footer.php' ?>
</footer>

<script>
    $('#student_file').change(function(){
        var fileName = $(this).val().replace("C:\\fakepath\\","");
        $(this).next('.custom-file-label').text(fileName);
    })
</script>

<!-- get building data -->
<script>
    $(document).ready(function(){
        $.ajax({
            url: 'get_building_name.php',
            dataType: 'json',
            success: function(data){
                var content = "";
                $.each(data, function (i, value) {
                    content += "<option value='" + value.ID + "'>" + value.ID + " " + value.b_name + "</option>";
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
                        $('#room').empty();
                        $('#room').html("<option value=''>เลือกห้องสอบ</option>");
                        $('#room').append(content);
                    }
                })
            }
        })
    })
</script>

</body>
</html>
