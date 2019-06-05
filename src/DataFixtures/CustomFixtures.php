<?php

namespace App\DataFixtures;

use App\Entity\Custom;
use App\Repository\CustomRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CustomFixtures extends Fixture
{
    /**
     * @var CustomRepository
     */
    private $customRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * CustomFixtures constructor.
     * @param CustomRepository $customRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        CustomRepository $customRepository,
        UserRepository $userRepository)
    {
        $this->customRepository = $customRepository;
        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager)
    {
        $customs = [
            ['title' => 'Prérequis', 'content' => 'Pour tirer le meilleur parti de ce module, vous devriez avoir parcouru les précédents modules JavaScript de la série (Premiers pas, Building blocks et objets JavaScript).'],
            ['title' => 'API web utilisées côté client', 'content' => 'Lorsque vous écrivez du JavaScript côté client pour des sites Web ou des applications, vous n\'irez pas très loin avant d\'utiliser des API - des interfaces'],
            ['title' => 'Java​Script', 'content' => 'JavaScript (qui est souvent abrégé en « JS ») est un langage de script léger, orienté objet, principalement connu comme le langage de script des pages web'],
            ['title' => 'Introduction aux API du Web', 'content' => 'Tout d\'abord, nous survolerons du concept d\'API — qu\'est-ce que c\'est, comment ça fonctionne, comment les utiliser dans votre code, et comment sont-elles structurées. Nous verrons également quelles sont les principales API et leur utilisation.'],
            ['title' => 'serveur proxy…', 'content' => 'Si vous ne pensez pas devoir utiliser de serveur proxy, procédez comme suit'],
            ['title' => 'Si vous utilisez un serveur proxy', 'content' => 'Vérifiez vos paramètres de proxy ou contactez votre administrateur réseau pour vous assurer que le serveur proxy fonctionne'],
            ['title' => 'Autorisez Chrome', 'content' => 'S\'il est déjà répertorié en tant que programme autorisé à accéder au réseau, essayez de le supprimer de la liste, puis de le rajouter.'],
            ['title' => 'Vérifiez votre connexion Internet', 'content' => 'Vérifiez les câbles et redémarrez votre routeur, votre modem ou tout autre périphérique réseau utilisé.'],
            ['title' => 'Aucun accès à Internet', 'content' => 'Essayez les suggestions ci-dessous :
Vérifiez les câbles réseau, le modem et le routeur.
Reconnectez-vous au réseau Wi-Fi
'],
            ['title' => 'Page en maintenance', 'content' => 'Désolé, la page est en cours de maintenance.Merci de réessayer plus tard.'],
        ];

        foreach ($customs as $custom){
            $cust = $this->customRepository->findOneBy(['title' => $custom['title']]);
            if(!$cust){
                $cust = new Custom();
                $cust->setTitle($custom['title']);
                $cust->setContent($custom['content']);
                $cust->setCreated(new \DateTime('now'));
                $cust->setUser($this->userRepository->find(1));
                $manager->persist($cust);
            }
        }
        $manager->flush();
    }
}
