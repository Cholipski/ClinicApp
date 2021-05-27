<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Przychodnia Kortowo')
                <img src="{{URL::asset('images/logo.png')}}" class="logo" alt="Przychodnia Kortowo logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
