<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('master_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/items*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/gudangs*") ? "menu-open" : "" }} {{ request()->is("admin/kas-banks*") ? "menu-open" : "" }} {{ request()->is("admin/pabriks*") ? "menu-open" : "" }} {{ request()->is("admin/departements*") ? "menu-open" : "" }} {{ request()->is("admin/proyeks*") ? "menu-open" : "" }} {{ request()->is("admin/kota*") ? "menu-open" : "" }} {{ request()->is("admin/cabangs*") ? "menu-open" : "" }} {{ request()->is("admin/mata-uangs*") ? "menu-open" : "" }} {{ request()->is("admin/pajaks*") ? "menu-open" : "" }} {{ request()->is("admin/pegawais*") ? "menu-open" : "" }} {{ request()->is("admin/sales*") ? "menu-open" : "" }} {{ request()->is("admin/penagihs*") ? "menu-open" : "" }} {{ request()->is("admin/level-hargas*") ? "menu-open" : "" }} {{ request()->is("admin/terminal-kasirs*") ? "menu-open" : "" }} {{ request()->is("admin/mesin-edcs*") ? "menu-open" : "" }} {{ request()->is("admin/tipe-kartu-kredits*") ? "menu-open" : "" }} {{ request()->is("admin/channels*") ? "menu-open" : "" }} {{ request()->is("admin/satuans*") ? "menu-open" : "" }} {{ request()->is("admin/mitra-bisnis*") ? "menu-open" : "" }} {{ request()->is("admin/alamat-mitra-bisnis*") ? "menu-open" : "" }} {{ request()->is("admin/kontak-mitra-bisnis*") ? "menu-open" : "" }} {{ request()->is("admin/hutang-piutang-mitra-bisnis*") ? "menu-open" : "" }} {{ request()->is("admin/supplier-items*") ? "menu-open" : "" }} {{ request()->is("admin/stok-items*") ? "menu-open" : "" }} {{ request()->is("admin/pajak-items*") ? "menu-open" : "" }} {{ request()->is("admin/harga-jual-items*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/items*") ? "active" : "" }} {{ request()->is("admin/*") ? "active" : "" }} {{ request()->is("admin/*") ? "active" : "" }} {{ request()->is("admin/gudangs*") ? "active" : "" }} {{ request()->is("admin/kas-banks*") ? "active" : "" }} {{ request()->is("admin/pabriks*") ? "active" : "" }} {{ request()->is("admin/departements*") ? "active" : "" }} {{ request()->is("admin/proyeks*") ? "active" : "" }} {{ request()->is("admin/kota*") ? "active" : "" }} {{ request()->is("admin/cabangs*") ? "active" : "" }} {{ request()->is("admin/mata-uangs*") ? "active" : "" }} {{ request()->is("admin/pajaks*") ? "active" : "" }} {{ request()->is("admin/pegawais*") ? "active" : "" }} {{ request()->is("admin/sales*") ? "active" : "" }} {{ request()->is("admin/penagihs*") ? "active" : "" }} {{ request()->is("admin/level-hargas*") ? "active" : "" }} {{ request()->is("admin/terminal-kasirs*") ? "active" : "" }} {{ request()->is("admin/mesin-edcs*") ? "active" : "" }} {{ request()->is("admin/tipe-kartu-kredits*") ? "active" : "" }} {{ request()->is("admin/channels*") ? "active" : "" }} {{ request()->is("admin/satuans*") ? "active" : "" }} {{ request()->is("admin/mitra-bisnis*") ? "active" : "" }} {{ request()->is("admin/alamat-mitra-bisnis*") ? "active" : "" }} {{ request()->is("admin/kontak-mitra-bisnis*") ? "active" : "" }} {{ request()->is("admin/hutang-piutang-mitra-bisnis*") ? "active" : "" }} {{ request()->is("admin/supplier-items*") ? "active" : "" }} {{ request()->is("admin/stok-items*") ? "active" : "" }} {{ request()->is("admin/pajak-items*") ? "active" : "" }} {{ request()->is("admin/harga-jual-items*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-database">

                            </i>
                            <p>
                                {{ trans('cruds.master.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.items.index") }}" class="nav-link {{ request()->is("admin/items") || request()->is("admin/items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cube">

                                        </i>
                                        <p>
                                            {{ trans('cruds.item.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tipe_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/mark-items*") ? "menu-open" : "" }} {{ request()->is("admin/item-group-ones*") ? "menu-open" : "" }} {{ request()->is("admin/item-group-twos*") ? "menu-open" : "" }} {{ request()->is("admin/item-group-threes*") ? "menu-open" : "" }} {{ request()->is("admin/grup-mitra-bisnis-ones*") ? "menu-open" : "" }} {{ request()->is("admin/grup-mitra-bisnis-twos*") ? "menu-open" : "" }} {{ request()->is("admin/grup-mitra-bisnis-threes*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/mark-items*") ? "active" : "" }} {{ request()->is("admin/item-group-ones*") ? "active" : "" }} {{ request()->is("admin/item-group-twos*") ? "active" : "" }} {{ request()->is("admin/item-group-threes*") ? "active" : "" }} {{ request()->is("admin/grup-mitra-bisnis-ones*") ? "active" : "" }} {{ request()->is("admin/grup-mitra-bisnis-twos*") ? "active" : "" }} {{ request()->is("admin/grup-mitra-bisnis-threes*") ? "active" : "" }}" href="#">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tipe.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('mark_item_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.mark-items.index") }}" class="nav-link {{ request()->is("admin/mark-items") || request()->is("admin/mark-items/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-bookmark">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.markItem.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('item_group_one_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.item-group-ones.index") }}" class="nav-link {{ request()->is("admin/item-group-ones") || request()->is("admin/item-group-ones/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-box-open">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.itemGroupOne.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('item_group_two_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.item-group-twos.index") }}" class="nav-link {{ request()->is("admin/item-group-twos") || request()->is("admin/item-group-twos/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-box-open">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.itemGroupTwo.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('item_group_three_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.item-group-threes.index") }}" class="nav-link {{ request()->is("admin/item-group-threes") || request()->is("admin/item-group-threes/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-box-open">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.itemGroupThree.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('grup_mitra_bisnis_one_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.grup-mitra-bisnis-ones.index") }}" class="nav-link {{ request()->is("admin/grup-mitra-bisnis-ones") || request()->is("admin/grup-mitra-bisnis-ones/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-users">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.grupMitraBisnisOne.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('grup_mitra_bisnis_two_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.grup-mitra-bisnis-twos.index") }}" class="nav-link {{ request()->is("admin/grup-mitra-bisnis-twos") || request()->is("admin/grup-mitra-bisnis-twos/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-users">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.grupMitraBisnisTwo.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('grup_mitra_bisnis_three_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.grup-mitra-bisnis-threes.index") }}" class="nav-link {{ request()->is("admin/grup-mitra-bisnis-threes") || request()->is("admin/grup-mitra-bisnis-threes/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-users">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.grupMitraBisnisThree.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('rekuring_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/periode-rekurings*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/periode-rekurings*") ? "active" : "" }}" href="#">
                                        <i class="fa-fw nav-icon fas fa-sync">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rekuring.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('periode_rekuring_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.periode-rekurings.index") }}" class="nav-link {{ request()->is("admin/periode-rekurings") || request()->is("admin/periode-rekurings/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-calendar">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.periodeRekuring.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('gudang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.gudangs.index") }}" class="nav-link {{ request()->is("admin/gudangs") || request()->is("admin/gudangs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.gudang.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kas_bank_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kas-banks.index") }}" class="nav-link {{ request()->is("admin/kas-banks") || request()->is("admin/kas-banks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-university">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kasBank.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pabrik_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pabriks.index") }}" class="nav-link {{ request()->is("admin/pabriks") || request()->is("admin/pabriks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pabrik.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('departement_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departements.index") }}" class="nav-link {{ request()->is("admin/departements") || request()->is("admin/departements/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-hospital">

                                        </i>
                                        <p>
                                            {{ trans('cruds.departement.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('proyek_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.proyeks.index") }}" class="nav-link {{ request()->is("admin/proyeks") || request()->is("admin/proyeks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-gavel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.proyek.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kotum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kota.index") }}" class="nav-link {{ request()->is("admin/kota") || request()->is("admin/kota/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kotum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cabang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cabangs.index") }}" class="nav-link {{ request()->is("admin/cabangs") || request()->is("admin/cabangs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-flag-checkered">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cabang.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mata_uang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mata-uangs.index") }}" class="nav-link {{ request()->is("admin/mata-uangs") || request()->is("admin/mata-uangs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mataUang.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pajak_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pajaks.index") }}" class="nav-link {{ request()->is("admin/pajaks") || request()->is("admin/pajaks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pajak.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pegawai_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pegawais.index") }}" class="nav-link {{ request()->is("admin/pegawais") || request()->is("admin/pegawais/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-female">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pegawai.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sale_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sales.index") }}" class="nav-link {{ request()->is("admin/sales") || request()->is("admin/sales/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-male">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sale.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('penagih_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.penagihs.index") }}" class="nav-link {{ request()->is("admin/penagihs") || request()->is("admin/penagihs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-tag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.penagih.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('level_harga_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.level-hargas.index") }}" class="nav-link {{ request()->is("admin/level-hargas") || request()->is("admin/level-hargas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-level-up-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.levelHarga.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('terminal_kasir_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.terminal-kasirs.index") }}" class="nav-link {{ request()->is("admin/terminal-kasirs") || request()->is("admin/terminal-kasirs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-desktop">

                                        </i>
                                        <p>
                                            {{ trans('cruds.terminalKasir.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mesin_edc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mesin-edcs.index") }}" class="nav-link {{ request()->is("admin/mesin-edcs") || request()->is("admin/mesin-edcs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calculator">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mesinEdc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tipe_kartu_kredit_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tipe-kartu-kredits.index") }}" class="nav-link {{ request()->is("admin/tipe-kartu-kredits") || request()->is("admin/tipe-kartu-kredits/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tipeKartuKredit.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('channel_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.channels.index") }}" class="nav-link {{ request()->is("admin/channels") || request()->is("admin/channels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.channel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('satuan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.satuans.index") }}" class="nav-link {{ request()->is("admin/satuans") || request()->is("admin/satuans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-box">

                                        </i>
                                        <p>
                                            {{ trans('cruds.satuan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mitra_bisni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mitra-bisnis.index") }}" class="nav-link {{ request()->is("admin/mitra-bisnis") || request()->is("admin/mitra-bisnis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mitraBisni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('alamat_mitra_bisni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.alamat-mitra-bisnis.index") }}" class="nav-link {{ request()->is("admin/alamat-mitra-bisnis") || request()->is("admin/alamat-mitra-bisnis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.alamatMitraBisni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kontak_mitra_bisni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kontak-mitra-bisnis.index") }}" class="nav-link {{ request()->is("admin/kontak-mitra-bisnis") || request()->is("admin/kontak-mitra-bisnis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kontakMitraBisni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hutang_piutang_mitra_bisni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hutang-piutang-mitra-bisnis.index") }}" class="nav-link {{ request()->is("admin/hutang-piutang-mitra-bisnis") || request()->is("admin/hutang-piutang-mitra-bisnis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hutangPiutangMitraBisni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('supplier_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.supplier-items.index") }}" class="nav-link {{ request()->is("admin/supplier-items") || request()->is("admin/supplier-items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-luggage-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supplierItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('stok_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stok-items.index") }}" class="nav-link {{ request()->is("admin/stok-items") || request()->is("admin/stok-items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.stokItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pajak_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pajak-items.index") }}" class="nav-link {{ request()->is("admin/pajak-items") || request()->is("admin/pajak-items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pajakItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('harga_jual_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.harga-jual-items.index") }}" class="nav-link {{ request()->is("admin/harga-jual-items") || request()->is("admin/harga-jual-items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hargaJualItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('master_akun_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/akuns*") ? "menu-open" : "" }} {{ request()->is("admin/akun-parents*") ? "menu-open" : "" }} {{ request()->is("admin/akun-jenis*") ? "menu-open" : "" }} {{ request()->is("admin/akun-klasifikasis*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/akuns*") ? "active" : "" }} {{ request()->is("admin/akun-parents*") ? "active" : "" }} {{ request()->is("admin/akun-jenis*") ? "active" : "" }} {{ request()->is("admin/akun-klasifikasis*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user-circle">

                            </i>
                            <p>
                                {{ trans('cruds.masterAkun.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('akun_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.akuns.index") }}" class="nav-link {{ request()->is("admin/akuns") || request()->is("admin/akuns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.akun.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('akun_parent_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.akun-parents.index") }}" class="nav-link {{ request()->is("admin/akun-parents") || request()->is("admin/akun-parents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-friends">

                                        </i>
                                        <p>
                                            {{ trans('cruds.akunParent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('akun_jeni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.akun-jenis.index") }}" class="nav-link {{ request()->is("admin/akun-jenis") || request()->is("admin/akun-jenis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.akunJeni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('akun_klasifikasi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.akun-klasifikasis.index") }}" class="nav-link {{ request()->is("admin/akun-klasifikasis") || request()->is("admin/akun-klasifikasis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard">

                                        </i>
                                        <p>
                                            {{ trans('cruds.akunKlasifikasi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('test_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.tests.index") }}" class="nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.test.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('pesertum_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.peserta.index") }}" class="nav-link {{ request()->is("admin/peserta") || request()->is("admin/peserta/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.pesertum.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('transaksi_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.transaksis.index") }}" class="nav-link {{ request()->is("admin/transaksis") || request()->is("admin/transaksis/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.transaksi.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>