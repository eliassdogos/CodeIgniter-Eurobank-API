<?php
/**
 * Name:    Eurobak API for Codeigniter
 * Author:  Elias elsdogos
 * Email: elsdogos@gmail.com
 * @link https://github.com/eliassdogos/CodeIgniter-Eurobank-API
 * @filesource
 */
$config['eurobank']['mid']     = "YourMid"; // Required
$config['eurobank']['shared_secret']     = "Cardlink1YourSecret "; // Required
$config['eurobank']['form_action_post_url']     = "url Provided by eurobank"; // Required Productive or Test Env
$config['eurobank']['confirmUrl']     = "Confirm URL"; // REquired url for live or production enviroment to Connect
$config['eurobank']['cancelUrl']     = "cancel url"; // Required url for live or production enviroment to Send Vouchers Numbers and Print Parameters
$config['eurobank']['lang']     = "el"; // "el" Or "en" , Optional
$config['eurobank']['currency']     = "EUR"; // "USD" Or "GBP" , Required
