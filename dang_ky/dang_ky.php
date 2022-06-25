<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_login</title>
    <link rel="stylesheet" href="./../css/dang_ky.css">
</head>
<body>
    <div id="container">
        <form action="dang_ky.php" class="form-login" method="POST">
            <h1>Đăng Ký</h1>
            <div class="form-text">
                <label for="">Username</label>
                <input type="text" name="ten_tk">
            </div>
            <div class="form-text">
                <label for="">Passwork</label>
                <input type="password" name="mat_khau">
            </div>
            <div class="form-text">
                <label for="">Email</label>
                <input type="email" name="email">
            </div>
            <button name="dangky"> Đăng Ký</button>
            <button><a href="./../index.php">Đăng Nhập </a></button>
            <?php require 'xu_ly.php' ?>
        </form>
    </div>
    <script>
        const formLogin = document.querySelectorAll('.form-text input')
        const formLabel = document.querySelectorAll('.form-text label')
        for (let i = 0; i < 3; i++) {
            formLogin[i].addEventListener("mouseover",function(){
                formLabel[i].classList.add("focus")
            })
            formLogin[i].addEventListener("mouseout",function(){
                if (formLogin[i].value == "") {
                    formLabel[i].classList.remove("focus")
                }
               
            })
        }
    </script>
</body>
</html>