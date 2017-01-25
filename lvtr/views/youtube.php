<?php
	include('../header.php');

  require_once ($_SERVER["DOCUMENT_ROOT"].'/lvtr/config/api/youtube.php');
?>



<div class="container video-container" style="background: #000;">

    <div class="embed-responsive embed-responsive-16by9">
        <iframe id="ytplayer" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_data['id']['videoId']; ?>?modestbranding=1&showinfo=0&playsinline=1&autoplay=1" ></iframe>
    </div>
    
    <div class="container">
        <div class="page-header row">
            <h2 id="yttitle" class="col-md-10"><?php echo $video_data['snippet']['title']; ?></h2>
            <div class="col-md-2 btn-group">
                <button class="share-page-trigger btn btn-link pull-right" data-id="{{ record.id }}" data-title="<?php echo $video_data['snippet']['title']; ?>" data-twitter="{{ record.twitter }}" data-method="twitter"><i class="fa fa-twitter"></i> Twitter</button>
                <button class="share-page-trigger btn btn-link pull-right" data-id="{{ record.id }}" data-title="{{ record.title }}" data-twitter="{{ record.twitter }}" data-method="facebook"><i class="fa fa-facebook"></i> Facebook</button>
            </div>
        </div>
        
        
        <div class="col-md-7 comments-section" style="height:500px;">
            <h4>Comments</h4>
            <div class="fb-comments" data-href="http://freelabel.net/view/tv/video/{{ record.slug }}" data-width="600" data-numposts="5" colorscheme="dark"></div>
        </div>
        <div class="col-md-5 comments-section">
            <h4>Social</h4>
            
            <a class="twitter-timeline" data-chrome="nofooter noborders transparent" data-theme="dark" data-height="500" href="https://twitter.com/{{ record.twitter }}">{{ record.twitter }}</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
    
</div>

<script src="http://freelabel.net/lvtr/js/dashboard.js" type="text/javascript"></script>



<?php include('../footer.php');?>