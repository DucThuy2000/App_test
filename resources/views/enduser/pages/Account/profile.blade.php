<h3 class="layout-title">Thông tin cá nhân</h3>
<form class="authen-form update-profile"
      data-url="{{ route("user_profile.updateProfile", ["id" => \Illuminate\Support\Facades\Auth::user() -> id]) }}">
    <div class="form-group half">
        <div class="form-item">
            <label for="">Họ và tên</label>
            <input type="text" name="user_name" value="{{ @$user_profile -> user_name }}" id="user_name">
        </div>
        <div class="form-item">
            <label for="">Ngày sinh</label>
            <input type="text" id="timePicker" value="{{ @$user_profile -> date }}" name="date">
        </div>
    </div>
    <div class="form-group half">
        <div class="form-item">
            <label for="">Số điện thoại</label>
            <input type="text" id="user_phone" value="{{ @$user_profile -> phone }}" name="phone" placeholder="Số điện thoại">
        </div>
        <div class="form-item">
            <label for="">Email</label>
            <input type="email" value="{{ @$user_profile -> email }}" name="email" disabled>
        </div>
    </div>
    <div class="form-group half">
        <div class="form-item"></div>
        <div class="form-item button-action align-items-center">
            <button type="submit" class="btn">Cập nhật</button>
        </div>
    </div>
</form>

<h3 class="layout-title">Thay đổi mật khẩu</h3>
<form action="" method="POST" class="authen-form">
    @csrf
    <div class="form-group half">
        <div class="form-item">
            <label for="">Mật khẩu cũ</label>
            <input type="password" placeholder="Mật khẩu cũ" name="old_password">
        </div>
        <div class="form-item">
            <label for="">Mật khẩu mới</label>
            <input type="password" placeholder="Mật khẩu mới" name="password">
        </div>
    </div>

    <div class="form-group half">
        <div class="form-item">
            <label for="">Xác nhận mật khẩu</label>
            <input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmed">
        </div>
        <div class="form-item button-action align-items-center">
            <button type="submit" class="btn">Thay đổi mật khẩu</button>
        </div>
    </div>
</form>

<h3 class="layout-title">Địa chỉ</h3>

<div class="user-address">
    <h4 class="address-name">Địa chỉ đặt đơn gần nhất của bạn</h4>
    @if(empty($user_address))
        <span>Hệ thống cho thấy bạn chưa từng đặt hàng bên shop</span>
    @else
        <div class="d-fle align-items-center address-col mb-2">
            <i class="icon-direction mr-1"></i>
            <span>{{ $user_address -> home_address }} - {{ $user_address -> ward }} - {{ $user_address -> district }} - {{ $user_address -> province }}</span>
        </div>

        <div class="d-fle align-items-center address-col">
            <i class="icon-phone mr-1"></i>
            <span>{{ $user_address -> phone }}</span>
        </div>
    @endif
</div>
