@props(['id', 'name', 'placeholder' => '••••••••', 'ringColor' => 'blue'])

<div class="relative">
    <input
        type="password"
        id="{{ $id }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => "w-full border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-{$ringColor}-500"]) }}
    >
    <button
        type="button"
        onclick="togglePassword('{{ $id }}')"
        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-gray-600"
        tabindex="-1"
        aria-label="Tampilkan/sembunyikan password"
    >
        {{-- Icon mata (open) --}}
        <svg id="{{ $id }}-eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        {{-- Icon mata (closed/slash) --}}
        <svg id="{{ $id }}-eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.163-3.592M6.228 6.228A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.255 5.268M3 3l18 18" />
        </svg>
    </button>
</div>

@once
@push('scripts')
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    const eyeOpen = document.getElementById(id + '-eye-open');
    const eyeClosed = document.getElementById(id + '-eye-closed');
    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    } else {
        input.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
    }
}
</script>
@endpush
@endonce
