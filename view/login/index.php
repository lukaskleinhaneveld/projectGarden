<div id="Container">
    <form action="<?= URL.'login/loginProcess' ?>" class="Login" method="post">
        <h1 class="Login">Login:</h1>
        <div class="inner-form">
            <label for="Email">Email:</label>
            <input type="email" name="Email" placeholder="Your email">
            <br/>
            <br/>
            <label for="Password">Password:</label>
            <input type="password" name="Password" placeholder="Your password">
            <br/>
            <br/>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>
