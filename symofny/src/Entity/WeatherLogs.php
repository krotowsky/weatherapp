<?php

namespace App\Entity;

use App\Repository\WeatherLogsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherLogsRepository::class)
 */
class WeatherLogs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $TemperatureC;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $humidity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $AtmosphericPressure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperatureC(): ?string
    {
        return $this->TemperatureC;
    }

    public function setTemperatureC(?string $TemperatureC): self
    {
        $this->TemperatureC = $TemperatureC;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(?string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getAtmosphericPressure(): ?string
    {
        return $this->AtmosphericPressure;
    }

    public function setAtmosphericPressure(?string $AtmosphericPressure): self
    {
        $this->AtmosphericPressure = $AtmosphericPressure;

        return $this;
    }
}
