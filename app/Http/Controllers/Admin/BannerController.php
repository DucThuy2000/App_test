<?php

namespace App\Http\Controllers\Admin;

use App\Banner as MainModel;
use App\Helper\Functions;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class BannerController extends AdminController
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
                ['label' => 'Sale', 'name' => 'sale', 'type' => 'text'],
                ['label' => 'Description', 'name' => 'description', 'type' => 'text'],
                ['label' => 'Price Base', 'name' => 'price_base', 'type' => 'text'],
                ['label' => 'Picture', 'name' => 'picture', 'type' => 'file'],
                ['label' => 'Type', 'name' => 'type', 'type' => 'select', 'data-source' => [
                    'Banner' => 0,
                    'Slider' => 1
                ]],
                ['label' => 'Vị trí hiển thị', 'name' => 'location', 'type' => 'select', 'data-source' =>[
                    'Trang chủ' => 'trang chủ',
                    'Trang chủ - dưới slidebar' => 'trang chủ - dưới slidebar',
                ]],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox'],
            ]
        ],

        'seo_tab' => [
            'tab_label' => 'Meta',
            'items' => [
                ['label' => 'Slug', 'name' => 'slug', 'type' => 'slug']
            ]
        ]
    ];

    protected $removeRedundant = ["_token", "tag_id"];

    protected $fieldList = [
        ['label' => 'iD', 'name' => 'id', 'type' => 'id'],
        ['label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['label' => 'Picture', 'name' => 'picture', 'type' => 'picture'],
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
