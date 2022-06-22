<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Atlub_Ealaa_Rahatik')
                <img src="https://i.imgur.com/3PUoNql.png" class="logo mt-3" alt="branding logo">
                <h4 for="">{{ __('admins.brand') }}</h4>
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
