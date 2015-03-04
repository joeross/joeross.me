<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GFonts
 *
 * @author Lukasz
 */
class GFontsPollsDataSource extends BaseK8DataSource implements IK8DataSource {

    protected $filterField = null;
    protected $filterValue = null;
    protected $orderBy = null;
    protected $orderDirection = null;

    public function __construct() {
        ;
    }

    public function countItems() {
        global $wpdb;
        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}gf_polls WHERE 1";
        $sql .= $this->getExtraWhereTexts();
        if (($this->filterField != null) && ($this->filterValue != null)) {
            $sql .= " AND " . $this->filterField . " LIKE %s";
            $sql = $wpdb->prepare($sql, '%' . $this->filterValue . '%');
        }
        if ($this->orderBy != null) {
            switch($this->orderBy) {
                default:
                case 'name' : $sql .= " ORDER BY name";
                    break;
            }

            if ($this->orderDirection != null) {
                if ($this->orderDirection == 'desc' || $this->orderDirection == 'asc') {
                    $sql .= ' ' . $this->orderDirection;
                }
            }
        }
        return $wpdb->get_var($sql);
    }

    public function getItems() {
        global $wpdb;
        $sql = "SELECT id, name, title, `type`, results_type, voting_end_date, client_mode, (CASE WHEN voting_enabled = 1 THEN 'Yes' ELSE 'No' END) AS voting_enabled, button_title FROM {$wpdb->prefix}gf_polls WHERE 1";
        $sql .= $this->getExtraWhereTexts();
        if (($this->filterField != null) && ($this->filterValue != null)) {
            $sql .= " AND " . $this->filterField . " LIKE %s";
            $sql = $wpdb->prepare($sql, '%' . $this->filterValue . '%');
        }
        if ($this->orderBy != null) {
            switch($this->orderBy) {
                default:
                case 'name' : $sql .= " ORDER BY name";
                    break;
                case 'title' : $sql .= " ORDER BY title";
            }

            if ($this->orderDirection != null) {
                if ($this->orderDirection == 'desc' || $this->orderDirection == 'asc') {
                    $sql .= ' ' . $this->orderDirection;
                }
            }
        }
        $res =  $wpdb->get_results($sql, ARRAY_A);
        return $res;
    }

    /**
     *
     * @param string $v
     * @return GFontsPresetsDataSource
     */
    public function setFilterField($v) {
        $this->filterField = $v;
        return $this;
    }

    /**
     *
     * @param string $v
     * @return GFontsPresetsDataSource
     */
    public function setFilterValue($v) {
        $this->filterValue = $v;
        return $this;
    }


    /**
     *
     * @param string $v
     * @return GFontsPresetsDataSource
     */
    public function setOrderBy($v) {
        $this->orderBy = $v;
        return $this;
    }

    /**
     *
     * @param string $v
     * @return GFontsPresetsDataSource
     */
    public function setOrderDirection($v) {
        $this->orderDirection = $v;
        return $this;
    }

}
