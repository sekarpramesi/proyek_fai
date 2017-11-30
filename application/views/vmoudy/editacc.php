<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>
<?php if ($this->session->userdata("emailnow"))
{
    $emailnow = $this->session->userdata("emailnow");
}
?>
<div id="navbar" class="navbar">
    <?php echo form_open("/cont/navbar",'class="form-inline"'); ?>
    <?php echo form_close(); ?>
    <span class="navbar-text">
        <?php echo $emailnow; ?>
    </span>
</div>

<div class="container">
<?php
    echo "<h1>Edit Acccount</h1>";
    echo form_open("/cont/edit");

    echo "Nama depan<br>";
    echo form_input("tnamadepan",$namadepanuser)."<br><br>";
    echo "Nama belakang<br>";
    echo form_input("tnamabelakang",$namabelakanguser)."<br><br>";
    echo "E-mail<br>";
    echo form_input("temail",$emailuser)."<br><br>";
    echo "No HP<br>";
    echo form_input("tnohp",$nohpuser)."<br><br>";
    echo "New Password<br>";
    echo form_password("tpass",$passuser)."<br><br>";
    echo "Confirm New Password<br>";
    echo form_password("tkonfpass",$passuser)."<br><br>";
    echo form_submit("btnsaveacc","Save");

    echo form_close();
?>
