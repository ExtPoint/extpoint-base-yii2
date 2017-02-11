<?php
namespace extpoint\yii2\base;

use yii\web\Controller as BaseController;
use yii\web\ErrorAction;
use yii\web\HttpException;

class Controller extends BaseController {

    public function beforeAction($action) {
        if (!$this->checkUrlEndedOnSlash()) {
            return false;
        }

        return parent::beforeAction($action);
    }

    protected function checkUrlEndedOnSlash() {

        if (!($this->action instanceof ErrorAction)) {
            $request = \Yii::$app->request;
            $url = str_replace('?' . $request->queryString, '', $request->url);

            if (!preg_match('/\/$/', $url)) {
                if (YII_DEBUG) {
                    throw new HttpException(400, 'This url must be ended on slash `/`, please fix url in link.');
                } else {
                    $this->redirect($url . '/' . ($request->queryString ? '?' . $request->queryString : ''));
                    return false;
                }
            }
        }

        return true;
    }

}
