<?php
namespace App\Sandwitches;

declare(strict_types=1);

class Sandwitch {

    private $data = [];

    public function __construct(array $data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'price' => null,
                'vegan' => null,
                'image' => null
            ];
        }
    }

    /**
     * 
     * @param array $array
     */
    public function setData(array $array) {
        if (isset($array['id'])) {
            $this->setID($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setPrice($array['price'] ?? null);
        $this->setVegan($array['vegan'] ?? null);
        $this->setImage($array['image'] ?? null);
    }

    /**
     * Gets all data as array 
     * @return array
     */
    public function getData(): array {
        return [
            'id' => $this->getID(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'vegan' => $this->getVegan(),
            'image' => $this->getImage()
        ];
    }

    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function setPrice(float $price) {
        $this->data['price'] = $price;
    }

    public function setVegan(bool $vegan) {
        $this->data['vegan'] = $vegan;
    }

    public function setImage(string $image) {
        $this->data['image'] = $image;
    }

//-------------------------------

    /**
     * Gets ID
     * @return int|null
     */
    public function getId(): ?int {
        return $this->data['id'];
    }

// ?string reiskia returnins null arba stringa:
    public function getName(): ?string {
        return $this->data['name'];
    }

    public function getPrice(): ?float {
        return $this->data['price'];
    }

    public function getVegan(): ?bool {
        return $this->data['vegan'];
    }

    public function getImage(): ?string {
        return $this->data['image'];
    }

}
