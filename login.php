<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab1-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            width: 100vw;
        }
        header{
            position: relative;
            left: 0px;
            top: 0px;
            background-color: #37a3fa;
            width: 100vw;
            height: 100px;
            margin: 0;
        }
        header .logo img{
            position: relative;
            width: 90px;
            height: 90px;
            left: 10px;
            top: 7px;
        }
        header .name{
            position: relative;
            
            text-align: center;
            top: -90px;
            font-size: 3.5vw;
            color: white;
        }
        footer{
            position: relative;
            width: 100vw;
            height: 50px;
            background-color: #37a3fa;
            bottom: 0px;
            color: white;
            font-size: 30px;
            text-align: center;
        }
        .formContainer {
            
            background: #E4E9F7;
            position: relative;
            height: 1000px;
            height: 97vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .formContainer .formWrapper {
            background-color: white;
            height: 550px;
            padding: 20px 60px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }
        .formContainer .formWrapper .logo {
            color: #5d5b8d;
            font-weight: bold;
            font-size: 30px;
        }
        .formContainer .formWrapper .title {
            color: red;
            /* font-size: 12px; */
        }
        .formContainer .formWrapper form {
            position: relative;
            top: 50px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .formContainer .formWrapper form input {
            padding: 15px;
            border: none;
            width: 300px;
            /* border-bottom: 1px solid #a7bcff; */
            border-bottom: 1px solid #a7bcff;
        }
        .formContainer .formWrapper form input::placeholder {
          color: #afafaf;
        }
        .formContainer .formWrapper form button {
            background-color: #7b96ec;
            color: white;
            padding: 10px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .formContainer .formWrapper form label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #8da4f1;
            font-size: 12px;
            cursor: pointer;
        }
        #error1, #error2{
            display: none;
            color: red;
            position: relative;
            top: -15px;
            height: 0px;
        }
        @media (max-width:760px){
            .home_page .text p{
                display: none;
            }
        }
        @media (max-width:400px){
            header .name, .home_page .text h1{
                display: none;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <div class="logo"><img src="https://1.bp.blogspot.com/-t0S8GXCUUSk/WEe2fKgRfAI/AAAAAAAACzs/lV6Mxe9_mUs7XKyVB8qstvrBtl99jAJLwCLcB/s1600/543px-Logo-hcmut.svg.png" alt=""></div>
            <div class="name">Web programming lab</div>
        </div>
    </header>

    <div class="formContainer">
        <div class="formWrapper">
            <span class="logo">Web programming login</span>
            <?php
                if (isset($_SESSION['login_error']))   {
                    echo "<span class=\"title\"> Incorrect username	or	password! </span>";
                }
            ?>
            <form action="login_process.php" method="POST">
                <input type="email" placeholder="Email" id = "username" name = "username" value = <?php echo isset($_COOKIE["username"])? $_COOKIE["username"]: ""?>>
                <div id="error1">error message</div>
                <input type="password" placeholder="Password" id = "password" name = "password">
                <div id="error2">error message</div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <footer>
        <div>Name: Huỳnh Tuấn Kiệt 2052561</div>
    </footer>
    <script>
        const form = document.querySelector('form');
        const username = document.querySelector('#username');
        const password = document.querySelector('#password');
        const error1 = document.querySelector('#error1');
        const error2 = document.querySelector('#error2');
        function validEmail(email){
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }
        form.addEventListener('submit', e => {
        	e.preventDefault(); 
            UsernameValue = username.value.trim();
            PasswordValue = password.value.trim();

            if (UsernameValue === ''){
                error1.textContent = 'Please enter your email!';
                error1.style.display = 'block';
                username.style.borderBottom = '1px solid red';
            }
            else if (!validEmail(UsernameValue)){
                error1.textContent = 'Your email is not a valid email!';
                error1.style.display = 'block';
                username.style.borderBottom = '1px solid red';
            }
            else{
                error1.style.display = 'none';
                username.style.borderBottom = '1px solid #a7bcff';
            }


            if (PasswordValue === ''){
                error2.textContent = 'Please enter your password!';
                error2.style.display = 'block';
                password.style.borderBottom = '1px solid red';
            }
            else if (PasswordValue.length < 3){
                error2.textContent = 'Your password must have at least 3 characters!';
                error2.style.display = 'block';
                password.style.borderBottom = '1px solid red';
            }
            else{
                error2.style.display = 'none';
                password.style.borderBottom = '1px solid #a7bcff';
            }
            if (error1.style.display === 'none' && error2.style.display === 'none') {
                form.submit();
            }
        });
    </script>
</body>

</html>