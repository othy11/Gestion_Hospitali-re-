<?php
require_once('Views/View.php');

class Detail_invoiceController
{
    private $_view;
    private $_manager;


    public function __construct($url)
    {
        if (isset($url) && $url && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            if (isset($_GET["opt"]))
                $this->dinv();
            else
                $this->linv();
        }
    }

    private function linv()
    {
        if (isset($_GET["user"])) {
            $usr = $_GET["user"];
        } else
            $usr = "patient";

        $this->_manager = new SummaryAppointmentManager;
        if ($usr == "patient") {
            $invo = $this->_manager->getSummaryInvoiceDetail("patient",$_GET["id"]);
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous"];
        }
        if ($usr == "doctor") {
            $invo = $this->_manager->getSummaryInvoiceDetail("doctor",$_GET["id"]);
            $menu = ["Medecin", "Patient", "Quantité rendez-vous", "Prix rendez-vous"];
        }

        if ($usr == "date") {
            $invo = $this->_manager->getSummaryInvoiceDetail("date",$_GET["id"]);
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous"];
        }

        $this->_view = new View('liste_invoice');
        $this->_view->generate(array('invoice' => $invo, 'menu' => $menu, 'user'=>$usr));
    }

    private function dinv()
    {
        $usr = $_GET["opt"];
        $title = "";
     
        $this->_manager = new SummaryAppointmentManager;
        if ($usr == "patient") {
            $invo = $this->_manager->getSummaryInvoiceDetail($usr,$_GET["id"]);
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous"];
            $title = "Liste des paiements par patient";
        }
        if ($usr == "doctor") {
            $invo = $this->_manager->getSummaryInvoiceDetail($usr,$_GET["id"]);
            $menu = ["Medecin", "Patient", "Quantité rendez-vous", "Prix rendez-vous"];
            $title = "Liste des paiements par médecin";
        }

        if ($usr == "date") {
            $invo = $this->_manager->getSummaryInvoiceDetail($usr,$_GET["id"]);
            $menu = ["Patient", "Medecin", "Quantité rendez-vous", "Prix rendez-vous"];
            $title = "Liste des paiements pour une date précise";
        }

        $this->_view = new View('detail_invoice');
        $this->_view->generate(array('invoice' => $invo, 'menu' => $menu, 'user'=>$usr, 'title'=>$title ));
    }

}
