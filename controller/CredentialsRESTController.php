<?php

require_once('RESTController.php');
require_once('models/Credentials.php');
class CredentialsRESTController extends RESTController
{

    public function handleRequest()
    {
        switch($this->method) {
            case 'GET':
                $this->handleGETRequest();
                break;
            case 'POST':
                $this->handlePOSTRequest();
                break;
            case 'PUT':
                $this->handlePUTRequest();
                break;
            case 'DELETE':
                $this->handleDELETERequest();
                break;
            default:
                $this->response('Method Not Allowed', 405);
                break;

        }
    }

    public function handleGETRequest()
    {
        if($this->verb == null && sizeof($this->args) == 0) {
            $model = Credentials::getAll();
            $this->response($model);
        }
    }
}