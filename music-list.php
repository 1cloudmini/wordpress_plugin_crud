<?php
function music_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/paolo/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Songs</h2>

<a href="<?php echo admin_url('admin.php?page=music_create'); ?>">Add New</a>
<?php
global $wpdb;
$search_data = $_POST["search_data"];
if(isset($_POST['search'])){

$rows = $wpdb->get_results("SELECT * from wp_songs where name like '$search_data'");
	
}else {
$rows = $wpdb->get_results("SELECT * from wp_songs");
	
}

echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>ID</th><th>Name</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->id</td>";
	echo "<td>$row->name</td>";
    echo "<td>$row->artists</td>";
    echo "<td>$row->album</td>";
    echo "<td>$row->genre</td>";	
	echo "<td><a href='".admin_url('admin.php?page=music_update&id='.$row->id)."'>Update</a></td>";
	echo "</tr>";}
echo "</table>";
?>

<h2>Search</h2>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<input type="text" name="search_data" value="">
<input type='submit' name="search" value='Search' class='button'> &nbsp;&nbsp;
</form>

</div>
<?php
}