<?php
    /**
    * This is the class useed for get the updates of pages using Facebook graph API
    *
    * Long description for class (if any)...
    * @author     Hasitha Eranga
    * @created 07/04/2015
    * @link https://github.com/
    */

class GetfbPageData{
    
    function getPageUpdate(){
        
        //use one of below method to get data from FB page
        
        //get data using CURL request
        //$pageUpdateData = $this->curl_get_contents("https://graph.facebook.com/v2.3/Your-Page-Name/photos?type=uploaded&access_token=Your-Access-Token");
        
        //get data using file_get_contents php function
        $pageUpdateData = file_get_contents("https://graph.facebook.com/v2.3/Your-Page-Name/photos?type=uploaded&access_token=Your-Access-Token", true);
        
        return $pageUpdateData;
    }
    
    //Function to call CURL
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
    //Creating The Object
    $curls = new GetfbPageData;
    //Call the Method 
    $std = $curls->getPageUpdate();
    
    $json_feed_object = json_decode($std);

    foreach ( $json_feed_object->data as $key =>$entry )
    {
        echo '<p style="font-size:20px;">'.$entry->name.'</p>';
        //this will echo the main source image(no resizing)
        echo '<img src="'.$entry->source.'">';
        echo '<a href='.$entry->link.'>aa</a>';
        //break;//Uncomment this to get only latest post from the page
    }


?>
