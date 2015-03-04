<?php

class GFontsUITabs {

    /**
     * Draws wordpress tab header
     * @param array $c - collection of structure ('title' => $name, 'href' => $href, 'active' => bool)
     */
    static public function DrawTabs($c) {
        print "<h2 class=\"nav-tab-wrapper\">";
        if (is_array($c)) {
            foreach ($c as $item) {
                $active = (isset($item['active'])) ? ((bool)$item['active'] ? " nav-tab-active" : "") : "";
                $href = (isset($item['href'])) ? $item['href'] : "#";
                $title = (isset($item['title'])) ? $item['title'] : __('Unknown', GFontsEngine::PLUGIN_SLUG);
                printf("<a class=\"nav-tab%s\" href=\"%s\">%s</a>", $active, $href, $title);
            }
        }
        print "</h2><br/>";
    }

}
