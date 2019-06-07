<?php
/**
 * Created by PhpStorm.
 * User: jocelyn
 * Date: 11/18/18
 * Time: 10:51 PM
 */

namespace App\Services;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $fileSystem = new Filesystem();

        if(!is_dir($targetDirectory)){
            $fileSystem->mkdir($targetDirectory,0777);
        }

        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file,$oldImg)
    {
        if($oldImg){
            $fileImg = $this->getTargetDirectory().'/'.$oldImg;
            if(file_exists($fileImg)){
                unlink($fileImg);
            }
        }

        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        try {
            $file->move($this->getTargetDirectory(), $fileName);

        } catch (FileException $e) {
            new Exception("Erreur Profil existant ou erreur upload image ".$e);
        }
        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}