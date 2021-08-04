<?php

namespace App\Http\Controllers\Admin;

use App\Widget as MainModel;
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class WidgetController extends AdminController
{
    protected $pathView = "admin.core.";

    protected $resize = [
        'thumbnail' => ['width' => 800],
        'standard' => ['width' => 100],
    ];

    protected $fieldForm = [
        'general_tab' => [
            'tab_label' => 'General (VI)',
            'items' => [
                ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
                ['label' => 'Content', 'name' => 'content', 'type' => 'ckeditor'],
                ['label' => 'Vị trí hiển thị', 'name' => 'location', 'type' => 'select', 'data-source' =>[
                    'brand' => 'brand',
                    'footer 1' => 'footer 1',
                    'footer 2' => 'footer 2',
                    'footer 3' => 'footer 3',
                ]],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox'],
            ]
        ],

    ];

    protected $removeRedundant = ["_token", "tag_id"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Location', 'name' => 'location', 'type' => 'text'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
        ['label' => 'Created At', 'name' => 'created_at', 'type' => 'dateFormat'],
        ['label' => 'Updated At', 'name' => 'updated_at', 'type' => 'dateFormat']
    ];

    public function __construct(){
        //Get name of Controller
        $getControllerName = (new \ReflectionClass($this))->getShortName();
        $shortController = Functions::getModelName($getControllerName);
        $this -> folderUpload = $shortController;
        $this -> controllerName = $shortController;
        view()->share("shortController", $shortController);
        view()->share("folderUpload", $this -> folderUpload);
        view()->share("controllerName",$this -> controllerName);
        view()->share("fieldForm", $this -> fieldForm);
        view()->share("fieldList", $this -> fieldList);
        $this -> model = new MainModel();
    }
}
