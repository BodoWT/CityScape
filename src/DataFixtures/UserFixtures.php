<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ){}

    public function load(ObjectManager $manager): void
    {
        // Création de l'admin du compte
        $admin = new User();
        $admin->setEmail('admin@admin.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin'));
        $admin->setIsVerified(true); 
        $admin->setFirstName('Bodo'); 
        $admin->setLastName('WT');
        $admin->setUserName('BodoWT');
        // $admin->setPhoneNumber('0606060606');
        // $admin->setAddress('1 rue de la paix');
        // $admin->setCity('Paris');
        // $admin->setZipCode('75000');
        // $admin->setCountry('France');
        // $admin->setBirthDate(new \DateTime('1990-01-01'));
        // $admin->setCreatedAt(new \DateTime());
        // $admin->setUpdatedAt(new \DateTime());
        $manager->persist($admin);

        // Création de l'agent immobillier du compte
        $agent = new User();
        $agent->setEmail('agent@agent.com');
        $agent->setRoles(['ROLE_AGENT_IMMOBILLIER']);
        $agent->setPassword($this->passwordHasher->hashPassword($agent, 'agent'));
        $agent->setIsVerified(true); 
        $agent->setFirstName('Mathis'); 
        $agent->setLastName('WT');
        $agent->setUserName('Mathissou');
        // $agent->setPhoneNumber('0606060606');
        // $agent->setAddress('1 rue de la paix');
        // $agent->setCity('Paris');
        // $agent->setZipCode('75000');
        // $agent->setCountry('France');
        // $agent->setBirthDate(new \DateTime('1990-01-01'));
        // $agent->setCreatedAt(new \DateTime());
        // $agent->setUpdatedAt(new \DateTime());
        $manager->persist($agent);

        // Création de l'utilisateur du compte
        for ($i = 1; $i <= 20; $i++) 
        {
            $user = new User();
            $user->setEmail('user'.$i.'@user.com');
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'user'));
            $user->setIsVerified(true); 
            $user->setFirstName('User'); 
            $user->setLastName('WT');
            $user->setUserName('UserWT');
            // $user->setPhoneNumber('0606060606');
            // $user->setAddress('1 rue de la paix');
            // $user->setCity('Paris');
            // $user->setZipCode('75000');
            // $user->setCountry('France');
            // $user->setBirthDate(new \DateTime('1990-01-01'));
            // $user->setCreatedAt(new \DateTime());
            // $user->setUpdatedAt(new \DateTime());
            $manager->persist($user);
        } 
        $manager->flush();
    }
}
