<html>

<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>

<div class="jumbotron vertical-center">
<div class="container text-center" id="login">
<?php
    if ($this->session->flashdata("notif"))
    {
        echo '<div class="alert alert-danger" role="alert">';
        echo $this->session->flashdata("notif")."<br>";
        echo "</div>";
    }
?>

<?php
    echo "<h1>Login</h1>";
    echo '<div class="form-group">';
    echo form_open("/cont/login");

    echo '<div class="row ">';
    echo '<div class="col"></div>';
    echo '<div class="col">';
    echo "E-mail atau No. HP<br>";

    echo form_input("tuserlogin",'','class="form-control"')."<br>";
    echo '</div>';
    echo '<div class="col"></div>';
    echo '</div>';

    echo '<div class="row ">';
    echo '<div class="col"></div>';
    echo '<div class="col">';
    echo "Password<br>";
    echo form_password("tpasslogin",'','class="form-control"')."<br><br>";
    echo '</div>';
    echo '<div class="col"></div>';
    echo '</div>';
    echo form_submit("btnlogin","Login");
    echo form_submit("btnreg","Register");
    echo form_close();
    echo '</div>';
?>
</div>
</div>
</html>
