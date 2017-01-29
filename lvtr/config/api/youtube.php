<?php
if ($_GET['q']) {

  $range = 25;

  if (strpos($_GET['q'], '-')!==NULL) {
    $query = str_replace('-', '', $_GET['q']);
  } else {
    $query = $_GET['q'];
  }
  


  // Call set_include_path() as needed to point to your client library.
  require_once ($_SERVER["DOCUMENT_ROOT"].'/test/youtube/google-api-php-client/src/Google_Client.php');
  require_once ($_SERVER["DOCUMENT_ROOT"].'/test/youtube/google-api-php-client/src/contrib/Google_YouTubeService.php');

  /* Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
  Google APIs Console <http://code.google.com/apis/console#access>
  Please ensure that you have enabled the YouTube Data API for your project. */
  $DEVELOPER_KEY = 'AIzaSyDOkg-u9jnhP-WnzX5WPJyV1sc5QQrtuyc';

  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  $youtube = new Google_YoutubeService($client);


  try {
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $query,
      'maxResults' =>$range,
    ));

    $videos = '';
    $channels = '';

    foreach ($searchResponse['items'] as $searchResult) {


          // $videos .= sprintf('<li>%s (%s)</li>', $searchResult['snippet']['title'],
            // $searchResult['id']['videoId']."<a href=http://www.youtube.com/watch?v=".$searchResult['id']['videoId']." target=_blank>   Watch This Video</a>";
            $video_data = $searchResult;

    }

   } catch (Google_ServiceException $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
}








if (isset($video_data)) {
  // echo '<pre>';
  // var_dump($video_data);
  // exit;
} else {
  echo 'proceed..';
}
?>