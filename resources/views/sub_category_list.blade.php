@foreach ($subcategories as $subcategory)
    <tr>
        <td><a href="">{{ $subcategory->exind_num_name }} {{ $subcategory->exind_name }}</a></td>
        <td align='center'>{{ $subcategory->value_type }} {{ $subcategory->num2562 }}</td>
        <td align='center'>{{ $subcategory->value_type }} {{ $subcategory->num2563 }}</td>
        <td align='center'>{{ $subcategory->value_type }} {{ $subcategory->num2564 }}</td>
        <td align='center'></td>

        @if (count($subcategory->subcategory))
            @include('sub_category_list',['subcategories' => $subcategory->subcategory])
        @endif
    </tr>
@endforeach
