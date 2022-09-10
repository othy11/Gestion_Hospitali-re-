<?php
require_once('Views/View.php');

class liste_invoiceController
{
    private $_view;
    private $_manager;


    public function __construct($url)
    {
        if (isset($url) && $url && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
     //       $a = 1;
     //       if (!isset($_POST["update"]))
     //           $a = 2; //$this->getEmployeUpdate();
     //       else
                $this->linv();
        }
    }

    private function linv()
    {
        if (isset($_GET["qry"])) {
            $qry = $_GET["qry"];
        } else
            $qry = "patient";

        $this->_manager = new SummaryAppointmentDetailManager;
        if ($qry == "patient") {
            $invo = $this->_manager->getSummaryInvoice("patient");
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous"];
        }
        if ($qry == "doctor") {
            $invo = $this->_manager->getSummaryInvoice("doctor");
            $menu = ["Medecin", "Patient", "Quantité rendez-vous", "Prix rendez-vous"];
        }

        if ($qry == "date") {
            $invo = $this->_manager->getSummaryInvoice("date");
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous", "Date"];
        }

        $this->_view = new View('liste_invoice');
        $this->_view->generate(array('invoice' => $invo, 'menu' => $menu, 'qry'=>$qry));
    }
}
