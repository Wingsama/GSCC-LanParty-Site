<b>Registration for TF2 Tournament</b> <br>=====================================================================<br>
    <form action="" method="post">
    Name: <input type="text" name="user" />
<?php
require_once('recaptchalib.php');
$publickey = "6LdTYdESAAAAAI99woZW7Bdr2iu8X7fl7BsIjqp-";
$privatekey = "6LdTYdESAAAAAE3RMszCykbrHhM34Qe9tGw3E7XZ";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
<br/><input type="submit" value="submit" />
</form>
