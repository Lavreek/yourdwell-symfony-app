<?php

namespace App\Entity;

use App\Repository\TabsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabsRepository::class)]
class Tabs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $tab_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $tab_caption;

    #[ORM\Column(type: 'boolean')]
    private $tab_usage;

    public function getTabId(): ?int
    {
        return $this->tab_id;
    }

    public function getTabCaption(): ?string
    {
        return $this->tab_caption;
    }

    public function setTabCaption(string $tab_caption): self
    {
        $this->tab_caption = $tab_caption;

        return $this;
    }

    public function getTabUsage(): ?bool
    {
        return $this->tab_usage;
    }

    public function setTabUsage(bool $tab_usage): self
    {
        $this->tab_usage = $tab_usage;

        return $this;
    }
}
