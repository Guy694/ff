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