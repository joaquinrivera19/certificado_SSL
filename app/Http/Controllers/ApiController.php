<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SslCertificate\SslCertificate;
use Spatie\SslCertificate\Exceptions\CouldNotDownloadCertificate;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function certificateExists($url)
	{

		try {
        	SslCertificate::createForHostName($url);
        	return true;
	    } catch (\Exception $e) {
	        return $e->getMessage();
	    }
	    
	}

    public function index()
    {


    	$url_array = 
    	[
            [
                'url'=>'https://www.agd.com.ar',
                'error'=>''
            ],
            [
                'url'=>'https://auditoria.agd.com.ar',
                'error'=>''
            ],
    		[
    			'url'=>'https://transportes.agd.com.ar',
    			'error'=>''
    		],
            [
                'url'=>'https://agdpedidos.agd.com.ar',
                'error'=>''
            ],
            [
                'url'=>'https://natura.com.ar',
                'error'=>''
            ],
            [
                'url'=>'https://www.recetasnatura.com.ar',
                'error'=>''
            ],
    		[
    			'url'=>'https://comprasbys.com.ar',
    			'error'=>''
    		],
    		[
    			'url'=>'https://solicitudesagd.com',
    			'error'=>''
    		],
            [
                'url'=>'https://agro.agd.com.ar',
                'error'=>''
            ]
    	];

		$array_num = count($url_array);

		for ($i = 0; $i < $array_num; ++$i){
		    
			$url_array[$i]['error'] = $this->certificateExists($url_array[$i]['url']);
		 
		}
        
        return view('welcome', compact('url_array'));

        echo $certificate->getIssuer(); // returns "Let's Encrypt Authority X3"
        echo "</br>";
        echo $certificate->isValid(); // returns true if the certificate is currently valid returns a boolean
        echo "</br>";
        echo $certificate->expirationDate(); // returns an instance of Carbon
        echo "</br>";
        echo $certificate->expirationDate()->diffInDays(); // returns an int
        echo "</br>";
        echo $certificate->getSignatureAlgorithm(); // returns a string
        echo "</br>";
        echo $certificate->getDomain();
        echo "</br>";
        //echo $certificate->getAdditionalDomains();
        echo "</br>";
        //echo $certificate->getFingerprint();
        echo "</br>";
        echo $certificate->validFromDate();
        echo "</br>";
        //echo $certificate->isExpired(); // returns a boolean if expired

        //return $certificate;
    }

}
