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
    private $st_href;

    #[ORM\Column(type: 'string', length: 50)]
    private $st_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStHref(): ?string
    {
        return $this->st_href;
    }

    public function setStHref(string $st_href): self
    {
        $this->st_href = $st_href;

        return $this;
    }

    public function getStValue(): ?string
    {
        return $this->st_value;
    }

    public function setStValue(string $st_value): self
    {
        $this->st_value = $st_value;

        return $this;
    }
}
