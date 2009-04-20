<form method="post">
<?php p("ID_NAME")?><input class="login label_left" size="7" name="p_username"></input>
<?php p("ID_PASSWORD")?></td><td><input class="login label_left" type="password" size="7" name="p_userpassword"></input>
<input class="login" type="checkbox" name="p_storepassword"><?php p("ID_REMEMBER")?></input>
<input class="login_btn" type="submit" value="<?php p("ID_LOGIN")?>"/>
</form>