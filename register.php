<?php
//exit();
?>
<script>
function SubmitClick(obj){
	if(obj.username.value==''){
		alert('กรุณากรอก username')
		obj.username.focus();
	}else if(obj.password.value==''){
		alert('กรุณากรอก password')
		obj.password.focus();
	}else if(obj.password.value!=obj.password2.value){
		alert('กรุณากรอก password ให้เหมือนกัน')
		obj.password.focus();
	}else if(obj.name.value==''){
		alert('กรุณากรอกชื่อ-นามสกุล')
		obj.name.focus();
	}else{
		obj.submit();
	}
}
</script>
<form action='regis.php' method='post'>
<div class="row mb-3 " style='border-style: dotted;border-width: 1px'>
	<div class="col-lg-12" >
			<label for="firstName">ลงทะเบียนอาสาสมัคร2</label>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="username"><font color="red">Username *</font></label>
		<input type='text' name='username' id='username' class="form-control" required maxlength='15'>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="password"><font color="red">Password *</font></label>
		<input type='password' name='password' id='password' class="form-control" required>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="password2"><font color="red">Password (อีกครั้ง) *</font></label>
		<input type='password' name='password2' id='password2' class="form-control" required>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="name"><font color="red">ชื่อ-นามสกุล *</font></label>
		<input type='text' name='name' id='name' class="form-control" required>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="Tel">เบอร์โทรศัพท์</label>
		<input type='text' name='Tel' id='Tel' class="form-control">
	</div>

	<div class="col-lg-12 mb-3">
		<label for="email">E-Mail</label>
		<input type='text' name='email' id='email' class="form-control" required>
	</div>

	<div class="col-lg-12 mb-3">
		<label for="fb">Facebook</label>
		<input type='text' name='fb' id='fb' class="form-control">
	</div>

	<div class="col-lg-12 mb-3">
		<label for="line">Line</label>
		<input type='text' name='line' id='line' class="form-control">
	</div>

	<div class="col-lg-12  mb-3">
		<label for="state">จังหวัดที่สำรวจss</label>
		<select class="custom-select d-block w-100" id="JUN"  name='JUN' >

<option value='94' selected>94</option>
<option value='94' >94</option>
<option value='94' >94</option>
<option value='94' >94</option>
<option value='94' >94</option>
<option value='94' >94</option>
<option value='94' >94</option>
<option value='94' >94</option>
		</select>
		<div class="invalid-feedback">
			กรุณาเลือกจังหวัด
		</div>
	</div>

	<div class="col-lg-12 mb-3">
		<label><font color="red">จำเป็นต้องกรอก</font></label>
	</div>

	<div class="col-lg-12 mb-3">
		<label>ddddddddddddddd</label>
			<input type='button' value='ลงทะเบียน' onclick='SubmitClick(this.form)' >
	</div>
	</div>
</form>
