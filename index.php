<?php
session_start();

$title = 'Регистрация';

?>

<?php
require ('head.php');

?>

<body>
    <section>
      <div class="container">
        <div class="row logo">
          <a  class="logo" >
            <p class="logo_title">gristen</p>
           
          </a>
        </div>
        <div class="row form">


<div class="container">

    <div id="error_message" > </div>
    <div id="success_message" > </div>



             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Адрес электроной почты </label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text"></div>
                      </div>
                      <div class="mb-3">

                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Подтвержедие пароля</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_ver">
                      </div>

                      <div class="submit">
                      <!-- <button type="submit" class="btn btn-primary">Авторизироваться</button> -->
                        <button type="submit" class="btn btn-primary" id="otpravka" >Зарегистрироваться</button>
                      </div>

</div>
            <script>
                $(document).ready(function () {

                    $('button#otpravka').on('click',function () {
                       var email = $('input#email').val();
                        var password = $('input#password').val();
                        var passver = $('input#password_ver').val();
                        $.ajax({
                            method: "POST",
                            url: "/vendor/register.php",
                            data: { email: email, password: password, password_confirmation:passver },
                            success:function (msg) {
                                var response = jQuery.parseJSON(msg);
                                if(response.type == 'error'){

                                    var html = '<div class="alert alert-danger" role="alert" id="error_message" >' + response.message +'  </div>';
                                    $('div#error_message').html(html); // добавляет в div#error_message значение переменной html


                                }else if (response.type == 'success') {

                                     window.location = './profile.php';

                                }

                            }

                        })




                    })
                });

            </script>

  </div>
</div>
    </section>


</body>
