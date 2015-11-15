<?php

namespace App\Services\Contracts;

use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;

Interface ImageStorageContract 
{
  /**
   * Store the image in the filesystem
   * @param  UploadedFile   $image
   * @return string       The stored image name
   */
  public function store(UploadedFile $image);

  /**
   * Delete the image from the filesystem
   * @param  string $fileName
   * @return bool           
   */
  public function delete($fileName);
}