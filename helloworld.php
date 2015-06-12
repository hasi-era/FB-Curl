<?php
    /**
    * This is the class use for get updates of pages
    *
    * Long description for class (if any)...
    * @author     Hasitha Eranga
    * @created 07/04/2015
    * @link https://github.com/
    */

class Getfbpageimages{
    
    function getPageUpdate(){
        
        //use one og below method to get data from FB page
        
        //get data using CURL request
        //$pageUpdateData = $this->curl_get_contents("https://graph.facebook.com/v2.3/PrimaKottumeeLK/photos?type=uploaded&access_token=CAACEdEose0cBAPX8PW7XJvZB2eaOQPCDwql2L2Kdyd76G9YM09ChmG6inYmVwEDyrN5WTBXlRZB1NvHrtZBYEN13bGWbupD7ATqsiXAyouv3bHEL9qe7sIew0uLxxeaoocXzgXdF7BZAUxLXRd4FKDj5sjrW6zBwn0BtGVnbPyiM9Rst7v11eF83031lZCzP4ruvIX86R5wZDZD");
        
        //get data using file_get_contents php function
        $pageUpdateData = file_get_contents("https://graph.facebook.com/v2.3/PrimaKottumeeLK/photos?type=uploaded&access_token=CAACEdEose0cBAPX8PW7XJvZB2eaOQPCDwql2L2Kdyd76G9YM09ChmG6inYmVwEDyrN5WTBXlRZB1NvHrtZBYEN13bGWbupD7ATqsiXAyouv3bHEL9qe7sIew0uLxxeaoocXzgXdF7BZAUxLXRd4FKDj5sjrW6zBwn0BtGVnbPyiM9Rst7v11eF83031lZCzP4ruvIX86R5wZDZD", true);
        
        return $pageUpdateData;
    }
    
    function curl_get_contents($url)
    {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      $data = curl_exec($curl);
      curl_close($curl);
      return $data;
    }
    
}

    $curls = new Getfbpageimages;
    
    $std = $curls->getPageUpdate();
    
    $json_feed_object = json_decode($std);

    foreach ( $json_feed_object->data as $key =>$entry )
    {
        echo '<p style="font-size:20px;">'.$entry->name.'</p>';
        echo '<img src="'.$entry->source.'">';
        echo '<a href='.$entry->link.'>aa</a>';
        //break;//Uncomment this to get letest post from the page
    }


?>
