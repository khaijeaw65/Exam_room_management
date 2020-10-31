<!DOCTYPE html>
<html>
<head>
	<title>เพิ่มข้อมูล</title>
</head>
<body>
<header>
	<?php include "header.php"; ?>
</header>

<div class="container" style="padding-top:150px; padding-bottom: 120px">
	<div class="card-deck">
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="text-white text-center">ข้อมูลห้องสอบ</h3>
			</div>
			<div class="card-body">
				<div class="col-md-8 mx-auto">
					<form action="insert_data.php" method="post" id="insert_room_detail" name="insert_room_detail">
						<div class="form-group">
							<label>ชื่ออาคาร</label>
							<select class="form-control" id="building" name="building">
								<option value="">เลือกอาคาร</option>
							</select>
						</div>
						<div class="form-group">
							<label>เลขที่ห้อง</label>
							<input type="text" class="form-control" id="roomNum" name="roomNum" placeholder="เลขที่อาคาร-เลขห้องสอบ eg.1-205" required/>
						</div>
						<div class="form-group">
							<label>จำนวนที่นั่ง</label>
							<input type="text" class="form-control" id="seatAmount" name="seatAmount" placeholder="จำนวนที่นั่ง" required/>
						</div>
						<div class="text-center">
							<button class="btn btn-outline-primary" id="addRoom" name="addRoom">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="text-white text-center">ข้อมูลอาคาร</h3>
			</div>
			<div class="card-body" style="padding-top: 65px">
				<form action="insert_data.php" method="post" id="insert_faculty_form" name="insert_faculty_form">
					<div class="col-md-8 mx-auto">
						<div class="form-group">
							<label for="faculty">ชื่ออาคาร</label>
							<input type="text" class="form-control" id="faculty" name="faculty" required/>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-outline-primary" id="addFaculty" name="addFaculty">บันทึก</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<footer>
	<?php include "footer.php"; ?>
</footer>

<script>
    $(document).ready(function(){
        $.ajax({
            url: 'get_building_name.php',
	        dataType: 'json',
            success: function(data){
                var content = "";
                $.each(data, function (i, value) {
	                content += "<option value='" + value.ID + "'>" +  value.ID + " " + value.b_name + "</option>";
                })
	            $('#building').append(content);
            }
        });
    });
</script>

<script>
    $('#excelFile').change(function(){
        var fileName = $(this).val().replace("C:\\fakepath\\","");
        $(this).next('.custom-file-label').text(fileName);
    })
</script>

<!--get faculty data-->
<script>
    $(document).ready(function(){
        $.ajax({
            url: 'get_faculty.php',
            dataType: 'json',
            success: function(data){
                var content = "";
                $.each(data,function(i, value){
                    content += "<option value='" + value.ID + "'>" + value.f_name + "</option>";
                })
                $('#facultyName').append(content);
            }
        })
    })
</script>


</body>
</html>
