<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="icon" href="C:\javascript\microsoft-todo-2019.jpg " >  
       <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class ="   mt-4  d-flex justify-content-center text-dark">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <div class = " p-4 w-50 h-25 rounded-4 " >
      
    <form action="<?=base_url('user/login_user')?>" method="POST" class ="p-2" id="loginForm">
        <h3 class="text-success" id = "hearder"  > Log-in to your account </h3>
        <br>
        <label for="" class = "d-flex justify-content-start  w-75" > Email :</label>
        <input class="form-control w-75 shadow-none" type="email" name="email" id="email_log">
        <p id ="message"> </p>
        <small class="text-danger"> </small>
        <a></a>
        <?php echo form_error('email')?> 
        <label for="" class = "d-flex justify-content-start  w-75" > Password :</label>
        <input class=" form-control  w-75 shadow-none  " type="password" name="password" pattern="[0-9]{8}"  title="Password must contain exactly 8 digits" id = "password_log" >
        <p id ="message1"> </p>
        <small class="text-danger"> </small>
        <a> </a>
        <br>
        <?php echo form_error('password')?> 
        <button type="submit" class = "btn btn-success w-75 " >submit</button>
        <br>
        
       <?php if ($this->session->flashdata('error')) { echo $this->session->flashdata('error'); } ?>
    </form>
    <br>
    <p id = "para" class ="fs-5"> Don't have an account yet?  <a class="btn btn-success" href="<?=base_url('user/signup')?>"> Click </a> </p> 
    <br>     
    </div>  
<script src="<?= base_url('asserts/js/validation.js') ?>"></script>
</body>

</html>