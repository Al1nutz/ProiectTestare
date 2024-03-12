<div class="btn-group">
    <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
{{--                {{ $locale_name }}--}}
                <img src="{{ asset('flags/'.$available_locale.'.png') }}" alt="{{ $locale_name }}" class="me-2" width="20" height="auto">
            @endif
        @endforeach
    </button>
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
        @foreach($available_locales as $locale_name => $available_locale)
            <li>
                @if($available_locale !== $current_locale)
                    <a class="dropdown-item" href="/language/{{ $available_locale }}">
                        <img src="{{ asset('flags/'.$available_locale.'.png') }}" alt="{{ $locale_name }}" class="me-2" width="20" height="auto">
                        {{ $locale_name }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>
