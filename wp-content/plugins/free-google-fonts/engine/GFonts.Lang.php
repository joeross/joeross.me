<?php
class GFontsLang {
    static public function GetTranslation($text) {
        $translations = array(
            'Please select answer' => 'Please select answer'
        );
        if (isset($translations[$text])) {
            return $translations[$text];
        } else {
            return $text;
        }
    }
}