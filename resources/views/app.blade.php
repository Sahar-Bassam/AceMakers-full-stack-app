<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          brandGreen: {
            DEFAULT: '#8caa13',
            hover: '#647d00',
          }
        }
      }
    }
  }
</script>
    @vite('resources/js/app.js')
    @inertiaHead
    @routes
</head>
<body>
    @inertia
</body>
</html>