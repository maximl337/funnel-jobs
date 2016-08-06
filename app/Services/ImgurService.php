<?php 

namespace App\Services;

use Imgur;

class ImgurService {
	
	private $client;

	public function upload($image_path, $type = 'file')
	{
		$imageData = array(
            'image' => $image_path,
            'type'  => $type
        );

		// $client = App::make('Imgur\Client');

        $basic = Imgur::api('image')->upload($imageData);

        //parse response
        $resp = $basic->getData();

        //Log::info('imgur response', $resp);

        if(empty($resp['link'])) return '';

        return $resp['link'];
	}

}