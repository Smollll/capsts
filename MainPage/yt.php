<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="toggle-container">
        <button class="theme-btn light" onclick="setTheme('light')" title="Light mode">
        <img src="https://assets.codepen.io/210284/sun.png" alt="sun">
        </button>
        <button class="theme-btn dark" onclick="setTheme('dark')" title="Dark mode">
        <img src="https://assets.codepen.io/210284/moon.png" alt="moon">
        </button>
    </div>

    <script>
        function setTheme(theme) {
        if (theme === 'light') {
            document.documentElement.setAttribute('data-theme', 'light');
        } else {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
        }
    </script>
</body>
</html>