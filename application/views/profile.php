<style>
ul.likers {
    list-style: none;
    padding: 0;
    margin: 0;
}

ul.likers li {
    padding-left: 16px;
}

ul.likers li:before {
    content: "♥"; /* Insert content that looks like bullets */
    padding-right: 8px;
    color: crimson; /* Or a color you prefer */
}
</style>
<html>


<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>

<?php
if ($this->session->userdata("emailnow"))
{
    $emailnow = $this->session->userdata("emailnow");
}
if ($this->session->userdata("notif"))
{
    echo $this->session->userdata("notif")."<br>";
}
if ($this->session->userdata('emailother'))
{
    $emailother = $this->session->userdata('emailother');
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
echo "<h1>Profile</h1>";
echo "<h1>".$header."</h1>";
echo "<hr>";
?>

<?php echo "<script src='".base_url()."js/jquery.js'></script>" ?>
<script>
    $(document).ready(function()
    {
        $(".likers").hide();
        $("span.likes").click(function () {
            var id = $(this).attr('id');
            var id = id.substring(1);
            var e = "#likers";
            var id = e.concat(id);
            $(id).toggle();
        });
    });
</script>

<html>

    <?php
    echo "<img src='".base_url('uploads/').$profile['photo']."' width='100px' height='100px' />";
    echo form_open("/cont/skill");
    echo "<h3>";
    echo $profile['namadepan']." ".$profile['namabelakang']."<br>";
    echo "</h3>";
    if ($profile['music']!='') {
        echo "<audio controls autoplay>";
        echo "<source src='" . base_url('uploads/') . $profile['music'] . "' type='audio/mp3'>";
        echo "Your browser does not support the audio element.";
        echo "</audio>";
    }
    ?>

    <?php if (($profile['email']==$this->session->userdata("emailnow")) ||
              ($cek && $profile['private']=='true')
              || $profile['private']=='false') { ?>
    <table cellpadding='2'>
        <tr>
            <td align="right"><b>Email :</b></td>
            <td><?php echo $profile['email'] ?></td>
            <td style="border-left:1px solid black; padding-left:10px;"><b>Skill</b></td>
        </tr>
        <tr>
            <td align="right"><b>No. HP :</b></td>
            <td><?php echo $profile['nohp']?></td>
            <td rowspan="5" style="border-left:1px solid black; padding-left:10px;">
                <?php
                if (count($skill)==0)
                {
                    echo "No skill yet.";
                }
                else
                {
                    echo "<ul>";
                    $i = 0;
                    foreach ($skill as $sk)
                    {
                        echo "<li>".$sk['namaskill']." [".$sk['jumend']."]";
                        if (isset($emailother))
                        {
                            if (isset($klikend[$sk['idskill']]))
                            {
                                if ($klikend[$sk['idskill']])
                                {
                                    echo form_submit('btnunendorse'.$sk['idskill'],'Unendorse','class="btn btn-secondary"');
                                }
                            }
                            else
                            {
                                echo form_submit('btnendorse'.$sk['idskill'],'Endorse','class="btn btn-secondary"');
                            }
                        }
                        echo "</li>";
                        $i++;

                        if ($i==3) break;
                    }
                    echo "</ul>";
                }
                echo "<br>";
                if (!isset($emailother)) echo form_submit('btnSkill','See All Skill','class="btn btn-secondary"');
                ?>
            </td>
        </tr>
        <tr>
            <td align="right"><b>Jabatan :</b></td>
            <td><?php echo $profile['jabatan']?></td>
        </tr>
        <tr>
            <td align="right"><b>Perusahaan :</b></td>
            <td><?php echo $profile['perusahaan']?></td>
        </tr>
        <tr>
            <td align="right"><b>Bio Perusahaan :</b></td>
            <td><?php echo $profile['bioperusahaan']?></td>
        </tr>
        <tr>
            <td align="right"><b>Bio User :</b></td>
            <td><?php echo $profile['biouser']?></td>
        </tr>
    </table>
</html>
<?php
echo form_close();

if (!isset($emailother))
{
    echo form_open("/cont/edit");
    echo form_submit("btnedit","Edit Profile",'class="btn btn-secondary"');
    echo form_submit("btneditacc","Edit Account",'class="btn btn-secondary"');
    echo form_close();
}
else
{
    echo form_open("/cont/message"); //atau chat?
    echo form_submit("btnSendMsg","Send Message",'class="btn btn-secondary"');
    echo form_close();
}
echo "<hr>";
echo "<h3>Post</h3>";
echo form_open_multipart("/cont/post");
echo '<div class="col-5">';
echo form_textarea("tpost","","id='tpost' rows='3' onchange='mention()'");
echo '</div>';
echo "Attach image : ";
echo form_upload('attach');
echo "<br>";
echo form_submit("btnpost","Post",'class="btnpost btn btn-secondary"');
echo "<br>";
echo form_close();

echo form_open('cont/likeCommentPost','id="likecomment"');
$i = 0;
$jumlahlike = 0;
$jumlahcomment = 0;
foreach ($post as $p)
{
    echo "<hr align='left' width='50%'>";
    echo $p['isipost']."<br>";
    if ($p['pic']!='' && $p['pic']!=null)
        echo "<img src='".base_url('uploads/post/').$p['pic']."' width='200px' />";
    echo "<br>";
    echo "<span class='likes' id='l".$p['idpost']."'>";
    echo $countlike[$i]['jum']." Likes ";
    echo "</span>";

    //buttonlike
    if ($liked[$p['idpost']]==true)
    {
        echo form_submit('btnunlikepost'.$p['idpost'],html_entity_decode('&hearts;'),'class=" btn btn-outline-danger", id="btnlike"');
    }
    else
    {
        $data = array(
              'name'   => 'btnlikepost'.$p['idpost'],
              'value'  => html_entity_decode('&#9825;'),
              'class'  => "btnlike btn btn-outline-danger",
              'id'     => 'btnlike'
        );
        echo form_submit($data);
    }
    echo "| ".$countcomment[$i]['jum']." Comments | ";
    echo $p['waktu']." | ";
    if (strlen($p['share'])>1) echo $p['share']." | ";
    echo form_submit('btndelpost'.$p['idpost'],'x','class="btn btn-secondary", id="btndelpost"');
    echo "<br>";

    //listlikers
    echo "<ul id='likers".$p['idpost']."' class='likers'>";
    foreach ($likers[$i] as $en)
    {
        echo "<li>".$en['email']."</li>";
    }
    echo "</ul>";

    if (isset($comment[$p['idpost']]))
    {
        foreach ($comment[$p['idpost']] as $listcomment) {
            echo "<b>".$listcomment['email']."</b> ";
            echo $listcomment['comment']." ";
            if ($listcomment['email']==$emailnow)
                echo form_submit('btndelcom'.$listcomment['idcomment'], "x",'class="btn btn-secondary"');
            echo "<hr align='left' width='30%'>";
        }

    }
    echo "<br>";
    echo form_textarea('tcomment'.$p['idpost'],'',"style='height:30px;'");
    echo form_submit('btncommentpost'.$p['idpost'],'Comment','class="btn btn-secondary"');

    $jumlahlike += $countlike[$i]['jum'];
    $jumlahcomment += $countcomment[$i]['jum'];

    $i++;
}

echo "<br><hr>";
echo "Total likes : ".$jumlahlike." | Total comments : ".$jumlahcomment;
echo form_close();
echo '<ul class="pagination pagination-sm">';
echo $links;
echo '</ul>';
}
else if ($cek==false && $profile['private']=='true')
{
    echo "User is private! Add as friend first.";
}
?>
</div>
</html>
