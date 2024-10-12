<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
   rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css"
/>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<style>
    input[type="radio"].lapangan-radio {
      display: none;
    }

    /* Styles for selected image */
    .lapangan img {
      cursor: pointer;
      border-radius: 0.5rem;
      transition: border-color 0.3s ease;
    }

    input[type="radio"]:checked + img {
      border: 4px solid #4299e1; /* Blue border on selection */
    }
</style>
</head>
<body>
  <x-navbar></x-navbar>
  <main>

        {{ $slot }}
</main>
<x-footer></x-footer>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>