<select name='lokasi_kerja_id'>
    <option>-Pilih-</option>
    <?php
        foreach ($lokasi as $key => $value) {
    ?>
    <option value='<?php echo $value->lokasi_kerja_id ?>'><?php echo $value->lokasi_kerja_nama ?></option>
    <?php
    }
    ?>
</select>