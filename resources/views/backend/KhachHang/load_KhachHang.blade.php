@if (isset($KhachHang))
    @foreach ($KhachHang as $value)
        <tr id="{{ $value->id }}">
            <td style="text-align: left">{{ $value->id }}</td>
            <td>{{ $value->tenkhachhang }}</td>
            <td>{{ $value->sdt }}</td>
            <td style="text-align: left">{{ $value->diachi }}</td>
            <td>{{ number_format($value->diemtichluy, 0, ',', '.') }}</td>
            <td>
                <span class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                    {{ $value->trangthai == 1 ? 'Được Dùng' : 'Đã Khoá' }}</span>
            </td>
            <td>
                <div class="d-flex">
                    <a href="javascript:(0)" class="action_btn mr_10 view-edit"
                        data-url="{{ route('khach-hang.edit', $value->id) }}">
                        <i class="fas fa-edit"></i></a>

                    <a href="javascript:(0)" class="action_btn mr_10 form-delete"
                        data-url="{{ route('khach-hang.destroy', $value->id) }}" data-id="{{ $value->id }}">
                        <i class="fas fa-trash-alt"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
@endif
