<!DOCTYPE html>
<html lang="th">
<head>
	<title>ประวัติการสอบ</title>
	<meta charset="UTF-8">
</head>
<body>
<header>
	<?php include 'header.php'?>
</header>

<div class="container" style="padding-top:150px; padding-bottom: 120px">
	<div class="card">
		<div class="card-header py-3 bg-dark">
			<h3 class="text-white text-center">ประวัติการสอบ</h3>
		</div>
		<div class="card-body">
			<form action="export_excel.php" method="post" id="exam_data_form" name="exam_data_form">
				<div class="form-inline">
					<!-- building data -->
					<label for="building">อาคาร</label>
					<select class="form-control ml-3 col-md-3" id="building" name="building" required>
						<option value="">เลือกอาคาร</option>
					</select>
					<!-- room data -->
					<label for="room" class="ml-3">ห้องสอบ</label>
					<select class="form-control ml-3 col-md-3" id="room" name="room" required>
						<option value="">เลือกห้องสอบ</option>
					</select>
					<!-- date data -->
					<label for="date" class="ml-3">วันที่สอบ</label>
					<input type="date" class="form-control ml-3" id="date" name="date" required/>
					<button type="button" class="btn btn-outline-primary ml-3" id="search_button">search</button>
				</div>
			<hr>
			<!-- export excel -->
			<div class="d-flex justify-content-lg-end mr-3">
				<div class="custom-control custom-radio mr-3">
					<input class="custom-control-input" type="radio" id="xlsx" name="excel_type" value="xlsx" required>
					<label class="custom-control-label" for="xlsx">.xlsx</label>
				</div>
				<div class="custom-control custom-radio mr-3">
					<input class="custom-control-input" type="radio" id="xls" name="excel_type" value="xls" required>
					<label class="custom-control-label" for="xls">.xls</label>
				</div>
				<button type="submit" class="btn btn-outline-success" id="export_excel">export</button>
			</div>
			</form>
			<br>
			<table class="table">
				<thead class="thead-dark">
				<tr class="text-center">
					<th colspan="4">ข้อมูลสถานที่สอบ</th>
					<th colspan="6">ข้อมูลนักศึกษา</th>
				</tr>
				</thead>
				<thead class="thead-dark">
				<tr class="text-center">
					<th>อาคาร</th>
					<th>ห้องสอบ</th>
					<th>วันที่สอบ</th>
					<th>วิชาที่สอบ</th>
					<th>คำนำหน้าชื่อ</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>รหัสนึกศึกษา</th>
					<th>คณะ</th>
					<th>สาขา</th>
				</tr>
				</thead>
				<tbody id="exam_data">
				</tbody>
			</table>
		</div>
	</div>
</div>

<footer>
	<?php include 'footer.php'?>
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
                    content += "<option value='" + value.ID + "'>" + (i + 1) + " " + value.b_name + "</option>";
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
            }else if(b_id == ''){
                $('#room').empty();
                $('#room').html("<option value=''>เลือกห้องสอบ</option>");
            }
        })
    })
</script>

<script>
    $(document).ready(function(){
        $('#search_button').click(function(){
            var b_id = $('#building').val();
            var r_id = $('#room').val();
            var date = $('#date').val();
            
            if(b_id != '' && r_id != '' && date != ''){
                $.ajax({
	                url: 'get_exam_data.php',
	                type: 'post',
	                dataType: 'json',
	                data: {b_id:b_id,r_id:r_id,date:date},
	                success: function(result){
	                    var content = "";
	                    $.each(result,function(index,value){
	                        content += "<tr class='text-center'>" + "<td>" + value.b_name +"</td>" + "<td>" + value.num + "</td>" +
		                        "<td>" + value.date + "</td>" + "<td>" + value.subject + "</td>" +
		                        "<td>" + value.student_prefix + "</td>" + "<td>" + value.student_name + "</td>" +
		                        "<td>" + value.student_surname + "</td>" + "<td>" + value.student_id + "</td>" +
		                        "<td>" + value.student_faculty + "</td>" + "<td>" + value.student_branch + "</td>" + "</tr>";
	                    });
	                    $('#exam_data').append(content);
	                }
                });
	            return false;
            }
        })
    })
</script>

</body>
</html>
