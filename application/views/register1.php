<?php
    if ($this->session->userdata("notif"))
    {
        echo $this->session->userdata("notif")."<br>";
    }
    echo "<h1>Register</h1>";
    echo form_open("/cont/register");

    echo "Nama depan<br>";
    echo form_input("tnamadepan")."<br><br>";
    echo "Nama belakang<br>";
    echo form_input("tnamabelakang")."<br><br>";
    echo "E-mail<br>";
    echo form_input("temail")."<br><br>";
    echo "No HP<br>";
    echo form_input("tnohp")."<br><br>";
    echo "Password (huruf besar, huruf kecil, angka, simbol !@#$%^&*)<br>";
    echo form_password("tpass")."<br><br>";
    echo "Confirm Password<br>";
    echo form_password("tkonfpass")."<br><br>";
    echo form_submit("btnreg1","Submit");
    echo form_close();
?>
