<?php

namespace App\Entity\Traits;
use Doctrine\ORM\Mapping as ORM;

trait UpdatedTraits
{
    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeInterface $updatedAt;

    #[ORM\PreUpdate]
    public function setUpdatedAt(): void
    {
        $this->updtaedAt = new \DateTimeImmutable();
    }
    public function getUpdatedAt() : \DateTimeInterface
    {
        return $this->updatedAt;
    }


}