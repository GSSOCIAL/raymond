<?php

class CSV_Manager{
    public $tbody = array();
    public $thead = array();

    function __construct(){
        return $this;
    }

    /**
     * Add row
     * @param Array $Columns Column data array 
     */
    public function addRow($Columns){
        $this->tbody[] = $Columns;
        return $this;
    }
    /**
     * Add table header row
     * @param Array $Labels Labels columns
     */
    public function addHeader($Labels){
        $this->thead = $Labels;
        return $this;
    }

    /**
     * Get table output content
     * @param string/false $file Filename. If passed will push data to file
     */
    public function get($file=null){
        $out = "";

        $col_delimiter = ';';
        $row_delimiter = "\r\n";

        //Walk thru each row
        $tdata = $this->tbody;
        array_unshift($tdata,$this->thead);
        
        foreach($tdata as $row){
            $cols = array();
            foreach($row as $col_val){
                if($col_val && preg_match('/[",;\r\n]/', $col_val)){
                    // поправим перенос строки
                    if( $row_delimiter === "\r\n" ){
                        $col_val = str_replace( "\r\n", '\n', $col_val );
                        $col_val = str_replace( "\r", '', $col_val );
                    }
                    elseif( $row_delimiter === "\n" ){
                        $col_val = str_replace( "\n", '\r', $col_val );
                        $col_val = str_replace( "\r\r", '\r', $col_val );
                    }
    
                    $col_val = str_replace( '"', '""', $col_val ); // предваряем "
                    $col_val = '"'. $col_val .'"'; // обрамляем в "
                }
                $cols[] = $col_val; // добавляем колонку в данные
            }
            $out .= implode($col_delimiter,$cols).$row_delimiter; // добавляем строку в данные
        }

        $out = rtrim($out,$row_delimiter);

        //задаем кодировку windows-1251 для строки
        if($file){
            $out = iconv("UTF-8","cp1251",$out);

            //создаем csv файл и записываем в него строку
            $done = file_put_contents($file,$out);

            return $done ? $out : false;
        }
        return $out;
    }
}