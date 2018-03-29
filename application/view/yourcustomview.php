<?php
/**
 * Name:    Eurobak API for Codeigniter
 * Author:  Elias elsdogos
 * Email: elsdogos@gmail.com
 * @link https://github.com/eliassdogos/CodeIgniter-Eurobank-API
 * @filesource
 */

defined('BASEPATH') OR exit('No direct script access allowed');
    

                  $orderids="GEt Your data;";// From request session or query
                  $currentorderdata=$this->YOUR_model->yourquery($orderids); // Get Order Data by OrderId




foreach (  $currentorderdata->result_array() as $orderdatarow){
$orderamount=$orderdatarow["orderamount"];
$payerEmail=$orderdatarow["email"];
//....

//your data for current order
}

$all_config_vars=$this->my_eurobank->get_all_config_vars();
//Build Form Fields
$form_data = "";
$form_data_array = array();
$this->my_eurobank->add_form_field('mid',$all_config_vars["mid"]);
	             $form_data_array[1]=$all_config_vars["mid"];//Required Parameter
$this->my_eurobank->add_form_field('lang',$all_config_vars["lang"]);
               $form_data_array[2]=$all_config_vars["lang"];	//Optional Parameter
$this->my_eurobank->add_form_field('orderid',$orderids);
	             $form_data_array[3]=$orderids;//Required Parameter
$this->my_eurobank->add_form_field('orderDesc',"Amount for order ID".$orderids);	//Optional Parameter

$this->my_eurobank->add_form_field('orderAmount',$orderamount);
	             $form_data_array[4]=$orderamount;//Required Parameter

$this->my_eurobank->add_form_field('currency',$all_config_vars["currency"]);
                $form_data_array[5]=$all_config_vars["currency"];//Required Parameter

$this->my_eurobank->add_form_field('payerEmail',$payerEmail);
                $form_data_array[6]=$payerEmail;//Required Parameter

$this->my_eurobank->add_form_field('confirmUrl',$all_config_vars["confirmUrl"]);
                $form_data_array[7]=$all_config_vars["confirmUrl"];//Required Parameter

$this->my_eurobank->add_form_field('cancelUrl',$all_config_vars["cancelUrl"]);
                $form_data_array[8]=$all_config_vars["cancelUrl"];//Required Parameter

$form_secret = $all_config_vars["shared_secret"];
							           $form_data_array[9] = $form_secret;


                  $form_data = implode("", $form_data_array);
                  $digest = "***********";// copy code from eurobank DOC
                  $this->my_eurobank->add_form_field('digest',$digest);



/* Here you can add all optional parameters from eurobank documentation. For example $this->my_eurobank->add_form_field('myvar',$myvarFromConfigOrModel]);  */

      
//  echo '<pre>' . var_export($form_data_array, true) . '</pre>';  Test What your array contains

          ?>
      <div class="container">
         Your Message
      </div>
      <?php

      $this->my_eurobank->eurobank_auto_form();


       ?>
