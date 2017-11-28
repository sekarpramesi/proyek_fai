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
echo "<h1>Notification</h1>";
echo "<hr>";
?>

<?php
echo form_open('/cont/addFriend','id="add"');
echo form_hidden('hemail',$emailnow);

if (count($notifreq)>0) echo "<b>Permintaan pertemanan</b><hr>";
for ($i=0; $i < count($notifreq); $i++) {
    echo $notifreq[$i];
    $id = $filterfriendreq[$i]["id"];
    echo form_submit('btnaccept'.$id,'Accept','class="btn btn-info"');
    echo form_submit('btnreject'.$id,'Reject','class="btn btn-secondary"');
    echo "<br><hr width='50%' align='left'>";
}

echo "<b>Aktivitas</b><hr>";
foreach ($notiflain as $n)
{
    echo $n['isinotif'];
    echo "<br><hr width='50%' align='left'>";
}

echo form_close();
echo '<ul class="pagination pagination-sm">';
echo $links;
echo '</ul>';
echo "</div>";
?>
