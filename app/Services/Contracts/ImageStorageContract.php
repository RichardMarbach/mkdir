<?php

namespace App\Services\Contracts;

Interface ImageStorageContract 
{
  /**
   * Store the image in the filesystem
   * @param  File   $file
   * @return string       The stored image name
   */
  public function store(File $image);

  /**
   * Delete the image from the filesystem
   * @param  string $fileName
   * @return bool           
   */
  public function delete($fileName);
}