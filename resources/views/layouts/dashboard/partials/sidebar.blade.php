<aside id="sidebar" class="hidden invisible lg:visible lg:block top-0 left-0 z-10 fixed lg:sticky bg-black/80 lg:bg-transparent w-dvw lg:w-64 h-dvh lg:pointer-events-auto"
    x-data="{
        breakpoint: 1024,
        isSidebarOpen: false,
        isMobile: window.innerWidth < 1024,
    }"
    x-init="$watch('isSidebarOpen', isSidebarOpen => $dispatch('sidebar-expanded', { id: 'sidebar', isSidebarOpen }))"
    x-trap.noautofocus.noscroll="isSidebarOpen && isMobile"
    x-on:resize.window="
        isMobile = window.innerWidth < breakpoint;
        if (window.innerWidth >= breakpoint) {
            isSidebarOpen = false;
        }
    "
    x-on:click.self="isMobile && (isSidebarOpen = false)"
    x-on:keydown.escape.window="isMobile && (isSidebarOpen = false)"
    x-on:open-sidebar.window="$event.detail.id === 'sidebar' ? isSidebarOpen = true : null"
    x-on:close-sidebar.window="$event.detail.id === 'sidebar' ? isSidebarOpen = false : null"
    :class="{ 'hidden invisible pointer-events-none' : !isSidebarOpen }"
    :inert="!isSidebarOpen && isMobile"
>
    @include('layouts.dashboard.partials.sidebar-drawer')
</aside>

