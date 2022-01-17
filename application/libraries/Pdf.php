
<?php defined('BASEPATH') OR exit('No direct script access allowed');

// reference the Dompdf namespace
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf extends Dompdf    
{
public function __construct()
    {
    parent::__construct();      
    $dompdf = new Dompdf(); 
    }
}
