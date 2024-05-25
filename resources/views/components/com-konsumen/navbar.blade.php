<header class="navbars-header">
    <aside class="aside-left">
        <span class="brand">SIAMPLANG</span>
        <button class="header-btn-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </aside>
    <aside class="header-center">
        <ul class="header-menus">
            <li>
                <a href="{{ url('/konsumen/dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/konsumen/produk') }}">
                    <i class="bi bi-terminal-plus"></i>
                    <span>Produk Kami</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/konsumen/tentang') }}">
                    <i class="bi bi-info-circle"></i>
                    <span>Tentang Kami</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/konsumen/transaksi') }}">
                    <i class="bi bi-house"></i>
                    <span>Transaksi Saya</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/konsumen/keranjang') }}" class="font-medium text-white/[.8] hover:text-white sm:py-6 relative px-3" href="#">
                    <i class="bi bi-cart4 text-xl"></i>
                    <livewire:konsumen.live-notif />
                </a>
            </li>
        </ul>
        <ul class="header-menus">
            <li class="divider"></li>
            <li>
                <a href="{{ url('/konsumen/akun') }}">
                    <i class="bi bi-person-gear"></i>
                    {{ Auth::user()->nama }}
                </a>
            </li>
        </ul>
    </aside>
</header>
