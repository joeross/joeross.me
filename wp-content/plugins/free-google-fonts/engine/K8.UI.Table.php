<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class K8_UI_Table extends WP_List_Table {

    /**
     *
     * @var array of Columns
     */
    private $columns = array();
    private $columnsByTitle = array();
    private $filterElements = array();
    private $pageName = null;
    private $urlSuffix = null;

    /**
     *
     * @var IK8DataSource
     */
    private $dataSource = null;

    /**
     *
     * @var K8_UI_Table_SearchBox
     */
    private $searchBox = null;

    /**
     * Font size of cells
     * @var int
     */
    private $fontSize = 17;

    /**
     * Base url for sorting
     * @var string
     */
    private $baseUrl = null;

    /**
     *
     * @var array
     */
    private $bulkActions = null;
    private $cbName = 'ids';

    public function __construct() {
        return parent::__construct(array('plural' => '', 'screen' => ''));
    }

    /*     * *
     * @param string $title Column title
     * @param bool $sortable Is sortable
     * @param string $sortId Id
     * @param bool $isBulkCheckbox Is checkbox
     * @return K8_UI_Table
     */

    public function addColumn($title, $sortable, $sortId, $isBulkCheckbox = false, $clickLink = null, $rowActions = null, $truefalse = false, $newwindow = false) {
        $col = new K8_UI_Table_Column();
        if ($isBulkCheckbox) {
            if (trim($title) != '') {
                $this->cbName = str_replace(' ', '_', $title);
            }
        }
        $nCol = $col->setTitle($title)->setSortable($sortable)->setSortId($sortId)->setIsBulkCheckbox($isBulkCheckbox)->setLink($clickLink)->setTrueFalse($truefalse);
        if (is_array($rowActions)) {
            foreach ($rowActions as $ra) {
                $nCol->addRowAction($ra[0], $ra[1], $ra[2], $newwindow);
            }
        }
        $this->columns[] = $nCol;
        $this->columnsByTitle[$title] = $nCol;
        return $this;
    }

    /**
     *
     * @param int $v
     * @return K8_UI_Table
     */
    public function setFontSize($v) {
        $this->fontSize = intval($v);
        return $this;
    }

    /**
     * Gets cell font size
     * @return int
     */
    public function getFontSize() {
        return $this->fontSize;
    }

    /**
     * Sets base url for sorting
     * @param string $burl
     * @return K8_UI_Table
     */
    public function setBaseUrl($burl) {
        $this->baseUrl = $burl;
        return $this;
    }

    /**
     * Gets base url for sorting
     * @return string
     */
    public function getBaseUrl() {
        return $this->baseUrl;
    }

    /**
     *
     * @param string $link
     * @param string $title
     * @param string $getElement Name of GET parameter to detect if view is current
     * @param string $getElementValue Value of GET parameter to detect if view is current
     * @return K8_UI_Table
     */
    public function addFilterElement($link, $title, $getElement, $getValue) {
        $fe = new K8_UI_Table_FilterElement();
        if ($getValue != '') {
            if (isset($_GET[$getElement]) && $_GET[$getElement] == $getValue) {
                $current = true;
            } else {
                $current = false;
            }
        } else {
            $current = !isset($_GET[$getElement]);
        }
        $this->filterElements[] = $fe->setLink($link)->setTitle($title)->setCurrent($current);
        return $this;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table
     */
    public function setPageName($v) {
        $this->pageName = $v;
        $this->screen = convert_to_screen($v);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPageName() {
        return $this->pageName;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table
     */
    public function setUrlSuffix($v) {
        $this->urlSuffix = $v;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getUrlSuffix() {
        return $this->urlSuffix;
    }

    /**
     *
     * @param K8_UI_Table_SearchBox $box
     * @return K8_UI_Table
     */
    public function setSearchBox(K8_UI_Table_SearchBox $box) {
        $this->searchBox = $box;
        return $this;
    }

    /**
     *
     * @param string $action
     * @param string $title
     * @return K8_UI_Table
     */
    public function addBulkAction($action, $title) {
        $this->bulkActions[] = array(
            'action' => $action,
            'title' => $title
        );
        return $this;
    }

    public function display() {
        if (count($this->filterElements) > 0) {
            $this->views();
        }

        print "<form id=\"" . $this->pageName . "-filter\" action=\"\" method=\"get\">";
        $this->search_box($this->searchBox->getButtonText(), $this->searchBox->getInputName());
        if (count($this->searchBox->getHiddenFields()) > 0) {
            $hf = $this->searchBox->getHiddenFields();
            foreach ($hf as $hfs) {
                printf("<input type=\"hidden\" name=\"%s\" value=\"%s\" />", $hfs['name'], $hfs['value']);
            }
        }
        $this->prepare_items();
        parent::display();
        print "</form>";
    }

    public function get_views() {
        $views = array();
        if (count($this->filterElements) > 0) {
            foreach ($this->filterElements as $fe) {
                $views[$fe->getTitle()] = sprintf("<a href=\"%s\"%s>%s</a>", $fe->getLink(), $fe->getClassCurrent(), $fe->getTitle());
            }
        }

        return $views;
    }

    public function get_column_info() {
        $columns = array();
        $hidden = array();
        $sortable = array();
        $columnsList = $this->columns;
        foreach ($columnsList as $col) {
            //$col = new K8_UI_Table_Column();
            if (!$col->isBulkCheckbox()) {
                $columns[$col->getTitle()] = $col->getTitle();
                if ($col->getSortable()) {
                    $sortable[$col->getTitle()] = array($col->getSortId(), false);
                }
            } else {
                $columns['cb'] = '<input type="checkbox" />';
                $hidden[] = false;
            }
        }

        return array($columns, $hidden, $sortable);
    }

    public function get_bulk_actions() {
        $actions = array();
        if (is_array($this->bulkActions))
            foreach ($this->bulkActions as $act) {
                $actions[$act['action']] = $act['title'];
            }

        return $actions;
    }

    public function prepare_items() {
        $items = $this->dataSource->getItems();
        $nItems = array();
        foreach($items as $itemArray) {
            $nItm = array();
            foreach($itemArray as $key=>$el) {
                $nItm[$key] = esc_attr(stripslashes($el));
            }
            $nItems[] = $nItm;
        }

        $this->items = $nItems;
    }

    public function has_items() {
        $c = $this->dataSource->countItems();
        return ($c > 0);
    }

    public function column_cb($item) {
        print "<input type=\"checkbox\" name=\"" . $this->cbName . "[]\" value=\"" . $item['id'] . "\">";
    }

    public function column_default($item, $column_name = null) {
        $col = $this->columnsByTitle[$column_name];
        if ($col->getLink() != '') {
            print "<strong><a href=\"" . $col->getLink();
            if ($col->getItemId() != null) {
                print "&" . $col->getItemId() . "=" . $item[$col->getItemId()];
            }
            print "\">";
        }
        print $item[$col->getSortId()];
        if ($col->getLink() != '') {
            print "</a></strong>";
        }

        if (count($col->getRowActions()) > 0) {
            $rowActions = $col->getRowActions();
            $actions = array();
            foreach ($rowActions as $ra) {
                $aLink = '<a href="' . $ra['link'];
                if ($ra['id'] != null) {
                    $aLink .= "&" . $ra['id'] . "=" . $item[$ra['id']];
                }

                $aLink .= '"';
                if ($ra['nw'] == true) {
                    $aLink .= ' target="_blank"';
                }
                $aLink .= '>' . $ra['title'] . '</a>';
                $actions[$ra['title']] = $aLink;
            }
            echo $this->row_actions($actions);
        }
    }

    public function setDataSource(IK8DataSource $ds) {
        $this->dataSource = $ds;
    }

}

class K8_UI_Table_Column {

    private $title;
    private $sortable;
    private $sortId;
    private $_isBulkCheckbox;
    private $link;
    private $itemId;
    private $rowActions;
    private $true_false;

    /*     * *
     * @return K8_UI_Table_Column
     */

    public function __construct() {
        $this->title = null;
        $this->sortable = false;
        $this->sortId = null;
        $this->_isBulkCheckbox = false;
        $this->link = null;
        $this->itemId = null;
        $this->rowActions = array();
        $this->true_false = false;
    }

    /*     * *
     * @return K8_UI_Table_Column
     */

    public function setTitle($v) {
        $this->title = $v;
        return $this;
    }

    /*     * *
     * @return K8_UI_Table_Column
     */

    public function setSortable($v) {
        $this->sortable = (bool) $v;
        return $this;
    }

    /*     * *
     * @return K8_UI_Table_Column
     */

    public function setSortId($v) {
        $this->sortId = $v;
        return $this;
    }

    /*     * *
     * @return K8_UI_Table_Column
     */

    public function setIsBulkCheckbox($v) {
        $this->_isBulkCheckbox = (bool) $v;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSortable() {
        return $this->sortable;
    }

    public function getSortId() {
        return $this->sortId;
    }

    public function isBulkCheckbox() {
        return $this->_isBulkCheckbox;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table_Column
     */
    public function setLink($v) {
        if (is_array($v)) {
            $this->link = $v[0];
            $this->itemId = $v[1];
        } else {
            $this->link = $v;
        }
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     *
     * @return string
     */
    public function getItemId() {
        return $this->itemId;
    }

    /**
     *
     * @param string $title
     * @param string $link
     * @return K8_UI_Table_Column
     */
    public function addRowAction($title, $link, $id, $newwindow = false) {
        $this->rowActions[] = array(
            'title' => $title,
            'link' => $link,
            'id' => $id,
            'nw' => $newwindow
        );
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getRowActions() {
        return $this->rowActions;
    }

    /**
     *
     * @param bool $v
     * @return K8_UI_Table_Column
     */
    public function setTrueFalse($v) {
        $this->true_false = $v;
        return $this;
    }

    /**
     *
     * @return bool
     */
    public function getTrueFalse() {
        return $this->true_false;
    }

}

class K8_UI_Table_FilterElement {

    /**
     *
     * @var string
     */
    private $link;

    /**
     *
     * @var string
     */
    private $title;

    /**
     *
     * @var bool
     */
    private $current;

    /**
     *
     * @return K8_UI_Table_FilterElement
     */
    public function __construct() {
        return $this;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table_FilterElement
     */
    public function setLink($v) {
        $this->link = $v;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table_FilterElement
     */
    public function setTitle($v) {
        $this->title = $v;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     *
     * @param bool $v
     * @return K8_UI_Table_FilterElement
     */
    public function setCurrent($v) {
        $this->current = (bool) $v;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getClassCurrent() {
        if ($this->current) {
            return " class=\"current\"";
        } else {
            return null;
        }
    }

}

class K8_UI_Table_SearchBox {

    /**
     *
     * @var string
     */
    private $btnText;

    /**
     *
     * @var string
     */
    private $inputName;

    /**
     *
     * @var array
     */
    private $hiddenFields = array();

    /**
     *
     * @return K8_UI_Table_SearchBox
     */
    public function __construct() {
        return $this;
    }

    /**
     *
     * @param string $text
     * @return K8_UI_Table_SearchBox
     */
    public function setButtonText($text) {
        $this->btnText = $text;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getButtonText() {
        return $this->btnText;
    }

    /**
     *
     * @param string $v
     * @return K8_UI_Table_SearchBox
     */
    public function setInputName($v) {
        $this->inputName = $v;
        return $this;
    }

    /**
     * @return string
     */
    public function getInputName() {
        return $this->inputName;
    }

    /**
     *
     * @param string $name
     * @param string $value
     * @return K8_UI_Table_SearchBox
     */
    public function addHiddenField($name, $value) {
        $this->hiddenFields[] = array(
            'name' => $name,
            'value' => $value
        );

        return $this;
    }

    /**
     *
     * @return array
     */
    public function getHiddenFields() {
        return $this->hiddenFields;
    }

}
