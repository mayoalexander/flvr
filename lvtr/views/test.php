<?php
include_once('../config.php');
$site = new Config();
$post = $site->get_post_by_id(15479);
?>
<pre>
<?php
$post['blogtitle'] = '++ meka jackson ++';
$post['twitter'] = '@dontfollowmeka';
// var_dump($site->create_url($post));
// var_dump($site->create_url($post));