<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\Http\Controllers\AdminController;
use App\Helper\Functions;
use App\Blog as MainModel;
use Illuminate\Http\Request;

class BlogController extends AdminController
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
                ['label' => 'Picture', 'name' => 'picture', 'type' => 'file'],
                ['label' => 'Author', 'name' => 'author', 'type' => 'text'],
                ['label' => 'Title', 'name' => 'title', 'type' => 'text'],
                ['label' => 'Content', 'name' => 'content', 'type' => 'ckeditor'],
                ['label' => 'Description', 'name' => 'description', 'type' => 'textarea'],
                ['label' => 'Quote', 'name' => 'quote', 'type' => 'textarea'],
                ['label' => 'Category', 'name' => 'category_id', 'type' => 'select', 'modal' => BlogCategory::class],
                ['label' => 'Type', 'name' => 'type', 'type' => 'select', 'data-source' => [
                    'Bài viết mới' => 'new',
                    'Bài viết hot' => 'hot',
                ]],
                ['label' => 'Status', 'name' => 'status', 'type' => 'checkbox'],

            ]
        ],

        'seo_tab' => [
            'tab_label' => 'Meta (VI)',
            'items' => [
                ['label' => 'Slug', 'name' => 'slug', 'type' => 'slug'],
            ]
        ],
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
