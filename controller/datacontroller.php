
<?php

class ControladorAPI{

	public function callWebService() {

        $url ='https://api.covid19api.com/total/country/peru';
        $json = file_get_contents($url);
        $array = json_decode($json,true);
        return $array;
    }
    public function callWebServiceData() {

        $url ='https://api.covid19api.com/total/country/peru';
        $json = file_get_contents($url);
        $array = json_decode($json,true);
        return $array;
    }

}