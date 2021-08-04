<ul class="breadcrumb-list">
    <li class="breadcrumb-item"><a href="{{ route("page.index") }}">Home</a></li>
    <li class="breadcrumb-item @if(empty($childCurrentPage)) active @endif">{{ $currentPage }}</li>
    @if(isset($childCurrentPage))
        <li class="breadcrumb-item active">{{ $childCurrentPage }}</li>
    @endif
</ul>
