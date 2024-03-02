<?php

namespace App\Http\Controllers;

use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Http\Request;

class SoapController extends Controller
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function demoFunction($name)
    {
        // Your SOAP logic here
        return "Hello, " . $name;
    }

    public function handleSOAPRequest(Request $request)
    {
        // Add the service to the wrapper
        $this->soapWrapper->add('ServiceName', function ($service) {
            $service
                ->wsdl('path_to_wsdl') // The WSDL url
                ->trace(true);
        });

        // Use the service
        $response = $this->soapWrapper->call('ServiceName.demoFunction', ['name' => 'John Doe']);

        return response()->json($response);
    }
}
