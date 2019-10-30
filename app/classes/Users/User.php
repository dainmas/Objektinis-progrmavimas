<?php
namespace App\Users;
class User {

    private $name;
    private $email;
    private $password;
    
    private $data = [];

    public function __construct(array $data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name'=> null,
                'email' => null,
                'password' => null
            ];
        }
    }

    /**
     * Sets all data from array
     * @param type $array
     */
    public function setData(array $array) {
        if (isset($array['id'])) {
            $this->setID($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setEmail($array['email'] ?? null);
        $this->setPassword($array['password'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData(): array {
        return [
            'id' => $this->getID(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
        ];
    }

    /**
     * Sets ID
     * @param int $id
     */
    public function setID(int $id) {
        $this->data['id'] = $id;
    }

    /**
     * Set data name
     * @param string $name
     */
    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    /**
     * Set data email
     * @param string $name
     */
    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }

    /**
     * Set data amount
     * @param int $amount
     */
    public function setPassword(string $password) {
        $this->data['password'] = $password;
    }

    /**
     * Gets ID
     * @return int|null
     */
    public function getID(): ?int {
        return $this->data['id'];
    }

    /**
     * Returns name
     * @return string|null
     */
    public function getName(): ?string {
        return $this->data['name'];
    }

    /**
     * Returns name
     * @return string|null
     */
    public function getEmail(): ?string {
        return $this->data['email'];
    }

    /**
     * Returns amount in milliliters
     * @return int|null
     */
    public function getPassword(): ?string {
        return $this->data['password'];
    }

}
