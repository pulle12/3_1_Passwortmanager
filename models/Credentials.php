<?php

require_once 'DatabaseObject.php';

class Credentials implements DatabaseObject, JsonSerializable
{
    private $id = 0;
    private $name = '';
    private $domain = '';
    private $cms_username = '';
    private $cms_password = '';

    private $errors = [];

    public function __construct()
    {
    }

    /**
     * Magic method to allow PDO to set private properties
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    /**
     * Implement JsonSerializable to allow json_encode to serialize private properties
     */
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'domain' => $this->domain,
            'cms_username' => $this->cms_username,
            'cms_password' => $this->cms_password
        ];
    }

    public function validate()
    {
        return $this->validateHelper('Name', 'name', $this->name, 32) &
            $this->validateHelper('Domäne', 'domain', $this->domain, 128) &
            $this->validateHelper('CMS-Benutzername', 'cms_username', $this->cms_username, 64) &
            $this->validateHelper('CMS-Passwort', 'cms_password', $this->cms_password, 64);
    }

    private function validateHelper($label, $key, $value, $maxLength)
    {
        if (strlen($value) == 0) {
            $this->errors[$key] = "$label darf nicht leer sein.";
            return false;
        } else if (strlen($value) > $maxLength) {
            $this->errors[$key] = "$label zu lang (max. $maxLength Zeichen)";
            return false;
        } else {
            return true;
        }
    }

    public function save()
    {
        if ($this->validate()) {

            if ($this->getId() != null && $this->getId() > 0) {
                $this->update();
            } else {
                $this->setId($this->create());
            }

            return true;
        }
        return false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getCmsUsername()
    {
        return $this->cms_username;
    }

    /**
     * @param string $cms_username
     */
    public function setCmsUsername($cms_username)
    {
        $this->cms_username = $cms_username;
    }

    /**
     * @return string
     */
    public function getCmsPassword()
    {
        return $this->cms_password;
    }

    /**
     * @param string $cms_password
     */
    public function setCmsPassword($cms_password)
    {
        $this->cms_password = $cms_password;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function create()
    {
        $sql = "INSERT INTO credentials (name, domain, cms_username, cms_password) VALUES (?, ?, ?, ?)";
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->name, $this->domain, $this->cms_username, $this->cms_password]);
        $lastId = $db->lastInsertId();
        Database::disconnect();
        return $lastId;
    }

    public function update()
    {
        $sql = "UPDATE credentials SET name = ?, domain = ?, cms_username = ?, cms_password = ? WHERE id = ?";
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->name, $this->domain, $this->cms_username, $this->cms_password, $this->id]);
        Database::disconnect();
    }

    public static function get($id)
    {
        $sql = "SELECT * FROM credentials WHERE id = ?";
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $item = $stmt->fetchObject('Credentials'); // hier wird automatisiert, dass objektrelationale Mapping wird
        Database::disconnect();
        return $item !== false ? $item : null;
    }

    public static function getAll()
    {
        $sql = "SELECT * FROM credentials ORDER BY name ASC, domain ASC";
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_CLASS, 'Credentials'); // hier wird automatisiert, dass objektrelationale Mapping wird + Verwendung einer Hilfsmethode von PDO
        Database::disconnect();
        return $items !== false ? $items : null;
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM credentials WHERE id = ?";
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        Database::disconnect();
    }
}