function google_api_get_lat_long_from_address($address) {
    if (!empty($address)) {
        $formattedAddr = str_replace(' ', '+', $address);
//        $url = "http://maps.google.com/maps/api/geocode/json?address=$formattedAddr&sensor=false&region=India";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&region=In&key=AIzaSyDYf9sKWucfF5y3K59mXYCRuPgTJz1_XbU";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($response);
//        pr($output);
        //Get latitude and longitute from json data
        $data['latitude'] = !empty($output->results[0]) ? $output->results[0]->geometry->location->lat : '';
        $data['longitude'] = !empty($output->results[0]) ? $output->results[0]->geometry->location->lng : '';
        //Return latitude and longitude of the given address
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
