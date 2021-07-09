# HC Laravel

HC Laravel is a package using hcaptcha for stopping bots ([hcaptcha.com](https://www.hcaptcha.com))

This package support Laravel 6, 7 and 8.

# Installation

**Install the package**

    composer require codise/hclaravel

**Publish the config**

    php artisan vendor:publish --provider="Codise\Hclaravel\HcaptchaServiceProvider" --tag="config"
   
   
Configure **hcaptcha.php** in config folder.  Add in environment `.env` variable the key of captcha


**Configure providers and aliases**

Add in `config/app.php` the follow line
		

    'providers'  =>  [
    	Codise\Hclaravel\HcaptchaServiceProvider::class,
    ]
    
    'aliases' => [
        'Hcaptcha'  =>  Codise\Hclaravel\Hcaptcha::class
    ]

## Usage

This package allows simply to use the captcha on your project without too much effort.

**Account**

Create an account on https://www.hcaptcha.com for having `secret_key` and `site_key`

**Blade view**

`@include('hclaravel::captcha')`
 
**Controller** 

     use Hcaptcha;
     //response
     $response = Hcaptcha::verify($request->get('h-captcha-response'));
     
     //add condition for response
     if($response){
	     $msg = "Robot verification success";
     }else{
	     $msg = "Robot verification failed";
     }
     
**License**

HC Laravel is open-source software licensed  **MIT Licensed**

**Support**

If you have any suggestion, open issue or you can contribute


If you like my project give me a **[coffee](https://www.patreon.com/tojorodialson)** 

