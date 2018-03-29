<div class='home-container'>
    <div class="title-container">
        <h2>PictureCloud</h2>
    </div>
    <div class="login-container">
        <h3 class="login-title">Login</h3>
        <form class="login-form" method="post" id="login">
            <input type="email" name="email" placeholder="E-Mail" required>
            <input placeholder="Password" name="password" class="valdiate last-input" type="password" required>
            <div class="login-button-container">
                <input type="submit" value="Login" class="login-button login-button-active">
                <img class="arrow-right" src="/images/arrow-right.png">
            </div>
        </form>

        <form class="login-form" method="post" action="#" id="registration" onsubmit="return testPW()">
            <input type="email" name="email" placeholder="E-Mail" required>
            <input type="text" placeholder="Firstname" name="firstname" required>
            <input type="text" placeholder="Lastname" name="lastname" required>
            <input id="pw1" placeholder="Password" name="password" class="valdiate" type="password" required>
            <input id="pw2" placeholder="Password Repeat" name="password2" class="valdiate last-input" type="password" required>
            <div class="login-button-container">
                <input type="submit" value="Registration" class="login-button login-button-active">
                <img class="arrow-right" src="/images/arrow-right.png">
            </div>
        </form>
        <div onclick="showRegistration()" class="signup-button-container">
            <button id="registration-button" class="login-button">Sign up</button>
            <img class="arrow-right" src="/images/arrow-right.png">
        </div>
    </div>
</div>



<!-- <div class='home-container'>
    <div class="title-container">
        <h2>PictureCloud</h2>
    </div>
    <div class="login-container">
        <form class="login-form">
            <input type="email" placeholder="E-Mail">
            <input placeholder="Password" class="valdiate" type="password">
            <div class="login-button-container">
                <input type="submit" value="Login" class="login-button">
                <img class="arrow-right" src="/images/arrow-right.png">
            </div>
        </form>
        <div class="signup-button-container">
            <button class="login-button">Sign up</button>
            <img class="arrow-right" src="/images/arrow-right.png">
        </div>
    </div>
</div> -->