
<?php
require_once(PATH_tslib.'class.tslib_pibase.php'); 

class Streamio_eid extends tslib_pibase {
    var $extKey = 'tx_mnstreamio';
    
    /**
     * Table_eid::main()
     * Is called in this manner: 
     * http://yourdomain/?eID=tx_mnstreamio_Streamio&tx_mnstreamio[action]=getStreamioVideosData
     * &tx_mnstreamio[streamioUid]=theRecordUid&tx_mnstreamio[searchQuery]=Wildlife,Test
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
            case 'getStreamioVideosData' :
                $streamioCredentials = $this->getStreamioLoginCredentials(mysql_real_escape_string($this->piVars['streamioUid']));
                $result = $this->getStreamioVideosData($extConfig["streamioApiUrl"], $streamioCredentials, mysql_real_escape_string($this->piVars['searchQuery']));
            break;
            case 'getStreamioPlayers' :
                $streamioCredentials = $this->getStreamioLoginCredentials(mysql_real_escape_string($this->piVars['streamioUid']));
                $result = $this->getStreamioPlayers($extConfig["streamioApiUrl"], $streamioCredentials);
            break; 
        }
        
        echo $result;
        
    }
    
    /**
     * Streamio_eid::getStreamioLoginCredentials()
     * Get the login crendetials for Streamio API.
     * 
     * @param   string  $streamioUid
     * @return  array   $result  
     */
    private function getStreamioLoginCredentials($streamioUid) {
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            "user_name, password", "tx_mnstreamio_domain_model_streamioapi", 'deleted != 1 AND hidden != 1 AND uid = ' . $streamioUid
        );
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $result = $row;
        }
        return $result;    
    }
    
    /**
     * Streamio_eid::getStreamioData()
     * Get the Streamio data from an cURL request.
     * ex: https://streamio.com/api/v1/videos.json?tags=Wildlife + basic authentication
     * 
     * @param   string  $apiUrl
     * @param   array   $loginCredentials   
     * @param   string  $searchQuery    comma separated words or sentences
     * @return  json    $result
     */
    private function getStreamioVideosData($apiUrl, $loginCredentials, $searchQuery) {
        
        $url = $apiUrl . "videos.json?tags=" . $searchQuery;
        $ch = curl_init();    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
        curl_setopt($ch, CURLOPT_USERPWD, $loginCredentials["user_name"] . ':' . $loginCredentials["password"]); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
        curl_setopt($ch, CURLOPT_GET, 1); // set POST method
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch); 
        
        return $result;
    }
    
    private function getStreamioPlayers($apiUrl, $loginCredentials) {
        
        $url = $apiUrl . "players.json";
        $ch = curl_init();    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
        curl_setopt($ch, CURLOPT_USERPWD, $loginCredentials["user_name"] . ':' . $loginCredentials["password"]); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
        curl_setopt($ch, CURLOPT_GET, 1); // set POST method
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch); 
        
        return $result;
        
    }
    
}

$output = t3lib_div::makeInstance('Streamio_eid');
$output->main();

?>