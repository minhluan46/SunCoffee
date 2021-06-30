@if (isset($LoaiSanPham))
    @foreach ($LoaiSanPham as $value)
        <tr id="{{ $value->id }}">
            <td style="text-align: left">{{ $value->id }}</td>
            <td>{{ $value->tenloaisanpham }}</td>
            <td>
                <span class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                    {{ $value->trangthai == 1 ? 'Hoạt Động' : 'Tạm Dừng' }}</span>
            </td>
            <td>
                <a href="javascript:(0)" class="action_btn mr_10 view-edit"
                    data-url="{{ route('loai-san-pham.edit', $value->id) }}">
                    <i class="fas fa-edit"></i></a>

                <a href="javascript:(0)" class="action_btn mr_10 form-delete"
                    data-url="{{ route('loai-san-pham.destroy', $value->id) }}" data-id="{{ $value->id }}">
                    <i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
@endif
