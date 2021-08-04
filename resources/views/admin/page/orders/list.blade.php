
<div class="table-content">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            @foreach($fieldList as $key => $value)
                <th scope="col" class="col-label">{{ $value["label"] }}</th>
            @endforeach
            <th scope="col" class="col-label">Action</th>
        </tr>
        </thead>
        <tbody class="tbody">
        @foreach($data as $record)
            @php
                $user = \App\User::where("id", @$record -> user_id) -> first();
            @endphp
            <tr>
                @foreach($fieldList as $key => $name)
                    @switch($name["type"])
                        @case("id")
                        <td scope="row">
                            <a href="{{ route("admin.order.viewOrderDetail", ["id" => $record -> id]) }}">#{{ $record -> {$name["name"]} }}</a>
                        </td>
                        @break
                        @case("otherModel")
                        <td scope="row">{{ @$user -> {$name["name"]} }}</td>
                        @break
                        @case("text")
                        <td>{{ $record -> {$name["name"]} }}</td>
                        @break
                        @case("status")
                        @if( $record -> {$name["name"]} == "Hoàn tất")
                            <td>
                                <label class="label label-success">{{ $record -> {$name["name"]} }}</label>
                            </td>
                        @elseif($record -> {$name["name"]} == "Đang xử lý")
                            <td>
                                <label class="label label-warning">{{ $record -> {$name["name"]} }}</label>
                            </td>
                        @else
                            <td>
                                <label class="label label-danger">{{ $record -> {$name["name"]} }}</label>
                            </td>
                        @endif
                        @break
                        @case("numberFormat")
                        <td>${{ number_format($record -> {$name["name"]}) }}</td>
                        @break
                        @case("dateFormat")
                        <td>{{ $record -> {$name["name"]} -> format('d/m/Y') }}</td>
                        @break
                    @endswitch
                @endforeach
                <td>
                    <div class="el-button-group">
                        <a style="outline: none" class="el-button el-button--danger el-button--mini delete-button"
                           data-url="{{ route("admin." . $controllerName . ".delete" , ["id" => $record['id']] ) }}">
                            <span><i class="fa fa-trash"></i></span>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
    .table-content{
        padding: 15px 0;
    }
    .col-label{
        text-transform: capitalize;
    }
    td{
        color: #333333;
        font-weight: 400;
    }
</style>
