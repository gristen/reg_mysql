<?php 
session_start();
if (isset($_SESSION[auth])&& $_SESSION[auth] == true) {
  header('Location: /profile.php');
}
$title = 'Авторизация';
?>

<?php 
require ('head.php');
?>
<body>
    <section>
      <div class="container">
        <div class="row logo">
          <a href="#" class="logo" >
            <p class="logo_title">Авторизация</p>
            
          </a>
        </div>
        <div class="row form">
          <div class="container">
              <div id="error_message" > </div>




           
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Адрес электроной почты </label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text"></div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      
                     
                      <div class="submit">
                      <!-- <button type="submit" class="btn btn-primary">Авторизироваться</button> -->
                        <button type="submit" id="buttonlogin" class="btn btn-primary">login</button>
                      </div>
          </div>

  </div>
</div> 
    </section>

    <script>
        $(document).ready(function () {

            $('button#buttonlogin').on('click',function () {
                var email = $('input#email').val();
                var password = $('input#password').val();

                $.ajax({
                    method: "POST",
                    url: "/vendor/login.php",
                    data: { email: email, password: password },
                    success:function (msg) {

                        var response = jQuery.parseJSON(msg);
                        if(response.type == 'error'){

                            var html = '<div class="alert alert-danger" role="alert" id="error_message" >' + response.message +'  </div>';
                            $('div#error_message').html(html);


                        }else if (response.type == 'success') {
                            window.location = './profile.php';
                          /*  var html = '<div class="alert alert-success role="alert" id="success_message" >' + response.message +'  </div>';
                            $('div#success_message').html(html);*/
                        }

                    }

                })





            })
        });

    </script>





























</body>