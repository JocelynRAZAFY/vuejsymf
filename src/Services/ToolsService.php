<?php
/**
 * Created by PhpStorm.
 * User: jocelyn
 * Date: 5/1/19
 * Time: 9:31 AM
 */

namespace App\Services;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class ToolsService
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var KernelInterface
     */
    private $kernel;

    private $targetDirectory;

    public function __construct(
        ContainerInterface $container,
        KernelInterface $kernel,
        $targetDirectory
    )
    {
        $this->container = $container;
        $this->kernel = $kernel;
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * Get a user from the Security Token Storage.
     *
     * @return mixed
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see TokenInterface::getUser()
     *
     * @final
     */
    public function getUser()
    {
        if (!$this->container->has('security.token_storage')) {
            throw new \LogicException('The SecurityBundle is not registered in your application. Try running "composer require symfony/security-bundle".');
        }

        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user;
    }

    /**
     * @param $base64String
     * @return string
     */
    public function uploadBase64($base64String)
    {
        $ext = explode('/',explode(';',$base64String)[0])[1];
        $image = explode(',',$base64String)[1];
        $fileName = md5(time().uniqid()).'.'.$ext;

//        $filePath = $this->kernel->getProjectDir().'/public/img/post/'.$fileName;
        $filePath = $this->targetDirectory.'/'.$fileName;
        $data = base64_decode($image);
        file_put_contents($filePath, $data);

        return $fileName;
    }

    /**
     * @param $photo
     * @return string
     */
    public function imageToBase64($photo)
    {
        if($photo != ''){
            $urlImage = $this->targetDirectory.'/'.$photo;
            $type = pathinfo($urlImage, PATHINFO_EXTENSION);
            $data = file_get_contents($urlImage);

            return  'data:image/' . $type . ';base64,' . base64_encode($data);
        }

    }

    public function removeImage($image)
    {
        $urlImage = $this->targetDirectory.'/'.$image;
        if(file_exists($urlImage)){
            unlink($urlImage);
        }
    }

}