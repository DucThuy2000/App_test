<h3 class="layout-title">Đơn hàng của tôi</h3>
<div class="user-layout-table">
    @if(count($order_details) <= 0)
        <div class="empty-order">
            <div class="empty-order-img"></div>
            <span>Chưa có đơn hàng</span>
        </div>
    @else
        <table class="my-course-table">
        <thead>
            <tr>
                <td class="col-center nowrap">STT</td>
                <td class="col-center nowrap">Mã</td>
                <td class="col-center nowrap">Thời gian</td>
                <td class="col-center nowrap">Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            @foreach($order_details as $count => $item)
                <tr>
                    <td class="col-center">{{ $count + 1 }}</td>
                    <td class="col-id col-center">
                        <a href="{{ route("user_profile.orderDetail", ['id' => $item -> id]) }}">#{{ $item -> id }}</a>
                    </td>
                    <td class="col-center nowrap">{{ date_format($item -> updated_at,"d/m/Y H:i:s") }}</td>
                    <td class="tags">
                        <div class="tag-group d-flex flex-wrap justify-content-center">
                            <span class="active tag-item">{{ $item -> status }}</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@include("enduser.components.pagination", ["pagination" => $order_details])

<style>
    .empty-order-img{
        background-position: 50%;
        background-size: contain;
        background-repeat: no-repeat;
        width: 100px;
        height: 100px;
        background-image: url({{ asset("picture/don-hang.png") }});
    }
</style>
