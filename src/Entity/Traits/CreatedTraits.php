<?php 

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

trait CreatedTraits
{
    #[ORM\Column(type: "datetime_immutable", options: ["default" => "CURRENT_TIMESTAMP"])]
    private DateTimeInterface $createdAt;

    #[ORM\PrePersist]

    public function setCreatedAt(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }


}