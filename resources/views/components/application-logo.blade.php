@props([
    'cropped' => false,
])

<div {{ $attributes->merge(['class' => 'flex justify-center items-center py-4']) }}>
    @if($cropped)
        <img id="logo" alt="Logo" class="w-16 h-16 rounded-full border-2">
    @else
        <img id="logo" alt="Logo" class="w-16 h-16">
    @endif
    <script>

        const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        const logoImage = document.getElementById('logo');

        function updateLogoFromSystem(e) {
            const isDarkMode = e.matches;
            const cropped = "{{$cropped ? "cropped_" : ""}}";
            if (isDarkMode) {
                logoImage.src = 'dark_' + cropped + 'logo.png'; // Set the dark theme logo
            } else {
                logoImage.src = 'light_' + cropped + 'logo.png'; // Set the light theme logo
            }
        }

        darkModeMediaQuery.addListener(updateLogoFromSystem);
        updateLogoFromSystem(darkModeMediaQuery);
    </script>
</div>