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
class GFontsPollsAnswersDataSource extends BaseK8DataSource implements IK8DataSource {

    protected $filterField = null;
    protected $filterValue = null;
    protected $orderBy = null;
    protected $orderDirection = null;

    public function __construct() {
        ;
    }

    public function countItems() {
        global $wpdb;
        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}gf_polls_answers WHERE 1";
        $sql .= $this->getExtraWhereTexts();
        if (($this->filterField != null) && ($this->filterValue != null)) {
            $sql .= " AND " . $this->filterField . " LIKE %s";
            $sql = $wpdb->prepare($sql, '%' . $this->filterValue . '%');
        }
        if ($this->orderBy != null) {
            switch($this->orderBy) {
                default:
                case 'answer' : $sql .= " ORDER BY answer";
                    break;
                case 'hits' : $sql .= " ORDER BY hits";
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
        $sql = "SELECT * FROM {$wpdb->prefix}gf_polls_answers WHERE 1";
        $sql .= $this->getExtraWhereTexts();
        if (($this->filterField != null) && ($this->filterValue != null)) {
            $sql .= " AND " . $this->filterField . " LIKE %s";
            $sql = $wpdb->prepare($sql, '%' . $this->filterValue . '%');
        }
        if ($this->orderBy != null) {
            switch($this->orderBy) {
                default:
                case 'answer' : $sql .= " ORDER BY answer";
                    break;
                case 'hits' : $sql .= " ORDER BY hits";
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
