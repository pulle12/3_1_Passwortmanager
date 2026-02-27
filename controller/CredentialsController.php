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

    public function actionIndex()
    {
        $model = Credentials::getAll();
        $this->render('credentials/index', $model);
    }

    public function actionView(mixed $id)
    {
        $model = Credentials::get($id);
        if($model == null) {
            Controller::showError("Page not  found", "Credentials with id $id was not found!", 404);
        } else {
            $this->render('credentials/view', $model);
        }
    }

    public function actionUpdate(mixed $id)
    {
        $model = Credentials::get($id);

        if($model == null) {
            Controller::showError("Page not  found", "Credentials with id $id was not found!", 404);
        } else {
            if(!empty($_POST)) {
                $model->setName($this->getDataOrNull('name'));
                $model->setDomain($this->getDataOrNull('domain'));
                $model->setCmsUsername($this->getDataOrNull('cms_username'));
                $model->setCmsPassword($this->getDataOrNull('cms_password'));

                if($model->save()) {
                    $this->redirect('credentials/index');
                    return;
                }
            }

            $this->render('credentials/update', $model);
        }
    }

    public function actionDelete(mixed $id)
    {
        $model = Credentials::get($id);

        if($model == null) {
            Controller::showError("Page not  found", "Credentials with id $id was not found!", 404);
        } else {
            if(!empty($_POST)) {
                Credentials::delete($id);
                $this->redirect('credentials/index');
                return;
            }

            $this->render('credentials/delete', $model);
        }
    }

    public function actionCreate()
    {
        $model = new Credentials();

        if(!empty($_POST)) {
            $model->setName($this->getDataOrNull('name'));
            $model->setDomain($this->getDataOrNull('domain'));
            $model->setCmsUsername($this->getDataOrNull('cms_username'));
            $model->setCmsPassword($this->getDataOrNull('cms_password'));

            if($model->save()) {
                $this->redirect('credentials/index');
                return;
            }
        }

        $this->render('credentials/create', $model);
    }
}