<?php

include ("library/Scraper.php");

class Request
{
    public $url = "http://www.dsebd.org";

    public function getRequest($source = null, $key = null, $outputResponse = null)
    {
        //Need to verify credentials if needed

    }

    /**
     * @param null $source
     * To verify the valid source of request and tell apps whether it will receive request or decline it.
     * It's something like random request to make CPU down or un-usual request or filtering IP's or host
     * and something else that should be better to keep the request good and clean.
     */
    protected function verifySource($source = null)
    {
        //Write few essential code here
    }

    /**
     * @param null $key
     * If someone want to serve the request with few soft limitation or need authentication then
     * API provider can manage unique key for receiving each request.
     */
    protected function checkKey($key = null)
    {
        //Write few essential code blocks
    }

    protected function setResponse ($type = 'null')
    {
        if(empty($type)){
            return false;
        }

        if($type == "json"){
            return json_encode($this->prepareData());
        }
    }

    /**
     * To respond against any request we may need to prepare out data and check data integrity
     */
    protected function prepareData()
    {
        $Scraper = new Scraper();
        $data = $Scraper->scrapData($this->url);
        return $data;
    }

    public function getResponse($type = null)
    {
        /**
         * Analyze request by getRequest() method
         */
        return $data = $this->setResponse($type);
    }
}
