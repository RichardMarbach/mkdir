<?php

namespace App\Services;

use App\Services\Contracts\ImageStorageContract as StorageContract;
use File;
use Image;

class ImageStorage implements StorageContract 
{
  public $destinationPath = '/images/';

  public $dimensions = [400, 150];

  /**
   * Stores a file in the designated public folder
   * @param  File   $file 
   * @return string       The hashed file name
   */
  public function store(File $file) 
  {
    $image = Image::make($file);
    $image->resize($this->dimensions[0], $this->dimensions[1]);

    $fileName = uniqid();
    $filePath = $this->getFilePath($fileName);

    $image->save($filePath);
    $image->destroy();

    return $fileName;
  }

  /**
   * Deletes the image from the filesystem
   * @param  string $fileName
   * @return bool
   */
  public function delete($fileName)
  {
    $filePath = $this->getFilePath($fileName);

    return File::delete($filePath);
  }

  /**
   * Retrieves the filepath for a file
   * @param  string $filename
   * @return string
   */
  private function getFilePath($filename = '')
  {
    return public_path() . $this->destinationPath . $filename;
  }
}