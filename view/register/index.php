<div id="Container">
    <form class="Register" method="post" action="<?= URL.'register/registerProcess' ?>">
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
            <label for="Password">Password:</label>
            <input type="password" name="Password" placeholder="Your password">
            <br/>
            <label for="Password">Confirm password:</label>
            <input type="password" name="ConfirmPass" placeholder="Confirm your password">
            <br/>
            <br/>
            <br/>
            <input type="submit" value="Register">
        </div>
    </form>
</div>
