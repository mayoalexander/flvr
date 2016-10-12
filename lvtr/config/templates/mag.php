<?php
// include('../config.php');

/**
* 
*/
class Mag extends Config {
	function __construct()
	{
		// $this->foo = $foo;
	}

	public function display_content($posts)
	{
		foreach ($posts as $key => $post) {
			# code...
			echo '<article class="content__item">
							<span class="category category--full">'.$post['twitter'].'</span>
							<h2 class="title title--full">'.$post['twitter'].'</h2>
							<div class="meta meta--full">
								<img class="meta__avatar" src="'.$post['photo'].'" alt="author01" />
								<span class="meta__author">'.$post['twitter'].'</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> 9 Apr</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>
							</div>
							<p>'.$post['description'].'</p>
							<p><audio controls src="'.$post['trackmp3'].'"></p>
						</article>';
		}
	}
	public function embed_content($file)
	{
		// echo '<audio controls preload="metadata" src="'.$post['trackmp3'].'"></audio>';
		echo ''.$file.'';
	}
	public function display_grid($posts)
	{
		foreach ($posts as $key => $post) {
			# code...
			echo '<a class="grid__item" href="#">
						<h2 class="title title--preview">'.$post['twitter'].'</h2>
						<div class="loader"></div>
						<span class="category">'.$post['blogtitle'].'</span>
						<div class="meta meta--preview">
							<img class="meta__avatar" src="'.$post['photo'].'" alt="author01" /> 
							<!--<span class="meta__date"><i class="fa fa-calendar-o"></i> '.$this->get_time_ago($post['submission_date']).'</span>-->
							<span class="meta__reading-time"><i class="fa fa-clock-o"></i> '.$post['views'].' views</span>
						</div>
					</a>';
		}
	}
}


