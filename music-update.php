<?php
function music_update () {
global $wpdb;
$id = $_GET["id"];
$name = $_POST["name"];
$artists = $_POST["artists"];
$album = $_POST["album"];
$genre = $_POST["genre"];
//update
if(isset($_POST['update'])){
		
	$wpdb->update(
		'wp_songs', //table
		array('name' => $name, 'artists' => $artists , 'album' => $album, 'genre' => $genre), //data
		array( 'id' => $id ), //where
		array('%s', '%s', '%s', '%s'), //data format
		array('%s') //where format
	);	
}
//delete
else if(isset($_POST['delete'])){	
	$wpdb->query($wpdb->prepare("DELETE FROM wp_songs WHERE id = %s",$id));
}
else{//selecting value to update	
	$musics = $wpdb->get_results($wpdb->prepare("SELECT * from wp_songs where id=%s",$id));
	foreach ($musics as $m ){
		$name = $m->name;
		$artists = $m->artists;
		$album = $m->album;
		$genre = $m->genre;
	}
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/paolo/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Songs</h2>

<?php if($_POST['delete']){?>
<div class="updated"><p>Song deleted</p></div>
<a href="<?php echo admin_url('admin.php?page=music_list')?>"> Back to list</a>

<?php } else if($_POST['update']) {?>
<div class="updated"><p>Song updated</p></div>
<a href="<?php echo admin_url('admin.php?page=music_list')?>"> Back to list</a>

<?php } else {?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table class='wp-list-table widefat fixed'>
<tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
<tr><th>Artists</th><td><input type="text" name="artists" value="<?php echo $artists;?>"/></td></tr>
<tr><th>Album</th><td><input type="text" name="album" value="<?php echo $album;?>"/></td></tr>
<tr><th>Genre</th><td><input type="text" name="genre" value="<?php echo $genre;?>"/></td></tr>
</table>
<input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
<input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Do you want to delete?')">
</form>
<?php }?>

</div>
<?php
}