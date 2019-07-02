<?php

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

class SugarFieldCstmpass extends SugarFieldBase {

    function getListViewSmarty($parentFieldArray, $vardef, $displayParams, $col) {
        $tabindex = 1;
        $vardef['inline_edit'] = 0;
        //fixing bug #46666: don't need to format enum and radioenum fields
        //because they are already formated in SugarBean.php in the function get_list_view_array() as fix of bug #21672
        if ($this->type != 'Enum' && $this->type != 'Radioenum')
        {
            $parentFieldArray = $this->setupFieldArray($parentFieldArray, $vardef);
        }
        else
        {
            $vardef['name'] = strtoupper($vardef['name']);
        }

        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex, false);

        $this->ss->left_delimiter = '{';
        $this->ss->right_delimiter = '}';
        $this->ss->assign('field_name',strtolower($vardef['name']));
        $this->ss->assign('record_id',$parentFieldArray['ID']);
        $this->ss->assign('pass', $parentFieldArray[$vardef['name']]);

        $len = mb_strlen($parentFieldArray[$vardef['name']], 'utf-8');

        $star = '';
        for ($i = 0; $i<$len; $i++){
            $star .= '*';
        }

        $this->ss->assign('star',$star);

        return $this->fetch($this->findTemplate('ListView'));
    }


    function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex)
    {


        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        return $this->fetch('custom/include/SugarFields/Fields/Cstmpass/EditView.tpl');
    }

}