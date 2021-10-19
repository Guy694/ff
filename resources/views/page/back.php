@foreach ($data as $key => $ind)

<tr>
    <td><a href="{{ route('exp.create', $ind->ind_id) }}">{{ $ind->ind_name }}</a>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td align='center'>
        <form action="{{ route('page.destroy', $ind->ind_id) }}" method="post">
            <a href="{{ route('page.edit', $ind->ind_id) }}" class="btn btn-primary ">แก้ไข</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ลบ</button>
        </form>
    </td>
</tr>

@foreach ($relat as $ind => $exind)
<tr>
    <td><a href="">{{ $exind->exind_num_name }} {{ $exind->exind_name }}</a></td>
    <td align='center'>{{ $exind->value_type }} {{ $exind->num2562 }}</td>
    <td align='center'>{{ $exind->value_type }} {{ $exind->num2563 }}</td>
    <td align='center'>{{ $exind->value_type }} {{ $exind->num2564 }}</td>
    <td align='center'>
        <form action="{{ route('exp.destroy', $exind->exind_id) }}" method="post">
            <a href="{{ route('exp.edit', $exind->exind_id) }}" class="btn btn-primary ">แก้ไข</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ลบ</button>
        </form>
    </td>
</tr>
@endforeach
@endforeach






@foreach ($relat as $row)

<tr>
    <td><a href="{{ route('exp.create', $row->ind_id) }}">{{ $row->ind_name }}</a></td>
    <td></td>
    <td></td>
    <td></td>
    <td align='center'>
        <form action="{{ route('page.destroy', $row->ind_id) }}" method="post">
            <a href="{{ route('page.edit', $row->ind_id) }}" class="btn btn-primary ">แก้ไข</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ลบ</button>
        </form>
    </td>
</tr>
@foreach ($subrelat as $sub)
@if ($row->ind_id == $sub->parent_id)
<tr>
    <td>{{ $sub->exind_name }}</td>
    <td align='center'>
        @if ($sub->num2562 != null)
        @if ($sub->value_type = 'คะแนน')
        {{ $sub->num2562 }} {{ $sub->value_type }}
        @else
        {{ $sub->value_type }} {{ $sub->num2562 }}
        @endif
        @else
        @endif
    </td>
    <td align='center'>
        @if ($sub->num2563 != null)
        @if ($sub->value_type = 'คะแนน')
        {{ $sub->num2563 }} {{ $sub->value_type }}
        @else
        {{ $sub->value_type }} {{ $sub->num2563 }}
        @endif
        @else
        @endif

    </td>
    <td align='center'>
        @if ($sub->target2564 != null)
        @if ($sub->value_type = 'คะแนน')
        {{ $sub->target2564 }} {{ $sub->value_type }}
        @else
        {{ $sub->value_type }} {{ $sub->target2564 }}
        @endif
        @else
        @endif
    </td>
    <td align='center'>
        <form action="{{ route('exp.destroy', $sub->exind_id) }}" method="post">
            <a href="{{ route('exp.edit', $sub->exind_id) }}" class="btn btn-primary ">แก้ไข</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ลบ</button>
        </form>
    </td>
</tr>
@endif
@endforeach
@endforeach