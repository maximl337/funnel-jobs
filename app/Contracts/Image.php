<?php 

namespace App\Contracts;

interface Image {
	
	public function upload($image_path,  $type = 'file');

}