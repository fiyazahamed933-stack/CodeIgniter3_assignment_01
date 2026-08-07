<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Register form</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
       <link rel="icon" href="C:\javascript\microsoft-todo-2019.jpg " >  
       <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class ="   mt-4  d-flex justify-content-center text-dark">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class = " p-4 w-50 h-25 rounded-4 ">
       <form  id="form" action="<?=base_url('user/submit')?>" method="POST" class = "sign" >
        <h4 class="text-success" id = "">SIGN UP</h4>
        <label for=""  class = "d-flex justify-content-start  w-75" > FirstName  :</label> 
       <input type="taxt" name="first_name" id="first_name" placeholder = "enter the fisrt name " class=" form-control w-75 ">
       <?php echo form_error('first_name')?> 
       <small class="text-danger"></small>
       <a></a>
       <br>
       <label for="" class = "d-flex justify-content-start  w-75" > LastName  :</label> 
       <input type="taxt" name="last_name" id="last_name" placeholder = "enter the last  name " class="form-control w-75">
       <?php echo form_error('last_name')?> 
        <small class="text-danger"></small>
        <a></a>
       <br>
       <label for="" class = "d-flex justify-content-start  w-75"> Email  :</label> 
       <input type="email" name="email" id="email" placeholder = "enter the email " class="form-control w-75">
       <small class="text-danger"> </small>
        <a></a>
       <?php if ($this->session->flashdata('error')) { echo $this->session->flashdata('error'); } ?>
       <br>
       <label for="" class = "d-flex justify-content-start  w-75"> Password  :</label> 
       <input type="password" name="password" id="password1" placeholder = "enter the password "  pattern="[0-9]{8}"  title="Password must contain exactly 8 digits" class="form-control w-75">
        <small class="text-danger"> </small>
        <a> </a>
       <br>

       <label for="" class = "d-flex justify-content-start p- w-75"> Conform Password  :</label> 
       <input type="password" name="cpassword" id="cpassword1" placeholder = "enter the same  password "  pattern="[0-9]{8}" title="Password must contain exactly 8 digits" class="form-control w-75">
        <small class="text-danger"> </small>
        <a> </a>
       <br>
       <button type="submit" class = "btn btn-success w-75"> Login</button>
      </form>
      <br>
       <p class="text-success fs-5" >
             Already login<a class="btn btn-success"  href="<?=base_url('user/login')?>"> Click   </a>
       </p> 
</div>
<script src="<?= base_url('asserts/js/validation.js') ?>"></script>
</body>
</html>