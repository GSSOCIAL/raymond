<?php 
/**
 * https://trello.com/c/jTmshEWf
 * Item 48 - Daily synchronization of CRM hardware listing to Google Sheets spreadsheet
*/
$job_strings[] = 'exportHardwareToSpreadsheets';
function exportHardwareToSpreadsheets(){
    require_once  'vendor/autoload.php';
    require_once "custom/include/GoogleAPISheets.php";
    $Columns = array(
        "name"=>array(
            "field"=>"name"
        ),
        "status"=>array(
            "field"=>"status"
        ),
        "hd_type"=>array(
            "field"=>"hd_type"
        ),
        "os"=>array(
            "field"=>"os"
        ),
        "hostname"=>array(
            "field"=>"hostname"
        ),
        "pass_w"=>array(
            "field"=>"pass_w"
        ),
        "pass_r"=>array(
            "field"=>"pass_r"
        ),
        "vip"=>array(
            "field"=>"vip"
        ),
        "description"=>array(
            "field"=>"description",
            "style"=>array(
                "width"=>300,
                "text-wrap"=>"WRAP"
            )
        )
    );
    $Hardware = new ass_hardware();
    //Check if file with spreadsheet id exist
    if(!file_exists("custom/crm_harware_spreadsheet.config")){
        //File doesnt exist - Create new.
        $GoogleSpreadsheet = new GoogleAPISheets();
        $Spreadsheet = new Google_Service_Sheets_Spreadsheet(array(
            'properties' => array(
                'title' => "CRM Hardware"
            )
        ));
        $Spreadsheet = $GoogleSpreadsheet->service->spreadsheets->create($Spreadsheet,array(
            'fields' => 'spreadsheetId'
        ));
        $GLOBALS["log"]->warn("Daily synchronization of CRM hardware listing to Google Sheets spreadsheet: Created with id {$Spreadsheet->spreadsheetId}");
        //Update list
        $InsertNewSheet = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
            'requests' => array(
                new Google_Service_Sheets_Request(array(
                    "updateSheetProperties"=>array(
                        "properties"=>[
                            "title"=>"Hardware",
                            "sheetId"=>0
                        ],
                        "fields"=>"title"
                    )
                ))
            )
        ));
        $GoogleSpreadsheet->service->spreadsheets->batchUpdate($Spreadsheet->spreadsheetId,$InsertNewSheet);
        //Print table header
        $valueRange=new Google_Service_Sheets_ValueRange();
        $Table_Columns = array();
        $Cellsstyle = array();
        $Column_count=0;
        foreach($Columns as $name=>$properties){
            $Column_count++;
            if(is_array($properties)){
                if(!empty($properties["style"])){
                    foreach($properties["style"] as $prop=>$val){
                        switch($prop){
                            case "width":
                                $Cellsstyle[] = new Google_Service_Sheets_Request(array(
                                    "updateDimensionProperties"=>array(
                                        "range"=>[
                                            "sheetId"=>0,
                                            "dimension"=>"COLUMNS",
                                            "startIndex"=>$Column_count-1,
                                            "endIndex"=>$Column_count
                                        ],
                                        "properties"=>array(
                                            "pixelSize"=>$val
                                        ),
                                        "fields"=>"pixelSize"
                                    )
                                ));
                            break;
                        }
                    }
                }
                if(!empty($properties["name"])){
                    $Table_Columns[]=$properties["name"];
                    continue;
                }
                if(!empty($properties["field"]) && !empty($Hardware->field_name_map[$properties["field"]])){
                    //Append custom VNAME
                    $Table_Columns[]=translate($Hardware->field_name_map[$properties["field"]]["vname"],"ass_hardware");
                }
                continue;
            }
        }
        //Style header
        $StyleHeader = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
            'requests' => array(
                new Google_Service_Sheets_Request(array(
                    "repeatCell"=>array(
                        "range"=>[
                            "sheetId"=>0,
                            "startRowIndex"=>0,
                            "endRowIndex"=>1,
                            "startColumnIndex"=>0,
                            "endColumnIndex"=>10
                        ],
                        "cell"=>[
                            "userEnteredFormat"=>[
                                "textFormat"=>[
                                    "bold"=>true,
                                ],
                                "backgroundColor"=>[
                                    "green"=>0.77,
                                    "blue"=>1,
                                    "red"=>0.83
                                ],
                            ]
                        ],
                        "fields"=>"UserEnteredFormat(backgroundColor,textFormat)"
                    )
                ))
            )
        ));
        $GoogleSpreadsheet->service->spreadsheets->batchUpdate($Spreadsheet->spreadsheetId,$StyleHeader);
        if(count($Cellsstyle)>0){
            $GoogleSpreadsheet->service->spreadsheets->batchUpdate($Spreadsheet->spreadsheetId,new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array("requests"=>$Cellsstyle))); 
        }
        $valueRange->setValues(["values"=>$Table_Columns]);
        $GoogleSpreadsheet->service->spreadsheets_values->update($Spreadsheet->spreadsheetId,"Hardware!A1",$valueRange,["valueInputOption" => "USER_ENTERED"]);
        file_put_contents("custom/crm_harware_spreadsheet.config",json_encode(array("id"=>$Spreadsheet->spreadsheetId,"last"=>"0")));
    }
    $SpreadSheetData = json_decode(file_get_contents("custom/crm_harware_spreadsheet.config"));
    $GoogleSpreadsheet = new GoogleAPISheets();
    $GoogleSpreadsheet->spreadsheetId = $SpreadSheetData->id;
    if($SpreadSheetData && $GoogleSpreadsheet){
        global $db;
        //Get hardware list (100 entries)
        $skip = !empty($SpreadSheetData->last)?intval($SpreadSheetData->last):0;
        $Entries = $db->query("SELECT h.* FROM ass_hardware h WHERE h.deleted=0 ORDER BY h.date_entered LIMIT {$skip},100");
        if($Entries){
            $skip += $Entries->num_rows;
            file_put_contents("custom/crm_harware_spreadsheet.config",json_encode(array("id"=>$SpreadSheetData->id,"last"=>$skip))); 
        }
        $i=0;
        while($entry = $db->fetchByAssoc($Entries)){
            $i++;
            $index = $skip+$i;
            $Row = array();
            $Rows_Style=array();
            $Column_Count=0;
            foreach($Columns as $name=>$properties){
                $Column_Count++;
                if(is_array($properties)){
                    if(!empty($properties["style"])){
                        foreach($properties["style"] as $prop=>$val){
                            switch($prop){
                                case "text-wrap":
                                    $Rows_Style[] = new Google_Service_Sheets_Request(array(
                                        "repeatCell"=>array(
                                            "range"=>[
                                                "sheetId"=>0,
                                                "startRowIndex"=>$index-1,
                                                "endRowIndex"=>$index,
                                                "startColumnIndex"=>$Column_Count-1,
                                                "endColumnIndex"=>$Column_Count
                                            ],
                                            "cell"=>[
                                                "userEnteredFormat"=>[
                                                    "wrapStrategy"=>$val,
                                                ]
                                            ],
                                            "fields"=>"UserEnteredFormat(wrapStrategy)"
                                        )
                                    ));
                                break;
                            }
                        }
                    }
                    if(!empty($properties["value"])){
                        $Row[]=$properties["value"];
                        continue;
                    }
                    if(!empty($properties["field"]) && !empty($entry[$properties["field"]]) && !empty($Hardware->field_name_map[$properties["field"]])){
                        if($Hardware->field_name_map[$properties["field"]]["type"]=="enum"){
                            $Row[]=translate($Hardware->field_name_map[$properties["field"]]["options"],"ass_hardware",$entry[$properties["field"]]);
                            continue;
                        }
                        $Row[]=$entry[$properties["field"]];
                    }
                    continue;
                }
            }
            //Style
            $GoogleSpreadsheet->service->spreadsheets->batchUpdate($SpreadSheetData->id,new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array("requests"=>$Rows_Style))); 

            $valueRange=new Google_Service_Sheets_ValueRange();
            $valueRange->setValues(["values"=>$Row]);
            $GoogleSpreadsheet->service->spreadsheets_values->update($SpreadSheetData->id,"Hardware!A{$index}",$valueRange,["valueInputOption" => "USER_ENTERED"]);
        }
    }
    return true;
}
?>