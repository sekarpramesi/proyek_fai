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
    content: "♥";
    padding-right: 8px;
    color: crimson;
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
echo "<h1>Newsfeed</h1>";
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

<?php
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
echo form_open('cont/likeCommentPost/nf','id="likecomment"');
if (isset($emailother))
{
    echo $emailother;
    echo form_hidden("hemailother",$emailother);
}
echo form_hidden("hemail",$emailnow);
//showallpost disini kudue
$i = 0;
$jumlahlike = 0;
$jumlahcomment = 0;
$listemail = [];
foreach ($post as $p)
{
    echo "<hr align='left' width='50%'>";
    array_push($listemail, $p['email']);
    $path = base_url() . "index.php/cont/profileUserLain/";
    $path .= $i;
    $a = "<a style='color:black; text-decoration:none;' href='$path'>".$p['email']."</a>";
    echo "<b style='font-size:14pt;'>".$a."</b><br>";
    echo $p['isipost']."<br>";
    if ($p['pic']!='' && $p['pic']!=null)
        echo "<img src='".base_url('uploads/post/').$p['pic']."' width='200px' /> <br>";
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
              'name'          => 'btnlikepost'.$p['idpost'],
              'value'         => html_entity_decode('&#9825;'),
              'class'  => "btnlike btn btn-outline-danger",
              'id'     => 'btnlike'
        );
        echo form_submit($data);
    }
    echo "| ".$countcomment[$i]['jum']." Comments | ";
    echo $p['waktu']." | ";
    if (strlen($p['share'])>1) echo $p['share']." | ";
    echo form_submit('btnsharepost'.$p['idpost'],'Share','class="btn btn-secondary", id="btnshare"');
    echo "<br>";

    //listlikers
    echo "<ul id='likers".$p['idpost']."' class='likers'>";
    foreach ($likers[$i] as $en)
    {
        echo "<li>".$en['email']."</li>";
    }
    echo "</ul>";

    echo "<hr align='left' width='30%'>";

    if (isset($comment[$p['idpost']]))
    {
        foreach ($comment[$p['idpost']] as $listcomment) {
            echo "<b>".$listcomment['email']."</b> ";
            echo $listcomment['comment']." ";
            if ($listcomment['email']==$emailnow)
                echo form_submit('btndelcom'.$listcomment['idcomment'], "x",'class="btn btn-secondary", id="btndelpost"');
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
echo form_close();
echo $links;
echo '<ul class="pagination pagination-sm">';
echo $links;
echo '</ul>';
echo "</div>";
?>
