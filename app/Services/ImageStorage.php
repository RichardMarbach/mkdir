<?php

namespace App\Services;

use App\Services\Contracts\ImageStorageContract as StorageContract;
use File;
use Image;

class ImageStorage implements StorageContract 
{
  /**
   * Path to save the image to
   * @var string
   */
  private $destinationPath = '/images/';

  /**
   * Image dimensions (width x height) in pixels
   * @var array
   */
  private $dimensions = [150, 200];

  /**
   * Stores a image in the designated folder
   * @param  File   $image 
   * @return string       The stored filenames
   */
  public function store(File $image) 
  {
    $image = Image::make($image);
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
   * Retrieves the filepath for an image
   * @param  string $filename
   * @return string
   */
  private function getFilePath($filename = '')
  {
    return $this->destinationPath . $filename;
  }
}