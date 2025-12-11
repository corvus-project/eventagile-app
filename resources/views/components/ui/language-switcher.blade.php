<select class="select " onchange="location = this.value">
    @foreach(config('locales.supported') as $loc)
    <option value="{{ route('locale.switch', $loc) }}" {{ app()->getLocale() === $loc ? 'selected' : '' }}>
        {{ strtoupper($loc) }}
    </option>
    @endforeach
</select>