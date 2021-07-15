<?php
require_once  'vendor/autoload.php';

define('APPLICATION_NAME', 'G Suite Activity API PHP Quickstart');
define('CREDENTIALS_PATH', 'custom/appsactivity-php-quickstart.json');
define('CREDENTIALS_REFRESH_PATH', 'custom/refresh_token.json');
define('CLIENT_SECRET_PATH', 'custom/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/appsactivity-php-quickstart.json
define('SCOPES', implode(' ', array(
        Google_Service_Appsactivity::ACTIVITY,
        Google_Service_Appsactivity::DRIVE_METADATA_READONLY,
        Google_Service_Sheets::DRIVE)
));


class GoogleAPISheets{

    var $client;
    var $service;
    var $spreadsheetId;

    public function __construct($url)
    {

        // Get the API client and construct the service object.
        $this->client = $this->getClient();
        $this->service = new Google_Service_Sheets($this->client);

        // Определение ID документа из URL
        preg_match("|https://docs.google.com/spreadsheets/d/(.*)/edit|is", $url, $matches);
        $this->spreadsheetId = $matches[1];

    }

    function getClient() {

        $client = new Google_Client();

        $client->setApplicationName(APPLICATION_NAME);
        $client->setScopes(SCOPES);
        $client->setAuthConfig(CLIENT_SECRET_PATH);
        $client->setAccessType('offline');
        $client->setApprovalPrompt("force");

        // Load previously authorized credentials from a file.
        $credentialsPath = $this->expandHomeDirectory(CREDENTIALS_PATH);
        if(file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath),true);
        }else{
            if(!empty($_POST["submit"]) && !empty($_POST["token"])){
                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($_REQUEST["token"]);
                // Store the credentials to disk.
                if(!file_exists(dirname($credentialsPath))) {
                    mkdir(dirname($credentialsPath), 0700, true);
                }
                if(!file_exists(dirname(CREDENTIALS_REFRESH_PATH))) {
                    mkdir(dirname(CREDENTIALS_REFRESH_PATH), 0700, true);
                }
                file_put_contents($credentialsPath,json_encode($accessToken));
            }else{   
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                echo("Open the following link in your browser:\n<a href=\"{$authUrl}\" target=\"_blank\">{$authUrl}</a>\n");
                echo("Enter verification code:<form method=\"POST\"><input type=\"text\" name=\"token\"/><input type=\"submit\" name=\"submit\" value=\"Build\" />");
                foreach($_POST as $k=>$v){
                    echo("<input type=\"hidden\" name=\"{$k}\" value=\"{$v}\"/>");
                }
                echo("</form>");
                exit();
            }
        }
        $client->setAccessToken($accessToken);
        if($client->isAccessTokenExpired()){
            //$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            //file_put_contents($credentialsPath, json_encode($client->getRefreshToken()));
        }
        return $client;
    }

    /**
     * Expands the home directory alias '~' to the full path.
     * @param string $path the path to expand.
     * @return string the expanded path.
     */
    function expandHomeDirectory($path) {
        $homeDirectory = getenv('HOME');
        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        return str_replace('~', realpath($homeDirectory), $path);
    }

    /**
     * Get first sheet title
     * @return mixed
     */
    public function getFirstSheet() {
        $sheets = $this->getSheets();
        if(isset($sheets[0])) {
            return $sheets[0];
        }
        return null;
    }

    /**
     * Return sheets list name
     * @return array
     */
    public function getSheets() {
        $spreadsheets = $this->service->spreadsheets->get($this->spreadsheetId);
        $return_array = array();
        foreach($spreadsheets->getSheets() as $s) {
            $return_array[] = $s['modelData']['properties']['title'];
        }
        return $return_array;
    }


    /**
     * Clear table
     * @param $sheet
     * @return Google_Service_Sheets_ClearValuesResponse
     */
    public function clearSheet($sheet) {
        $range = $sheet . '!A1:Z65535';

        $clearValues = new Google_Service_Sheets_ClearValuesRequest();
        $response = $this->service->spreadsheets_values->clear($this->spreadsheetId, $range, $clearValues);

        return $response;

    }
    /**
     * Write new cell
     * @param $sheet
     * @param $row
     * @param $values
     * @return Google_Service_Sheets_UpdateValuesResponse
     */
    public function update($sheet, $row, $values) {

        $range = $sheet . '!' . $row;

        $valueRange= new Google_Service_Sheets_ValueRange();
        $valueRange->setValues(["values" => $values]); // Add two values
        $conf = ["valueInputOption" => "USER_ENTERED"];



        $response = $this->service->spreadsheets_values->update($this->spreadsheetId, $range, $valueRange, $conf);

        return $response;

    }

    /**
     * Update mass cells
     * @param $sheet
     * @param $row
     * @param $values
     * @return Google_Service_Sheets_BatchUpdateValuesResponse
     */
    public function updateLines($sheet, $row, $values) {

        // Стартовая точка
        $range = $sheet . '!' . $row;

        $data = array();
        $data[] = new Google_Service_Sheets_ValueRange(array(
            'range' => $range,
            'values' => $values
        ));

        $body = new Google_Service_Sheets_BatchUpdateValuesRequest(array(
            'valueInputOption' => "USER_ENTERED",
            'data' => $data
        ));

        $response = $this->service->spreadsheets_values->batchUpdate($this->spreadsheetId, $body);
        //print_array($response);

        return $response;

    }

}