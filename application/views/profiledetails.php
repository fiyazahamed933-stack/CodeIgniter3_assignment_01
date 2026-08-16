<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body class = " bg-secondary ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <div class = "container bg-white   p-5 mt-5 rounded  " style="height: 600px; width: 850px;" >
    
    <div class = "text-start">
        <h2>  User Information <?= $user['first_name']; ?> ... </h2>
        <p> Choose Edit Profile or Personal Info.  <i class="bi bi-pencil-square text-success"></i> </p>
    </div>
    <div class="card p-4 mt-3 container "  >
        <form action=" <?=base_url('Profile/update')?> "  method="post">
            <div class="row">
        <div class=" col-2 w-25">
            <label for=""> First Name </label>
            
        </div>
        <div class="col">
            <input type="text" class = "form-control shadow-none"
              type="text"
            name="first_name"
            value="<?= $user['first_name']; ?>">
            <small class="text-danger"><?= form_error('first_name'); ?></small>
        </div>
    </div>
    <br>    
    <div class="row">
        <div class="col-2 w-25">
            <label for="" w-25> Last Name </label>
        </div>
        <div class="col">
            <input type="text" class = "form-control shadow-none"
              type="text"
        name="last_name"
        value="<?= $user['last_name']; ?>"
        >
        <small class="text-danger"><?= form_error('last_name'); ?></small>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-2 w-25">
            <label for="" w-25> Email </label>
        </div>
        <div class="col"> 
            <input  class = "form-control shadow-none"
             type="email"
            name="email"
            value="<?= $user['email']; ?>"
            >
            <small class="text-danger"><?= form_error('email'); ?></small>
        </div>
        <br>
        <br>
        <div class = " d-flex  justify-content-end" >
           <button type="submit" class = "btn btn-primary" > Save Changes</button>
           <a class="btn btn-success " href="<?= base_url('Password/ChangePassword') ?>" role="button">Change password</a>
           
        </div>
        <div class = " d-flex  justify-content-end mt-3" >
           <a class="btn btn-success " href="<?= base_url('user/home') ?>" role="button">back</a>
        </div>
    </div>
    
    
 </form>
        
    </div>
   </div>

    
</body>
</html>
