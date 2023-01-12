<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Menu Rest...</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background: #eee; padding: 20px;">

    <div id="page-content">
<?php
    include('api/connection.php');
    if (empty($_SESSION['admin'])) {
?>
    <a href="./">Home</a>
    <form class="form">
        <h3 class="form-title">Log in</h3>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button class="btn btn-primary" id="form-submit" >Submit</button>
    </form>

    <script>
        $('#form-submit').click( e=>{
            e.preventDefault();
            $.ajax({
              type: 'POST',
              url: 'api/admin.php',
              data: {
                email: $("#email").val(),
                password: $("#password").val()
                },
              success: function(response){
                console.log(response);
                if(response){
                    $('#email').val("");
                    $('#password').val("");
                    alert('Logged in!! 😁');
                    location.reload();
                }else{
                    alert("Try again");
                }
              },
              error: function(error){
                console.log(error);
              }
            });
        })
    </script>
    <?php }else{ ?>

        <h5>Logged in as <?php echo $_SESSION['email'] ?></h5>

        <a href="logout.php">Log out</a> / <a href="./">Home</a>

        <form class="form" style="margin: 20px auto;">
            <h3>Add Product</h3>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Product name</span>
              </div>
              <input type="text" class="form-control" id="name">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" class="form-control" id="price">
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
            </div>
                
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">About</span>
              </div>
              <textarea class="form-control" cols="30" rows="10" id="about"></textarea>
            </div>

            <div class="input-group mb-3">
              <select class="custom-select" id="choose-type" style="width: 100%; margin-top: 10px; padding: 5px;">
                <option selected>Choose...</option>
                <option value="foods">Food</option>
                <option value="beverages">Beverage</option>
                <option value="desserts">Dessert</option>
              </select>
            </div>

            <button class="btn btn-primary" id="form-submit" >Submit</button>
        </form>


        <script>
            $('#form-submit').click( e=>{
                e.preventDefault();
                $.ajax({
                  type: 'POST',
                  url: 'api/add-product.php',
                  data: {
                    name: $("#name").val(),
                    about: $("#about").val(),
                    price: $("#price").val(),
                    type: $("#choose-type").val(),
                    },
                  success: function(response){
                    console.log(response);
                    if(response == 1){
                        $("#name").val("");
                        $("#about").val("");
                        $("#price").val("");
                        $("#choose-type").val("");
                        alert('successfully added!!');
                    }else{
                        alert(response);
                    }
                  },
                  error: function(error){
                    console.log(error);
                  }
                });
            })
        </script>
    <?php } ?>

    </div>

</body>
</html>