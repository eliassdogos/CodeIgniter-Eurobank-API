<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My_eurobank {

public $mid;
public $shared_secret;
public $form_action_post_url;
public $confirmUrl;
public $cancelUrl;
public $lang;
public $currency;



	public function __construct()
	{
		   	$this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('form');
			 	$this->CI->load->config('my_eurobank_config');
			 	$this->mid=$this->CI->config->item('mid','eurobank');
				$this->shared_secret=$this->CI->config->item('shared_secret','eurobank');
				$this->form_action_post_url=$this->CI->config->item('form_action_post_url','eurobank');
				$this->confirmUrl=$this->CI->config->item('confirmUrl','eurobank');
				$this->cancelUrl=$this->CI->config->item('cancelUrl','eurobank');
				$this->lang=$this->CI->config->item('lang','eurobank');
				$this->currency=$this->CI->config->item('currency','eurobank');

	}



	function get_all_config_vars()
	{ // send Congig Vars to View
										$config_vars=array(
										"mid"=>$this->mid,
										"lang"=>$this->lang,
										"confirmUrl"=>$this->confirmUrl,
										"currency"=>$this->currency,
										"cancelUrl"=>$this->cancelUrl,
										"shared_secret"=>$this->shared_secret,
										);

										return $config_vars;
	}



  function add_form_field($field, $value)
	{
		// adds a key=>value pair to the fields array, which is what will be
		// sent to eurobank as POST variables.  If the value is already in the
		// array, it will be overwritten.
		$this->fields[$field] = $value;
	}

	function button($value)
	{
		// changes the default caption of the submit button
		$this->submit_btn = form_submit('eurobank_submit', $value);
	}

  function eurobank_auto_form()
  {
    // this function actually generates an entire HTML page consisting of
    // a form with hidden elements which is submitted to eurobank via the
    // BODY element's onLoad attribute.  We do this so that you can validate
    // any POST vars from you custom form before submitting to eurobank.  So
    // basically, you'll have your own form which is submitted to your script
    // to validate the data, which in turn calls this function to create
    // another hidden form and submit to eurobank.

    $this->button('Click here if you\'re not automatically redirected...');


   echo '<body style="text-align:center;" onLoad="document.forms[\'eurobank_auto_form\'].submit();">' . "\n";
		echo '<div class="col-md-12">';
    echo '<p style="text-align:center;" class="c-content-label c-font-uppercase c-font-bold c-bg-blue-2 c-font-slim c-label-lg">Παρακαλώ μην κλείσετε κανένα παράθυρο μέχρι να ολοκληρωθεί η συναλλαγή. Please wait, your order is being processed and you will be redirected to the eurobank website.</p>' . "\n";
	  echo $this->eurobank_form('eurobank_auto_form');
				echo "</div>";

  }


	function eurobank_form($form_name='eurobank_form') // form generate from add_form_field function
	{
		$str = '';
		$str .= '<form method="POST" action="'.$this->form_action_post_url.'" name="'.$form_name.'" accept-charset="UTF-8" />' . "\n";///ebala to post se get
		foreach ($this->fields as $name => $value)
		$str .= form_hidden($name, $value) . "\n";
		$str .= '<p>'. $this->submit_btn . '</p>';
		$str .= form_close() . "\n";

		return $str;
	}





















}//end library







?>
