<?php
function music_create () {

$name = $_POST["name"];
$artists = $_POST["artists"];
$album = $_POST["album"];
$genre = $_POST["genre"];
//insert
if(isset($_POST['insert'])){
	global $wpdb;
	$wpdb->insert(
		'wp_songs', //table
		array('name' => $name,'artists' => $artists,'album' => $album, 'genre' => $genre), //data
		array('%s','%s','%s','%s') //data format			
	);
	$message.="Song inserted";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/paolo/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Add New Song</h2>
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table class='wp-list-table widefat fixed'>
<tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
<tr><th>Artists</th><td><input type="text" name="artists" value="<?php echo $artists;?>"/></td></tr>
<tr><th>Album</th><td><input type="text" name="album" value="<?php echo $album;?>"/></td></tr>
<tr><th>Genre</th><td><input type="text" name="genre" value="<?php echo $genre;?>"/></td></tr>


</table>
<input type='submit' name="insert" value='Save' class='button'>
<?php if($_POST['insert']){?>
<a href="<?php echo admin_url('admin.php?page=music_list')?>">&laquo; Back to list</a>

<?php } ?>
</form>
</div>
<?php
}