<style>
#judul
{
    width: 360px;
    height: auto;
    overflow-y: auto;
    background-color: PaleTurquoise;
}

#chatbox
{
    padding: 5px;
    width: 360px;
    height: 390px;
    background-color: azure;
    overflow-y: scroll;
}
.sender2
{
    clear: both;
    float: left;
}
.sender
{
    padding: 5px;
    margin-left: 10px;
    clear: both;
    float: left;
    background-color: SteelBlue;
    color: white;
}

.sendertime
{
    clear: both;
    float: left;
    font-size: 8pt;
    margin-left: 10px;
}

.recepient
{
    padding: 5px;
    margin-right: 10px;
    clear: both;
    float: right;
    background-color: lightgray;
}

.recepient2
{
    clear: both;
    float: right;
}

.recepienttime
{
    clear: both;
    float: right;
    font-size: 8pt;
    margin-right: 10px;
}

input[type="submit"].del
{
    font-size: 8pt;
    height: 15px;
    padding-left: 1px;
    padding-right: 1px;
}
</style>

<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>
<?php
if ($this->session->userdata("emailnow"))
{
    $emailnow = $this->session->userdata("emailnow");
}
if ($this->session->userdata("idchatnow"))
{
    $idchatnow = $this->session->userdata("idchatnow");
}
?>

<div id="navbar" class="navbar">
    <?php echo form_open("/cont/navbar",'class="form-inline"'); ?>
        <?php echo form_submit('btnMyProfile','My Profile','class="btn btn-info"');?>
        <?php echo form_submit('btnChat','Chat','class="btn btn-info"');?>
        <?php echo form_submit('btnExplore','Explore','class="btn btn-info"');?>
        <?php echo form_submit('btnNewsfeed','Newsfeed','class="btn btn-info"');?>
        <?php echo form_submit('btnNotif','Notification','class="btn btn-info"');
                  echo '<span class="badge badge-danger">'.$notifikasi.'</span>';
            ?>
        <?php echo form_submit('btnlogout','Logout','class="btn btn-info"');
            echo form_close();?>
    <?php echo form_close(); ?>
    <span class="navbar-text">
        <?php echo $emailnow; ?>
    </span>
</div>

<div class="container">
<?php
echo "<h1> Chat</h1>";
echo "<hr>";
echo $idchatnow; //bener
echo form_open('cont/delChat/','id=delchat');
$judulchat = implode(", ",$listfriend);
echo "<div id='judul'>";
echo "<b>".$judulchat."</b><br>";
echo "</div>";

echo "<div id='chatbox'>";
if (count($allchats)>0)
{
    foreach ($allchats as $chat)
    {
        if ($chat['email']==$emailnow)
        {
            $i=0;

            echo "<div class='sender2'>";
            echo "<img src='".base_url('uploads/').$photo[$i]."' width='30px' height='30px' />";
            echo ">".$chat['email']."<br>";
            echo "</div>";
            echo "<div class='sender'>";
            echo $chat['isipesan'];
            echo "<br>";
            if ($chat['pic']!='' && $chat['pic']!=null)
                echo "<img src='".base_url('uploads/pesan/').$chat['pic']."' width='200px' />";
            echo "</div>";
            echo "<div class='sendertime'>";
            echo $chat['waktu'];
            echo form_submit('btndelchat'.$chat['idpesan'],'x',"class='del'");
            echo "</div>";
        }
        else
        {
            $i = 1;

            echo "<div class='recepient2'>";

            echo $chat['email']."<";
            echo "<img src='".base_url('uploads/').$photo[$i]."' width='30px' height='30px' />";
            echo "<br>";
            echo "</div>";
            echo "<div class='recepient'>";
            echo $chat['isipesan'];
            echo "<br>";
            if ($chat['pic']!='' && $chat['pic']!=null)
                echo "<img src='".base_url('uploads/pesan/').$chat['pic']."' width='100px'/>";
            echo "</div>";
            echo "<div class='recepienttime'>";
            echo $chat['waktu'];
            echo "</div>";
        }
    }
}
echo form_close();
echo "</div>";
echo form_open_multipart('cont/chat/','id=chat');
echo form_hidden('hidchatnow',$idchatnow);
echo form_textarea('txtchat','',"style='height:30px;'");
echo "<br>Attach image :<br>";
echo form_upload('attach');
echo "<br>";
echo form_submit('btnSendChat','Send','class="btn btn-secondary"');

echo form_close();
echo "</div>";
?>
