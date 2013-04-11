<?php

function getTweets($user, $limit){

    $xml = simplexml_load_file("cache/OMFGFM.rss");
    $counter=0;
    foreach ($xml->channel->item as $tweet)
        {
		if ($counter <= $limit)	{
        $title=str_replace("OMFGFM: ","",$tweet->title);
        echo "<div class='tweet'><a href='".$tweet->link."'>".$title."</a></div>";
        echo "<div class='tweetdate'>".$tweet->pubDate."</div>";
        echo "<hr>";
        $counter=$counter+1;
		}
        }
    }



function tweet($user, $pass, $status){
 
        if ($status) {

        $tweetUrl = 'http://www.twitter.com/statuses/update.xml';


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "$tweetUrl");
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "status=$status");
        curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");


        $result = curl_exec($curl);

        $resultArray = curl_getinfo($curl);
		
		
        if ($resultArray['http_code'] == 200)

                echo 'Tweet Posted';

        else

        echo 'Could not post Tweet to Twitter right now. Try again later. Error Code:'.$resultArray['http_code'];

        curl_close($curl);

        }

}



function savetwit ($username) 
{
	//create the rss feed
	$local_file = './cache/'.$username.'.rss';

	if (is_file($local_file))
		{
			//Find out how many seconds it has been since the file was last updated - in seconds
			$time_lapse = (strtotime("now") - filemtime($local_file));
				//if it has been more than 10 minutes, update the local feed
				if ($time_lapse > 600) 
					{
						//grab the feed from twitter
						$feed_grab = file_get_contents('http://twitter.com/statuses/user_timeline/'.$username.'.rss');
							//check to make sure the feed has content and isn't just some error message
							if (strlen($feed_grab) > 100)
								{
									//if all  looks good, update the local feed
									file_put_contents($local_file, $feed_grab);
								}
					
					
					}			
		
		
		} 
		
	else 
		{
			//grab the feed from twitter
			$feed_grab = file_get_contents('http://twitter.com/statuses/user_timeline/'.$username.'.rss');
			//check to make sure the feed has content and isn't just some error message
				if (strlen($feed_grab) > 100)
					{
						//if all  looks good, update the local feed
						file_put_contents($local_file, $feed_grab);
					}
		
		}

}

?>