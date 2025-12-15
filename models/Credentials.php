<?php

require_once 'DatabaseObject.php';

class Credentials implements DatabaseObject
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

    public function validate() {
        return $this->validateHelper('Name', 'name', $this->name, 32) &
               $this->validateHelper('Domäne', 'domain', $this->domain, 128) &
               $this->validateHelper('CMS-Benutzername', 'cms_username', $this->cms_username, 64) &
               $this->validateHelper('CMS-Passwort', 'cms_password', $this->cms_password, 64);
    }

    private function validateHelper($label, $key, $value, $maxLength) {
        if(strlen($value) == 0) {
            $this->errors[$key] = "$label darf nicht leer sein.";
            return false;
        } else if(strlen($value) > $maxLength) {
            $this->errors[$key] = "$label zu lang (max. $maxLength Zeichen)";
            return false;
        } else {
            return true;
        }
    }

    public function save() {
        if($this->validate()) {

            if($this->getId() != null && $this->getId() > 0) {
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

    /**
     * @param array $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }


    public function create()
    {

    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public static function get($id)
    {
        // TODO: Implement get() method.
    }

    public static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }
}