<?php
require_once('./config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
  background: url("https://wallpaperboat.com/wp-content/uploads/2020/11/13/60306/library-10.jpg");
  background-size: cover;
	backdrop-filter: blur(7px);
}
.container{
    height: 90%;
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 0 20px 20px 0;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  /* margin-left: 300px; */
}
.banner .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
  margin-left:20px;
  margin-top: 50px;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.container .img{
    align-items: center;
    text-align: center;

} 

.container .img img{
    margin: 20px 0 2px;
	height: 70px;
	border-radius: 50%;
}
 
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 20px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0;
   

   
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background-color: navy;
 }
 form .button input:hover,input:focus{
    
    
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    transform: scale(1.05);
}

form .button:active {
    transform: translateY(2px);
  box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.2);
}

  
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
    
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

.banner {
	height: 90%;
	width: 350px;
	background: rgb(0, 0, 0, 0.4);
	border-radius: 20px 0 0 20px;
}

.banner h3{
    font-size: 20px;
    margin-left: 20px;
}

.banner * {
	
	color: #ccc;
    
}

p,
a {
	font-size: small;
    font-family:  "Poppins", sans-serif;
    font-weight: bold;
}

a {
	color:navy
}
</style>
</head>
<body>

<div>
	<?php
	
	?>	
</div>
<div class="banner"> <div class="title">Registration Form</div>
<br>
<br>
<h3>This is the Registeration Form Users can Sign up from here if you already have one Then Have a Bless Day.</h3>

</div>
<div class="container">
    
    <div class="img"><img src="https://cdn-icons-png.flaticon.com/512/1674/1674291.png" alt="profile"></div>
    
    <p>Already have an Account? <a href="userlogin.php"> Sign In</a></p>
    <div class="content">
        <form action="registration.php" method="post">
            
		<div class="user-details">
    <div class="input-box">
					<label for="rollno"><b>Roll No</b></label>
					<input class="form-control" id="rollno"  type="text" name="rollno" required>
          </div>
          <div class="input-box">
			
                    
                    <label for="fullname"><b>Full Name</b></label>
					<input class="form-control" id="fullname" type="text" name="fullname" required>
                    </div>
          <div class="input-box">
					<label for="username"><b> UserName</b></label>
					<input class="form-control" id="username"  type="text" name="username" required>
                    </div>
          <div class="input-box">
					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>
                    </div>
          <div class="input-box">
					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>
                    </div>
          <div class="input-box">
					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
          </div>
                    <div class="input-box">
                        
					<label for="department"><b>Department</b></label>
					<input class="form-control" id="department"  type="text" name="department" required>
                    </div>
                    
        </div>
                    <div class="button">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                    </div>
      </form>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

        var rollno 	= $('#rollno').val();  
			var fullname 	= $('#fullname').val();
			var username	= $('#username').val();
			var email 		= $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var password 	= $('#password').val();
			var department = $('#department').val();

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: './process.php',
					data: {rollno: rollno,fullname: fullname,username: username,email: email,phonenumber: phonenumber,password: password,department: department},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
</body>
</html>