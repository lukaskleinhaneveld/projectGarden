<div id="Container">
    <form class="Register" method="post" action="<?= URL.'login/registerProcess' ?>">
        <h1 class="Register">Register:</h1>
        <div class="inner-form">
            <input type="hidden" name="Active" value="0">
            <label for="Firstname" name="Firstname">Firstname:</label><label for="Lastname" name="Lastname">Lastname:</label>
            <br/>
            <input type="text" name="Firstname" placeholder="Firstname"><input type="text" name="Lastname" placeholder="Lastname">
            <br/>
            <br/>
            <label for="Email">Email:</label>
            <input type="email" name="Email" placeholder="Your email">
            <br/>
            <br/>
            <label for="Password">Password:</label>
            <input type="password" name="Password" placeholder="Your password">
            <br/>
            <br/>
            <label for="Password">Confirm password:</label>
            <input type="password" name="ConfirmPassword" placeholder="Confirm your password">
            <br/>
            <br/>
            <input type="submit" value="Register">
        </div>
    </form>
</div>
