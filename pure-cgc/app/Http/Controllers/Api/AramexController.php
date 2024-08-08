<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoapClient;
class AramexController extends Controller
{

    public function shipping_calculator(Request $request)
    {
        $city=$request->input('city');
        $weight=$request->input('weight');
        $params = array(
            'ClientInfo'  	    => array(
                        'AccountCountryCode'=> config('aramex.AccountCountryCode'),
                        'AccountEntity'		=> config('aramex.AccountEntity'),
                        'AccountNumber'		=> config('aramex.AccountNumber'),
                        'AccountPin'		=> config('aramex.AccountPin'),
                        'UserName'			=> config('aramex.UserName'),
                        'Password'		 	=> config('aramex.Password'),
                        'Version'			=> config('aramex.Version')
            ),
            'Transaction' 	    => array('Reference1'=> '001' ),
            'OriginAddress' 	=> array(
                                'City'			=> 'Riyadh',
                                'CountryCode'	=> 'SA'
            ),
            'DestinationAddress' => array(
                                'City'			=> $city,
                                'CountryCode'	=> 'SA'
            ),
            'ShipmentDetails'	=> array(
                                'PaymentType'	    => 'P',
                                'ProductGroup'		=> 'EXP',
                                'ProductType'		=> 'PPX',
                                'ActualWeight' 		=> array('Value' => $weight, 'Unit' => 'KG'),
                                'ChargeableWeight' 	=> array('Value' => $weight, 'Unit' => 'KG'),
                                'NumberOfPieces'    => 1
            )
        );

        //$soapClient = new SoapClient(url('aramex/aramex-rates-calculator-wsdl.wsdl'), array('trace' => 1));
        $soapClient = new SoapClient('https://ws.aramex.net/ShippingAPI.V2/RateCalculator/Service_1_0.svc?wsdl', array('trace' => 1));
        $results = $soapClient->CalculateRate($params);

        if(count($results))
        {
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$results;
            return $data;
        }
        else
        {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=array();
            return $data;
        }
        die();
    }

    public function shipment_tracking(Request $request)
    {
        $shipment=$request->input('shipment');
        $user_id=$request->input('user_id');
        //$soapClient = new SoapClient(url('TrackingShipmentWSDL.wsdl'));
        $soapClient = new SoapClient('https://ws.aramex.net/shippingapi/tracking/service_1_0.svc?wsdl', array('trace' => 1));
        // shows the methods coming from the service
        //print_r($soapClient->__getFunctions());
        /*
            parameters needed for the trackShipments method , client info, Transaction, and Shipments' Numbers.
            Note: Shipments array can be more than one shipment.
        */
        $params = array(
            'ClientInfo'  	=> array(
                'AccountCountryCode'=> config('aramex.AccountCountryCode'),
                'AccountEntity'		=> config('aramex.AccountEntity'),
                'AccountNumber'		=> config('aramex.AccountNumber'),
                'AccountPin'		=> config('aramex.AccountPin'),
                'UserName'			=> config('aramex.UserName'),
                'Password'		 	=> config('aramex.Password'),
                'Version'			=> config('aramex.Version')
            ),
            'Transaction' 	=> array(
                'Reference1'		=> '001'
            ),
            'Shipments'		=> array(
                "$shipment"
            )
        );
        // calling the method and printing results
        try {
            $auth_call = $soapClient->TrackShipments($params);
            //print_r($auth_call);
            $data['result']=true;
            $data['error_message']='';
            $data['error_message_en']='';
            $data['data']=$auth_call;
            return $data;
            die();
        } catch (SoapFault $fault) {
            $data['result']=false;
            $data['error_message']='لايوجد بيانات';
            $data['error_message_en']='No Results';
            $data['data']=$fault->faultstring;
            return $data;
            die();
        }
    }
}
