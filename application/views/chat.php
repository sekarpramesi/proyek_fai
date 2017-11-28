<style>
.judulchat
{
    width: 400px;
    height: 60px;
    padding: 3px;
    overflow: auto;
    border: solid 1px black;
    margin-top: 5px;
}

.profpic
{
    float:left;
    width: 30px;
    height: 40px;
}

.judul
{
    float: left;
    width: 270px;
    height: 40px;
}

.judulchat a
{
    color: black;
    display: block;
    width: 270px;
    height: 40px;
}

.time
{
    width: 390px;
    height: 10px;
    text-align: right;
    font-size: 8pt;
    clear: both;
}
</style>

<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>
<?php
if ($this->session->userdata("emailnow"))
{
    $emailnow = $this->session->userdata("emailnow");
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
?>

<?php
echo "<hr>";
echo form_open('cont/chat','id=chat');
if ($newchat==false)
{
    echo form_submit('btnNewChat','New Chat','class="btn btn-secondary"');
    if (count($judulchat)>0)
    {
        $i=0;
        foreach (array_combine($judulchat,$lasttime) as $judul => $time)
        {
            $path = base_url();
            $path .= "index.php/cont/openChatRoom/";
            $path .= $idchat[$i];

            echo "<div class='judulchat'>";

            echo "<div class='profpic'>";
            echo "<img src='".base_url('uploads/').$photo[$i]."' width='30px' height='30px' />";
            echo "</div>";

            echo "<div class='judul'>";
            echo "<b><a href='$path'>".$judul."</a></b>";
            echo "</div>";

            echo "<div class='time'>".$time."</div>";

            echo "</div>";
            $i++;
        }
    }
}
else
{
    echo "Pilih teman:<br>";
    foreach ($profileteman as $teman)
    {
        echo form_checkbox('listfriend[]', $teman['email']);
        echo "<img src='".base_url('uploads/').$teman['photo']."' width='30px' height='30px' />";
        echo $teman['namadepan']." ".$teman['namabelakang'];
        echo "<br>";
    }
      echo form_submit('btnMakeChat','Chat now!');
}
echo form_close();

echo '<ul class="pagination pagination-sm">';
if (!$newchat)
    echo $links;
echo '</ul>';
?>
</div>
