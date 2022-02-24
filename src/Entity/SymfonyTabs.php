<?php

namespace App\Entity;

use App\Repository\SymfonyTabsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymfonyTabsRepository::class)]
class SymfonyTabs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $st_caption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStCaption(): ?string
    {
        return $this->st_caption;
    }

    public function setStCaption(string $st_caption): self
    {
        $this->st_caption = $st_caption;

        return $this;
    }
}
