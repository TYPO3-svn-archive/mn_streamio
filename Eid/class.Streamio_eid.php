<?php
require_once(PATH_tslib.'class.tslib_pibase.php'); 

class Streamio_eid extends tslib_pibase {
    var $extKey = 'tx_mnstreamio';
    
    /**
     * Table_eid::main()
     * 
     * @return void
     */
    function main(){    
        
        //Is cURL installed
        if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        }
        
        tslib_eidtools::connectDB(); //Connect to database

        $this->piVars = t3lib_div::_GET($this->extKey);
        if (is_array(t3lib_div::_POST($this->extKey))) {
            $this->piVars = array_merge($this->piVars, t3lib_div::_POST($this->extKey));
        }
        $result = array();
        
        $extConfig = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['mn_streamio']);
        
        switch ($this->piVars['action']) {
            case 'getStreamioData' :
                //$result = $this->getTable(mysql_real_escape_string($this->piVars['tableName']), mysql_real_escape_string($this->piVars['fields']), mysql_real_escape_string($this->piVars['where']), mysql_real_escape_string($this->piVars['groupBy']), mysql_real_escape_string($this->piVars['orderBy']), mysql_real_escape_string($this->piVars['limit']));
                $result = $this->getStreamioData();
            break; 
        }
        
        echo $result;
        
    }
    
    /**
     * Streamio_eid::getStreamioData()
     * Get the Streamio data from an cURL request.
     * ex: https://streamio.com/api/v1/videos.json?tags=Wildlife + basic authentication
     * 
     * @param string $userName username for service
     * @param string $password the password for the service
     * @param string $apiUrl api base url
     * @param string $searchType search type, ex: videos.json
     * @param string $filterType filter type, ex; tags=
     * @param string $searchData data to search the api with
     * @return json $result
     */
    private function getStreamioData($userName, $password, $apiUrl, $searchType, $filterType, $searchData) {
        
        $url = "https://streamio.com/api/v1/videos.json?tags=Wildlife";
        $ch = curl_init();    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
        curl_setopt($ch, CURLOPT_USERPWD, "tollepjaer:e9c02cd27c22540db56552b625f175"); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
        curl_setopt($ch, CURLOPT_GET, 1); // set POST method
        //curl_setopt($ch, CURLOPT_POSTFIELDS, "tags=Wildlife");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch); 
        
        return $result;
        
    }
    
}

$output = t3lib_div::makeInstance('Streamio_eid');
$output->main();

?>