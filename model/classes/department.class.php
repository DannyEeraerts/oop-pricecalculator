<?php

class department{
    public $departmentId;
    public $departmentName;
    public $discountId;
    public $discountAmount;
    public $groupId;
    public $orgId;

    public function __construct($departmentId,$departmentName,$discountId,$discountAmount, $groupId, $orgId){
        $this->departmentId = $departmentId;
        $this->departmentName =$departmentName;
        $this->discountId =$discountId;
        $this->discountAmount =$discountAmount;
        $this->groupId =$groupId;
        $this->orgId =$orgId;
    }

    public function get_departmentId() {
        return $this->departmentId;
    }
    public function get_departmentName(){
        return $this->departmentName;
    }
    public function get_discountId(){
        return $this->discountId;
    }
    public function get_discountAmount(){
        return $this->discountAmount;
    }
    public function get_groupId(){
        return $this->groupId;
    }
    public function get_orgId(){
        return $this->orgId;
    }

}