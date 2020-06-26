<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="./assets/img/logo-small.png">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
            Toko Bangunan
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            <?php
            $id_jabatan = $this->session->userdata('id_jabatan');
            $queryMenu = "SELECT `jabatan`.`id_jabatan`,`jabatan`.`nama`
                FROM `jabatan` JOIN `akses_menu` 
                ON `jabatan`.`id_jabatan` = `akses_menu`.`menu_id`
                WHERE `akses_menu`.`id_jabatan` = $id_jabatan
                ORDER BY `akses_menu`.`menu_id` ASC
";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <?php foreach ($menu as $m) : ?>
                <h6 class="ml-4 text-primary"><?= $m['nama']; ?></h6>
                <?php
                $querySubMenu = "SELECT * FROM `sub_menu` WHERE `menu_id` = {$m['id_jabatan']}";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sub) : ?>
                    <li class="">
                        <a href="<?= base_url($sub['url']); ?>">
                            <i class="<?= $sub['icon']; ?>"></i>
                            <p><?= $sub['title']; ?></p>
                        </a>
                    </li>
                    <div class="dropdown-divider" style="margin-bottom: .5rem!important;"></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>