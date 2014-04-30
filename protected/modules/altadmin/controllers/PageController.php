<?php

class PageController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';

    public function init() {
        $this->registerAssets();
        parent::init();
    }

    private function registerAssets() {

        Yii::app()->clientScript->registerCoreScript('jquery');
        $this->registerJs('webroot.themes.altadmin.js.jstree', '/jquery.jstree.js');
        $this->registerJs('webroot.themes.altadmin.js.jstree', '/_lib/jquery.cookie.js');
        $this->registerJs('webroot.themes.altadmin.js.jstree', '/_lib/jquery.hotkeys.js');
        $this->registerCssAndJs('webroot.themes.altadmin.js.fancybox', '/jquery.fancybox-1.3.4.js', '/jquery.fancybox-1.3.4.css');
        $this->registerCssAndJs('webroot.themes.altadmin.js.jqui1812', '/js/jquery-ui-1.8.12.custom.min.js', '/css/dark-hive/jquery-ui-1.8.12.custom.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/json2/json2.js');
        //Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/client_val_form.css', 'screen');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //$this->layout='//layouts/test';
        //var_dump($_COOKIE['jstree_open']); die;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Страницы';
        //$this->pageAddHeader = 'Дерево страниц';
        //create an array open_nodes with the ids of the nodes that we want to be initially open
        //when the tree is loaded.Modify this to suit your needs.Here,we open all nodes on load.
        $categories = Page::model()->findAll(array('order' => 'lft'));
        $identifiers = array();
        foreach ($categories as $n => $category) {
            $identifiers[] = "'" . 'node_' . $category->id . "'";
        }

        //echo $_COOKIE['jstree_open'];
        //echo implode(',', $identifiers); die;
        $tmp = '';
        $oN = explode(',', str_replace('#', '', $_COOKIE['jstree_open']));
        foreach ($oN as $value) {
            $tmp .='\'' . $value . '\',';
        }
        //var_dump($tmp); die;
        //var_dump(implode(',', $oN)); die;
        //$open_nodes = '"'.$tmp.'"';//implode(',', $oN);
        $open_nodes = implode(',', $identifiers);

        $baseUrl = Yii::app()->baseUrl;

        $dataProvider = new CActiveDataProvider('Page');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'baseUrl' => $baseUrl,
            'open_nodes' => $open_nodes
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionFetchTree() {
        Page::printULTree();
    }

    public function actionRename() {

        $new_name = $_POST['new_name'];
        $id = $_POST['id'];
        $renamed_cat = $this->loadModel($id);
        $renamed_cat->menuName = $new_name;
        if ($renamed_cat->saveNode()) {
            echo json_encode(array('success' => true));
            exit;
        } else {
            echo json_encode(array('success' => false));
            exit;
        }
    }

    /**
     * Удаление страницы
     * 
     * @param int $id - id страницы
     */
    public function actionRemove($id) {
        //$id = $_POST['id'];
        $deleted = $this->loadModel($id);
        if ($deleted->system == 1) {
            echo json_encode(array('success' => false, 'message' => 'Нельзя удалить системный раздел', 'system' => $deleted->system));
            exit;
        }
        if ($deleted->deleteNode()) {
            echo json_encode(array('success' => true));
            exit;
        } else {
            echo json_encode(array('success' => false));
            exit;
        }
    }

    public function actionReturnForm() {
        $this->actionTCreate($_POST['parent_id'], $_POST['name']);
        exit;
        //don't reload these scripts or they will mess up the page
        //yiiactiveform.js still needs to be loaded that's why we don't use
        // Yii::app()->clientScript->scriptMap['*.js'] = false;
        $cs = Yii::app()->clientScript;
        $cs->scriptMap = array(
            'jquery.min.js' => false,
            'jquery.js' => false,
            'jquery.fancybox-1.3.4.js' => false,
            'jquery.jstree.js' => false,
            'jquery-ui-1.8.12.custom.min.js' => false,
            'json2.js' => false,
        );


        //Figure out if we are updating a Model or creating a new one.
        if (isset($_POST['update_id']))
            $model = $this->loadModel($_POST['update_id']);
        else
            $model = new Page;


        $this->renderPartial('_form', array('model' => $model,
            'parent_id' => !empty($_POST['parent_id']) ? $_POST['parent_id'] : ''
                ), false, true);
        /*
          //don't reload these scripts or they will mess up the page
          //yiiactiveform.js still needs to be loaded that's why we don't use
          // Yii::app()->clientScript->scriptMap['*.js'] = false;
          $cs = Yii::app()->clientScript;
          $cs->scriptMap = array(
          'jquery.min.js' => false,
          'jquery.js' => false,
          'jquery.fancybox-1.3.4.js' => false,
          'jquery.jstree.js' => false,
          'jquery-ui-1.8.12.custom.min.js' => false,
          'json2.js' => false,
          );


          //Figure out if we are updating a Model or creating a new one.
          if (isset($_POST['update_id']))
          $model = $this->loadModel($_POST['update_id']);
          else
          $model = new Page;


          $this->renderPartial('_form', array('model' => $model,
          'parent_id' => !empty($_POST['parent_id']) ? $_POST['parent_id'] : ''
          ), false, true); */
    }

    public function actionReturnView() {

        //don't reload these scripts or they will mess up the page
        //yiiactiveform.js still needs to be loaded that's why we don't use
        // Yii::app()->clientScript->scriptMap['*.js'] = false;
        $cs = Yii::app()->clientScript;
        $cs->scriptMap = array(
            'jquery.min.js' => false,
            'jquery.js' => false,
            'jquery.fancybox-1.3.4.js' => false,
            'jquery.jstree.js' => false,
            'jquery-ui-1.8.12.custom.min.js' => false,
            'json2.js' => false,
        );

        $model = $this->loadModel($_POST['id']);

        $this->renderPartial('view', array(
            'model' => $model,
                ), false, true);
    }

    public function actionCreateRoot() {

        if (isset($_POST['Page'])) {

            $new_root = new Page;
            $new_root->attributes = $_POST['Page'];
            if ($new_root->saveNode(false)) {
                echo json_encode(array('success' => true,
                    'id' => $new_root->primaryKey)
                );
                exit;
            } else {
                echo json_encode(array('success' => false,
                    'message' => 'Error.Root Categorydemo was not created.'
                        )
                );
                exit;
            }
        }
    }

    public function actionCreate() {

        if (isset($_POST['Page'])) {
            $model = new Page;
            //set the submitted values
            $model->attributes = $_POST['Page'];
            $parent = $this->loadModel($_POST['parent_id']);
            $model->menuName = $_POST['name'];
            $model->header = $_POST['name'];
            $model->url = '123'; //Transliteration::ruToLat($_POST['name']);
            //return the JSON result to provide feedback.
            if ($model->appendTo($parent)) {
                echo json_encode(array('success' => true,
                    'id' => $model->primaryKey)
                );
                exit;
            } else {
                echo json_encode(array('success' => false,
                    'message' => 'Error.Categorydemo was not created.'
                        )
                );
                exit;
            }
        }
    }

    public function actionUpdate() {

        if (isset($_POST['Page'])) {

            $model = $this->loadModel($_POST['update_id']);
            $model->attributes = $_POST['Page'];

            if ($model->saveNode(false)) {
                echo json_encode(array('success' => true));
            }
            else
                echo json_encode(array('success' => false));
        }
    }

    public function actionMoveCopy() {

        $moved_node_id = $_POST['moved_node'];
        $new_parent_id = $_POST['new_parent'];
        $new_parent_root_id = $_POST['new_parent_root'];
        $previous_node_id = $_POST['previous_node'];
        $next_node_id = $_POST['next_node'];
        $copy = $_POST['copy'];

        //the following is additional info about the operation provided by
        // the jstree.It's there if you need it.See documentation for jstree.
        //  $old_parent_id=$_POST['old_parent'];
        //$pos=$_POST['pos'];
        //  $copied_node_id=$_POST['copied_node'];
        //  $replaced_node_id=$_POST['replaced_node'];
        //the  moved,copied  node
        $moved_node = $this->loadModel($moved_node_id);

        //if we are not moving as a new root...
        if ($new_parent_root_id != 'root') {
            //the new parent node
            $new_parent = $this->loadModel($new_parent_id);
            //the previous sibling node (after the move).
            if ($previous_node_id != 'false')
                $previous_node = $this->loadModel($previous_node_id);


//if we move
            if ($copy == 'false') {


                //if the moved node is only child of new parent node
                if ($previous_node_id == 'false' && $next_node_id == 'false') {

                    if ($moved_node->moveAsFirst($new_parent)) {
                        echo json_encode(array('success' => true));
                        exit;
                    }
                }

                //if we moved it in the first position
                else if ($previous_node_id == 'false' && $next_node_id != 'false') {

                    if ($moved_node->moveAsFirst($new_parent)) {
                        echo json_encode(array('success' => true));
                        exit;
                    }
                }
                //if we moved it in the last position
                else if ($previous_node_id != 'false' && $next_node_id == 'false') {

                    if ($moved_node->moveAsLast($new_parent)) {
                        echo json_encode(array('success' => true));
                        exit;
                    }
                }
                //if the moved node is somewhere in the middle
                else if ($previous_node_id != 'false' && $next_node_id != 'false') {

                    if ($moved_node->moveAfter($previous_node)) {
                        echo json_encode(array('success' => true));
                        exit;
                    }
                }
            }//end of it's a move
            //else if it is a copy
            else {
                //create the copied Categorydemo model
                $copied_node = new Page;
                //copy the attributes (only safe attributes will be copied).
                $copied_node->attributes = $moved_node->attributes;
                //remove the primary key
                $copied_node->id = null;


                if ($copied_node->appendTo($new_parent)) {
                    echo json_encode(array('success' => true,
                        'id' => $copied_node->primaryKey
                            )
                    );
                    exit;
                }
            }
        }//if the new parent is not root end
//else,move it as a new Root
        else {
            //if moved/copied node is not Root
            if (!$moved_node->isRoot()) {

                if ($moved_node->moveAsRoot()) {
                    echo json_encode(array('success' => true));
                } else {
                    echo json_encode(array('success' => false));
                }
            }
            //else if moved/copied node is Root
            else {

                echo json_encode(array('success' => false, 'message' => 'Node is already a Root.Roots are ordered by id.'));
            }
        }
    }

//action moveCopy
//UTILITY FUNCTIONS
    public static function registerCssAndJs($folder, $jsfile, $cssfile) {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerScriptFile($publishedFolder . $jsfile, CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile($publishedFolder . $cssfile);
    }

    public static function registerCss($folder, $cssfile) {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerCssFile($publishedFolder . '/' . $cssfile);
        return $publishedFolder . '/' . $cssfile;
    }

    public static function registerJs($folder, $jsfile) {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerScriptFile($publishedFolder . '/' . $jsfile);
        return $publishedFolder . '/' . $jsfile;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categorydemo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Добавление страницы в дерево
     * 
     * @param int $pid - id родителя
     * @param string $name - краткое название, название и мета тайтл страницы
     */
    public function actionTCreate($pid, $name) {
        $model = new Page;
        $model->menuName = $name;
        $model->date = time();
        $model->header = $name;
        $model->metaTitle = $name;

        $model->url = $this->checkUrl(Transliteration::ruToLat($name));
        $parent = $this->loadModel($pid);
        if ($model->appendTo($parent)) {
            echo json_encode(array('success' => true,
                'id' => $model->primaryKey)
            );
            exit;
        } else {
            echo json_encode(array('success' => false,
                'message' => CHtml::errorSummary($model)
                    )
            );
            exit;
        }
        //}
    }

    /**
     * Редактирование новости
     * 
     * @param int $id - id новости
     * @return render edit
     */
    public function actionEdit($id) {
        $model = Page::model()->findByPk($id);
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование страницы';
        if (isset($_POST['Page']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['Page'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->date == 0) {
                $model->date = time();
            }
            $model->setScenario('edit');
            if ($model->validate('edit')) {
                $model->saveNode();
                Yii::app()->user->setFlash('success', 'Страница успешно отредактирована.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/page');
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('edit', array('model' => $model));
    }

    private function checkUrl($url, $id = 0) {
        $model = Page::model()->find(array('condition' => '`url`="' . $url . '"'));
        if ($model) {
            $url = $url . '-' . date('d-m-Y-H-i-s');
        }
        return $url;
    }

    private function uploadImg($id, $oldImg = null) {
        $folder = '/images/page/';
        Yii::import('application.extensions.upload.Upload');
        foreach ($_FILES['Page'] as $key => $value) {
            $file[$key] = $value['image'];
            //   echo $key. ' '.$value['Page'];
        }
        //$file = $_FILES['Page'];
        //var_dump($_FILES['Page']); die;
        Yii::app()->setComponents(array('imagemod' => array('class' => 'application.extensions.imagemodifier.CImageModifier')));
        Yii::app()->imagemod->setLanguage('ru_RU');
        $handle = Yii::app()->imagemod->load($file);
        if ($handle->uploaded) {
            $this->_deleteImg($id);
            $handle->file_safe_name = false;
            $handle->file_auto_rename = false;
            $handle->jpeg_quality = 100;
            $handle->image_resize = true;
            $handle->image_ratio = false;
            $handle->image_ratio_crop = true;
            $handle->file_name_body_pre = $id . '-';
            $img = $handle->file_dst_name;
            $handle->image_x = Yii::app()->params['altadmin']['imageSize']['pageListWidth'];
            $handle->image_y = Yii::app()->params['altadmin']['imageSize']['pageListHeight'];
            $handle->process(Yii::getPathOfAlias('webroot') . $folder);
            if ($handle->processed) {
                $img = $handle->file_dst_name;
                $handle->clean();
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> ' . $handle->error);
            }
        } else {
            $img = $oldImg;
        }
        return $img;
    }

    public function actionDeleteImg($id) {
        if ($this->_deleteImg($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1));
        }
    }

    private function _deleteImg($id) {
        $model = Page::model()->findByPk($id);
        $imgPath = Yii::getPathOfAlias('webroot') . '/images/page/' . $model->image;
        if (!empty($model->image) && file_exists($imgPath)) {
            unlink($imgPath);
        }
        $model->image = '';
        $model->imageAlt = '';
        $model->imageTitle = '';
        $model->saveNode();
        return true;
    }

    public function actionSettings() {
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Общие';
        $this->pageAddHeader = 'Общие настройки страниц';
        $model = PageSettings::model()->findAll(array('order' => 'position'));
        $this->render('settings', array('model' => $model));
    }

    public function actionSettingsEdit($id) {
        $model = PageSettings::model()->findByPk($id);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Редактирование настройки';

        $this->pageAddHeader = $model->name;
        if (isset($_POST['PageSettings']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['PageSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', '<strong>Успех!</strong> Поле успешно отредактировано.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/page/settings');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
            }
        }
        $this->render('settingsEdit', array('model' => $model));
    }

    public function actionEditField() {
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Редактируемые поля';
        $this->pageAddHeader = 'Список';
        $model = PageEditField::model()->findAll(array('order' => 'position'));
        $this->render('editField', array('model' => $model));
    }

    public function actionEditFieldEdit($id) {
        $model = PageEditField::model()->findByPk($id);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Редактируемые поля';

        $this->pageAddHeader = $model->name;
        if (isset($_POST['PageEditField']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['PageEditField'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', '<strong>Успех!</strong> Поле успешно отредактировано.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/page/editField');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
            }
        }
        $this->render('editFieldEdit', array('model' => $model));
    }

}