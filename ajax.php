<?php
    $ch = curl_init();
    $id = $_GET['id'];
    $kode = $_GET['kode'];
    // if(isset($_GET['bentuk'])){
    //     $sekolah = "&bentuk_pendidikan_id=sd";
    // } else {
    //     $sekolah = '';
    // }
    if($id == 3){
        curl_setopt($ch, CURLOPT_URL, "https://dapo.kemdikbud.go.id/rekap/progresSP?id_level_wilayah=".$id."&kode_wilayah=".$kode."&semester_id=20221&bentuk_pendidikan_id=".$_GET['bentuk']);
    } else {
        curl_setopt($ch, CURLOPT_URL, "https://dapo.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=".$id."&kode_wilayah=".$kode."&semester_id=20221");
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $output = curl_exec($ch);
    echo $output;
    curl_close($ch);

