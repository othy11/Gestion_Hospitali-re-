<?php
require_once('Views/View.php');

class modif_paiementController
{
    private $_view;
    private $_manager;
    private $_managerDoctor;
    private $_managerPatient;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            if(!isset($_POST["update"]))
              $this->rdvUpdate();
            else
              $this->rdv();
        }
    }

    private function rdv()
    {
        $this->_manager = new InvoiceManager;
        $inv = $this->_manager->updInvoicePost();
        $this->_view = new View('liste_rendezvous');
        $this->_view->generate(array('invoice' => $inv));
    }

    private function rdvUpdate()
    {
        $this->_manager = new InvoiceManager;
        $inv = $this->_manager->getInvoiceByAppointment($_GET["id"]);
        $this->_view = new View('modif_paiement');
        $this->_view->generate(array('invoice' => $inv));
    }
}
?>