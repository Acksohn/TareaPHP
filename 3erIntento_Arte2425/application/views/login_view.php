<!DOCTYPE html>
<html>
<head>
    <title>Welcome - Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <h2 id="titulo">WELCOME</h2>
        
        <?php echo form_open('login/authenticate'); ?>
            <div class="input-field">
                <input type="email" name="user" placeholder="User" required>
                <i class="fas fa-user"></i>
            </div>
            
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>

            <button type="submit" class="login">Get Into</button>
        <?php echo form_close(); ?>
        <hr>
        <button id="inicioGoogle" onclick="window.location.href='<?php echo base_url(); ?>'">
            Back to Home
        </button>
    </div>
</body>
</html>

<style>
    body {
    background-image: url('https://plus.unsplash.com/premium_photo-1669533188185-65e346a34190?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Zm9uZG8lMjBhcnRpc3RpY298ZW58MHx8MHx8fDA%3D');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 450px;
    height: 475px;
    text-align: center;
    border: 1px solid rgb(241,241,241);
    border-radius: 12px;
    padding: 10px 20px;
    background: transparent;
    backdrop-filter: blur(6px);
    box-shadow: 5px 5px 10px 0 rgba(0,0,0,0.5);
}

.weapper h2 {
    font-size: 30px;
    color: #fffefe;
}

.input-field {
    position: relative;
}

.input-field input[type="email"],
.input-field input[type="password"] {
    border-radius: 10px;
    background: rgba(61, 60, 60, 0.2); /* Slightly transparent background */
    margin: 15px;
    border: 2px solid rgb(255, 255, 255);
    width: 280px;
    padding: 20px 40px 20px 20px;
    backdrop-filter: blur(15px);
    color: black;
}

.input-field i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    color: black;
}

input::placeholder {
    color: black;
}

.input-field input[type="email"]:focus::placeholder,
.input-field input[type="password"]:focus::placeholder {
    transform: translateY(-100%);
    transition: transform 0.2s ease-in-out;
    font-size: 14px;
}

.input-field input[type="email"]:not(:focus)::placeholder,
.input-field input[type="password"]:not(:focus)::placeholder {
    transform: translateY(0%);
    transition: transform 0.2s ease-in-out;
    font-size: 16px;
}

a.forgot {
    text-decoration: none;
    position: relative;
    color: black;
}

a.forgot:hover {
    text-decoration: underline;
    color: black;
}

a.sign-up {
    text-decoration: none;
    color: black;
}

a.sign-up:hover {
    text-decoration: underline;
    color: black;
}

.weapper .login {
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-weight: 600;
    border-radius: 45px;
    width: 200px;
    height: 30px;
}

#inicioGoogle{
    background-color: white;
    color: rgb(4, 77, 4);
    border-radius: 50px;
    height: 50px;
    width: 300px;
    font-size: 20px;
    border-color: black;
}

a{
    text-decoration: none;
    color: rgb(4, 77, 4);
}

a:hover{
    color: black;
}

#inicioGoogle:hover{
    background-color: #3a8044;
    color: black;
    border-radius: 50px;
    height: 50px;
    width: 300px;
    font-size: 20px;
    border-color: black;
}

.login{
    background-color: white;
    color: rgb(4, 77, 4);
    border-radius: 50px;
    height: 50px;
    width: 300px;
    font-size: 20px;
    border-color: black;
}

.login:hover{
    background-color: #3a8044;
    color: black;
    border-radius: 50px;
    height: 50px;
    width: 300px;
    font-size: 20px;
    border-color: black;
}

#titulo{
    font-size: 25px;
    color: black;
    font-family: cursive;
}
</style>