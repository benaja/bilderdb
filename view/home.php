<div class='home-container'>
    <div class="title-container">
        <h2>PictureCloud</h2>
    </div>
    <div class="login-container">

        <form class="login-form row" method="post" id="login">
            <div class="col s12">
                <h3 class="login-title">Login</h3>
            </div>
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="white-text validate" required>
                <label for="email">E-Mail</label>
            </div>
            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="white-text validate" required>
                <label for="password">Password</label>
            </div>
            <div class="col s12">
                <button class="btn waves-effect waves-light right" type="submit" name="action">Login
                    <i class="material-icons right">send</i>
                </button>
                <a class="waves-effect waves-light btn" onclick="showRegistration()">Sign up</a>
            </div>
        </form>

        <form class="login-form row" method="post" action="#" id="registration" onsubmit="return testPW()">
            <div class="col s12">
                <h3 class="login-title">Sign up</h3>
            </div>
            <div class="input-field col s12">
                <input id="firstname" name="firstname" type="text" class="white-text validate" required>
                <label for="firstname">Firstname</label>
            </div>
            <div class="input-field col s12">
                <input id="lastname" name="lastname" type="text" class="white-text validate" required>
                <label for="lastname">Lastname</label>
            </div>
            <div class="input-field col s12">
                <input id="email1" name="email" type="email" class="white-text validate" required>
                <label for="email1">E-Mail</label>
            </div>
            <div class="input-field col s12">
                <input id="password1" name="password" type="text" class="white-text validate" required>
                <label for="password1">Password</label>
            </div>
            <div class="input-field col s12">
                <input id="password2" name="password2" type="text" class="white-text validate" required>
                <label for="password2">Repeat Password</label>
            </div>
            <div class="col s12 ">
                <button class="btn waves-effect waves-light right" type="submit" name="action">Sign up
                    <i class="material-icons right">send</i>
                </button>
                <a class="waves-effect waves-light btn" onclick="showRegistration()">Login</a>
            </div>
        </form>
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