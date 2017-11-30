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
echo "<h1>Skill</h1>";
echo "<hr>";
?>

<style>
.endo
{
    list-style : none;
}
</style>

<?php echo "<script src='".base_url()."js/jquery.js'></script>" ?>
<script>
    $(document).ready(function()
    {
        $(".endo").hide();
        $("li.sk").click(function () {
            var id = $(this).attr('id');
            var id = id.substring(1);
            var e = "#endorser";
            var id = e.concat(id);
            $(id).toggle();
        });
    });
</script>

<div id="notif"></div>

<?php
echo form_open('/cont/addSkill','id="addSkill"');
if (count($skill)>0)
{
    echo "<ul>";
    $i=0;
    foreach ($skill as $sk)
    {
        echo "<li class='sk' id='s".$sk['idskill']."'>".$sk['namaskill']." [".$sk['jumend']."]";
        echo form_submit('btndelskill'.$sk['idskill'],'x','class="btn btn-secondary", id="btndelpost"');
        echo "</li>";
        echo "<ul id='endorser".$sk['idskill']."' class='endo'>";
        foreach ($endorser[$i] as $en)
        {
            echo "<li>".$en['endorser']."</li>";
        }

        echo "</ul>";
        $i++;
    }
    echo "</ul>";
}
else
{
    echo "No skill yet.";
}

echo "<br>";
echo form_input('tnamaskill');
echo form_submit('btnaddskill','Add Skill','class="btn btn-secondary"');

echo form_close();
echo "</div>"
?>
