<?php

class SummaryUserAppointmentManager extends Model
{
    public function getSummaryUserAppointmentSummary($table,$obj,$field,$way)
    {
        $this->getBdd();
        return $this->getAppointments($table, $obj,$field,$way);
    }
    public function getGenericGroupDetail($table, $obj)
    {
        $this->getBdd();
        if(isset($_GET["id"]))
            return $this->details("appointment","Appointment","id",$_GET["id"]);
    }
    public function getGenericGroupDetailId($table, $obj,$id)
    {
        $this->getBdd();
        return $this->details($table, $obj,"id",$id);
    }
}