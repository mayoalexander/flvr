<?php
include('config.php');

/**
* 
*/
class Grid extends Config {
	function __construct()
	{
		// $this->foo = $foo;
	}
	public function display_grid($posts)
	{
		foreach ($posts as $key => $post) {
			# code...
			echo '<li>
					<figure>
						<img src="'.$post['photo'].'" alt="img01"/>
						<figcaption><h3>'.$post['twitter']. '</h3><p>'.$post['blogtitle'].'</p></figcaption>
					</figure>
				</li>';
		}
	}

	public function display_slide($posts)
	{
		foreach ($posts as $key => $post) {
			# code...
			echo '<li>
							<figure>
								<figcaption>
									<h3>'.$post['twitter'].' '.$this->display_play_button($post).'</h3>
									<p>'.$post['blogtitle'].'</p>
									<p>'.$post['description'].'</p>
								</figcaption>

								<img src="'.$post['photo'].'" alt="'.$post['blogtitle'].'"/>
							</figure>
						</li>';
		}
	}
}


