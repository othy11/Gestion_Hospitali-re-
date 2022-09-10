<?php
require_once('Views/View.php');

class modif_invoiceController
{
    private $_view;
    private $_manager;
    private $_app;

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
        $inv = $this->_manager->updInvoice();
        $this->_view = new View('liste_invoice');
        $this->_view->generate(array('invoice' => $inv));
    }

    private function rdvUpdate()
    {
        $this->_manager = new InvoiceManager;
        $inv = $this->_manager->getInvoiceByAppointment($_GET["id"]);
        $this->_app = new AppointmentManager;
        $app = $this->_app->getAppointmentDetailById($_GET["id"]);
        $this->_view = new View('modif_invoice');
        $this->_view->generate(array('invoice' => $inv,'Appo'=>$app));
    }
}
?>