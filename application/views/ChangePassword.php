<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body class = " bg-secondary ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <div class = "container bg-white   p-5 mt-5 rounded  w-50" >
    <h4> Change Your password</h4>
    <div class ="text-success">
        <?php if ($this->session->flashdata('success')) { echo $this->session->flashdata('success'); } ?>
    </div>
    <div class ="text-danger">
        <?php if ($this->session->flashdata('error')) { echo $this->session->flashdata('error'); } ?>
    </div>
    
    <div class="card p-4 mt-3  "  >
        <form action=" <?=base_url('Password/update_password')?> "  method="post" >
    <label for="" > Current Password</label>
    <br>
    <input type="password" name="cuurent_password" id="cuurent_password" class = "form-control shadow-none">
    
     <small class="text-danger"><?= form_error('cuurent_password'); ?></small>
    <label for=""> New Password</label>
    <br>
    <input type="password" name="new_password" id="new_password" class = "form-control w-75">
    <small class="text-danger"><?= form_error('new_password'); ?></small>
    
    <label for=""> confirm New Password</label>
    <br>
    <input type="password" name="Comfirm_password" id="new_Comfirm_password" class = "form-control w-75">
    <small class="text-danger"><?= form_error('Comfirm_password'); ?></small>

    <br>
    <button type="submit" class = "btn btn-primary" > Update Password</button>
    <br>
    <br>
    <a class="btn btn-success " href="<?= base_url('Profile/details') ?>" role="button">back</a>
 </form>
        
    </div>
   </div>
  <script></script>
    
</body>
</html>
