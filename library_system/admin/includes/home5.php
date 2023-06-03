<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PHP CRUD using jquery ajax without page reload</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
	#searchh{
      width: 300px;
      background-color: white;
      border: 2px solid black;
	  
    }
	#neww{
		display: flex;
	}
	#neww a{
		background-color: green	;
		width: 60px;
		height: 30px;
		margin-top: 10px;
		margin-left: 20px;
	}
    #p{
        display: flex;
    }
</style>
</head>
<body>
<div class="container-fluid py-4" style="min-height: 700px;" style="width: 100%;">
	<h1>User Management</h1>

<!-- View Student Modal -->
<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Location Rack</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Roll No</label>
                    <p id="view_roll" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p id="view_full" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">User Name</label>
                    <p id="view_user" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <p id="view_email" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Phone Number</label>
                    <p id="view_phone" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Department</label>
                    <p id="view_department" class="form-control"></p>
                </div>
            </div>
           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Managment 
                        
                    </h4>
                </div>
                <div class="card-body">
				<input class="form-control form-control-lg form-control-borderless" type="text" id="searchh" autocomplete="off" placeholder="Search for User Id">
                <br>    
				<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>Roll No</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <!-- <th>Password</th> -->
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require './dbconn.php';

                            $query = "SELECT * FROM lms_user";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <!-- <td><?= $student['id'] ?></td> -->
                                        <td><?= $student['rollno'] ?></td>
                                        <td><?= $student['fullname'] ?></td>
                                        <td><?= $student['username'] ?></td>
                                        <td><?= $student['email'] ?></td>
                                        <td ><?= $student['phonenumber'] ?></td>
                                        <!-- <td><?=  $password = trim($_POST["password"]); ?></td> -->
                                        <td><?= $student['department'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$student['id'];?>" class="viewStudentBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$student['id'];?>" class="deleteStudentBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
    <script src="https://code1.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        
        $(document).on('click', '.viewStudentBtn', function () {

            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "includes/code4.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_roll').text(res.data.rollno);
                        $('#view_full').text(res.data.fullname);
                        $('#view_user').text(res.data.username);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phonenumber);
                        $('#view_department').text(res.data.department);

                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteStudentBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "includes/code4.php",
                    data: {
                        'delete_student': true,
                        'student_id': student_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load("includes/home5.php" + " #myTable");
                        }
                    }
                });
            }
        });

		$(document).ready(function(){
			// live search
$("#searchh").on("keyup",function(){

var search_term = $(this).val();

$.ajax({

  url: "includes/ajax-search4.php",
  type: "POST",
  data: {searchh: search_term},
  success: function(data) {
	$("#myTable").html(data);
  }

});

});
		});

    </script>

</body>
</html>