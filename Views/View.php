<?php
class View
{
    private $_usr;
    private $_name;
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'Views/'.$action.'.php';
        if(isset($_COOKIE["adminemail"]))
            $this->_usr = "Administrateur";
        if(isset($_COOKIE["patientemail"]))
            $this->_usr = "Patient";
        if(isset($_COOKIE["doctoremail"]))
            $this->_usr = "Médecins";
        if(isset($_COOKIE["nurseemail"]))
            $this->_usr = "Infirmière";
        if(isset($_COOKIE["employeemail"]))
            $this->_usr = "Employé";
    if(isset($_COOKIE["nom"]))   
        $this->_name = $_COOKIE["nom"]." ".$_COOKIE["prenom"];
    }
    // génère et affiche la vue
    public function generate($data)
    {
        // partie spécifique de la vue
        $content = $this->generateFile($this->_file, $data);

        //template
        $view = $this->generateFile('Views/template.php', array('t' => $this->_t, 'content' => $content));
        
        echo $view;
    }
    // génère une fichier vue et renvoie le résultat
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception('Fichier '.$file.' Introuvable');
        }
    }
}
?>