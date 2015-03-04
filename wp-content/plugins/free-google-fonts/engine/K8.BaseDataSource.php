<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseK8DataSource
 *
 * @author Lukasz
 */
class BaseK8DataSource {

    private $extraWhereTexts = array();

    public function addExtraWhereText($v) {
        $this->extraWhereTexts[] = $v;
    }

    public function getExtraWhereTexts() {
        if (count($this->extraWhereTexts) > 0) {
            return ' AND ' . implode(" AND ", $this->extraWhereTexts);
        } else {
            return '';
        }
    }

}
