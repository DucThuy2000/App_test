<div class="el-button-group">
    <a href="{{ route("admin." .$controllerName. ".edit", ["id" => $record['id']]) }}" class="el-button el-button--default el-button--mini">
        <span><i class="fas fa-pencil-alt"></i></span>
    </a>
    <a style="outline: none" class="el-button el-button--danger el-button--mini delete-button"
        data-url="{{ route("admin." . $controllerName . ".delete" , ["id" => $record['id']] ) }}">
        <span><i class="fa fa-trash"></i></span>
    </a>
</div>

