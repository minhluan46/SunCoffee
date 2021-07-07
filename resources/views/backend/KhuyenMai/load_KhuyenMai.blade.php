@if (isset($KhuyenMai))
    @foreach ($KhuyenMai as $value)
        <tr id="{{ $value->id }}">
            <td style="text-align: left">{{ $value->id }}</td>
            <td>{{ $value->tenkhuyenmai }}</td>
            <td>{{ $value->thoigianbatdau }}</td>
            <td>{{ $value->thoigianketthuc }}</td>
            <td>{{ $value->muckhuyenmaitoida }}%</td>
            <td>
                <span class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                    {{ $value->trangthai == 1 ? 'Mở' : 'Khóa' }}</span>
            </td>
            <td>
                @isset($today)
                    @if ($value->thoigianketthuc < $today)
                        <span class="badge rounded-pill bg-danger">Kết Thúc</span>
                    @elseif ($value->trangthai == 0 && $value->thoigianketthuc >= $today)
                        <span class="badge rounded-pill bg-warning">Đã Khóa</span>
                    @elseif ($value->thoigianbatdau > $today )
                        <span class="badge rounded-pill bg-info">Sắp Đến</span>
                    @else
                        <span class="badge rounded-pill bg-primary">Đang Áp Dụng</span>
                    @endif
                @endisset
            </td>
            <td>
                <a href="javascript:(0)" class="action_btn mr_10 view-add"
                    data-url="{{ route('chi-tiet-khuyen-mai.create', $value->id) }}" data-id="{{ $value->id }}">
                    <i class="fas fa-plus-square"></i></a>

                <a href="javascript:(0)" class="action_btn mr_10 view-show"
                    data-url="{{ route('khuyen-mai.show', $value->id) }}" data-id="{{ $value->id }}">
                    <i class="fas fa-eye"></i></a>

                <a href="javascript:(0)" class="action_btn mr_10 view-edit"
                    data-url="{{ route('khuyen-mai.edit', $value->id) }}" data-id="{{ $value->id }}">
                    <i class="fas fa-edit"></i></a>

                <a href="javascript:(0)" class="action_btn mr_10 form-delete"
                    data-url="{{ route('khuyen-mai.destroy', $value->id) }}" data-id="{{ $value->id }}">
                    <i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
@endif
