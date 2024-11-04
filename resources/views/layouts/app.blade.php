<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reach</title>

        <!-- Fonts -->

        <!-- Styles / Scripts -->
        @vite('resources/css/app.css')
        @fluxStyles
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        


    <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Reach" class="max-lg:hidden dark:hidden" />
        <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Reach" class="max-lg:!hidden hidden dark:flex" />

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
            <flux:navbar.item icon="inbox" badge="12" href="#">Project List</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="/resources">Resources</flux:navbar.item>
            <flux:navbar.item icon="calendar" href="/allocations">Allocations</flux:navbar.item>

            <flux:separator vertical variant="subtle" class="my-2"/>

            <flux:dropdown class="max-lg:hidden">
                <flux:navbar.item icon-trailing="chevron-down">Admin</flux:navbar.item>

                <flux:navmenu>
                    <flux:navmenu.item href="/projects">Projects</flux:navmenu.item>
                    <flux:navmenu.item href="/resources">Resources</flux:navmenu.item>
                    <flux:navmenu.item href="/users">Users</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>
        </flux:navbar>

        <flux:spacer />

        <flux:navbar class="mr-4">
            <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
            <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
            <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
        </flux:navbar>

        <flux:dropdown position="top" align="start">
            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>


                    <main class="mt-6">
                        @if(isset($slot)){{$slot}}@endif
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Reach: Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
