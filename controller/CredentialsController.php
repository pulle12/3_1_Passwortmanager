<?php

require_once('Controller.php');
require_once('models/Credentials.php');

class CredentialsController extends Controller
{
    public function handleRequest($route)
    {
        $operation = sizeof($route) > 1 ? $route[1] : 'index';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        switch ($operation) {
            case 'index':
                $this->actionIndex();
                break;
            case 'view':
                $this->actionView($id);
                break;
            case 'update':
                $this->actionUpdate($id);
                break;
            case 'delete':
                $this->actionDelete($id);
                break;
            case 'create':
                $this->actionCreate();
                break;
            default:
                Controller::showError("Page not found", "Page for operation " . $operation . " was not found!", 404);
        }
    }

    private function actionIndex()
    {
        $model = Credentials::getAll();
    }

    private function actionView(mixed $id)
    {
    }

    private function actionUpdate(mixed $id)
    {
    }

    private function actionDelete(mixed $id)
    {
    }

    private function actionCreate()
    {
    }
}