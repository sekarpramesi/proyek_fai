<?php echo "<link rel='stylesheet' href='".base_url()."css/bootstrap/bootstrap.min.css'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/style2.css'>"; ?>

<?php
echo "<div id='result'>";
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
echo "<h1>Explore</h1>";
echo "<hr>";
?>

<?php echo "<script src='".base_url()."js/jquery.js'></script>" ?>
<script>
    $(document).ready(function()
    {
        $("#searchkey").keyup(function() {
            var keyword = $(this).val();
            $.ajax({
                   type:'POST',
                   url:'<?php echo base_url("index.php/cont/explore"); ?>',
                   data:{'keyword' : keyword }
                   ,success:function(data){
                       $('#result').html(data);
                       $('#searchkey').val(keyword);
                   }
             });
        });
    });
</script>

<?php
echo form_open('/cont/search');
echo "Search : ";
echo form_input('tkeyword','','id="searchkey"');
echo form_close();

echo form_open('/cont/explore');
$filter = array(
  'namadepan' => 'Username',
  'totallike' => 'Total like',
  'totalcomment' => 'Total comment',
  'notification' => 'Notification',
  'totalpost' => 'Total post',
);
echo "Filter : ";
echo form_dropdown('cbfilter',$filter);
echo " Sort : ";
$sort = array(
  'asc' => 'Ascending',
  'desc' => 'Descending',
);
echo form_dropdown('cbsort',$sort);
echo form_submit('btnsort',"Filter",'class="btn btn-light"');
echo form_close();
echo "<hr>";

echo form_open('/cont/addFriend','id="add"');
$path = base_url() . "index.php/cont/profileUserLain/";
$listemail = [];
for ($i=0; $i < count($user); $i++)
{
    array_push($listemail, $user[$i]['email']);

    $path .= $i;
    echo "<img src='".base_url('uploads/').$user[$i]['photo']."' width='50px' height='50px' />";
    echo "<a href='$path' style='color:black; text-decoration:none; font-size:15pt; font-weight:bold;'>".$user[$i]['namadepan']." ".$user[$i]['namabelakang']." </a>";
    if ($status[$user[$i]['email']]=='belum')
    {
        echo form_submit('btnaddfriend'.$i,'Requested','class="btn btn-secondary", disabled');
    }
    else if ($status[$user[$i]['email']]=='tidak')
    {
        echo form_submit('btnaddfriend'.$i,'Add as a Friend','class="btn btn-secondary"');
    }
    echo "<br>";
    echo $lastpost[$i]['isipost']."<br>";
    echo  $lastpost[$i]['waktu']."<br>";
    echo "Total likes : " . $totallike[$i] . " | ";
    echo "Total comment : " . $totalcomment[$i] . " | ";
    echo "Total post : " . $totalpost[$i];

    echo "<hr>";
}
$this->session->set_userdata("listemail",$listemail);
echo form_close();
echo '<ul class="pagination pagination-sm">';
echo $links;
echo '</ul>';
echo "</div>";
echo "</div>";
?>
