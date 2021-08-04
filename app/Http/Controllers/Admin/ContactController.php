<?php

namespace App\Http\Controllers\Admin;

use App\Contact as MainModel; //Alias (bí danh) 'use' để gọi đến namespace App\Bank với bí danh là MainModel
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class ContactController extends AdminController
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
                ['label' => 'Content', 'name' => 'content', 'type' => 'text'],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox'],
            ]
        ],
    ];

    protected $removeRedundant = ["_token", "tag_id"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Content', 'name' => 'content', 'type' => 'text'],
        ['label' => 'Status', 'name' => 'status', 'type' => 'status'],
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
