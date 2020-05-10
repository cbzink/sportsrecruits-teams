<!DOCTYPE html>
<html>
    <head>
        <title>SportsRecruits - Coding Challenge</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            <div class="py-10">
                <header>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <img src="img/sr-logo.svg" />
                    </div>
                </header>
                <main>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        @each('partials.team', $teams, 'team')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>