<?php

interface IK8DataSource {

    public function countItems();
    public function getItems();
    /**
     * @param string $v
     * @return IK8DataSource
     */
    public function setFilterField($v);
    /**
     * @param string $v
     * @return IK8DataSource
     */
    public function setFilterValue($v);
    /**
     * @param string $v
     * @return IK8DataSource
     */
    public function setOrderBy($v);
    /**
     * @param string $v
     * @return IK8DataSource
     */
    public function setOrderDirection($v);

    /**
     * @param string $v
     * @return IK8DataSource
     */
    public function addExtraWhereText($v);
}
