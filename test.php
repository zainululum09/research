<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<div class="container p-3">
  <div class="row">
    <div class="col-8">

        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
          <div class="col-sm-10">
            <select class="custom-select" id="provinsi"></select>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Kota/Kab</label>
          <div class="col-sm-10">
          <select class="custom-select" id="wilayah"></select>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Kecamtan</label>
          <div class="col-sm-10">
            <select class="custom-select" id="kec"></select>
          </div>
        </div>

        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Tingkat</label>
          <div class="col-sm-10">
              <select class="custom-select" id="bentuk">
                <option value="tk">TK</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
                <option value="smk">SMK</option>
              </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
          <div class="col-sm-10">
            <select class="custom-select" id="sp"></select>
          </div>  
        </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 $.ajax({
    url : 'ajax.php',
    method : 'get',
    data: {id:1, kode:'000000'},
    dataType: 'json',
    success: function(data){
	    var  prov = JSON.parse(JSON.stringify(data));
      $.each(prov, function(i , row){
        $('#provinsi').append('<option value='+row.kode_wilayah+'>'+row.nama+'</option>')
      })
    }  
 })

 $('#provinsi').on('change', function(){
   let kode_wilayah = $(this).val()
   $('#provinsi option[value='+kode_wilayah+']').attr("selected", true)
  //  console.log($('#provinsi option[selected]').text())
   $('#wilayah').html('');
   $('#sp').html('')
  //  console.log(kode_wilayah)

      $.ajax({
      url : 'ajax.php',
      method : 'get',
      data: {id:2, kode: kode_wilayah},
      dataType: 'json',
      success: function(data){
        var  wil = JSON.parse(JSON.stringify(data));
        // console.log(wil)
        $.each(wil, function(i , row){
          $('#wilayah').append('<option value='+row.kode_wilayah+'>'+row.nama+'</option>')
        })
      }  
  })
})

 $('#wilayah').on('change', function(){
   let kode_wilayah = $(this).val()
   $('#wilayah option[value='+kode_wilayah+']').attr("selected", true)
   $('#kec').html('');
   $('#sp').html('')
  //  console.log(kode_wilayah)

      $.ajax({
      url : 'ajax.php',
      method : 'get',
      data: {id:2, kode: kode_wilayah},
      dataType: 'json',
      success: function(data){
        var  kec = JSON.parse(JSON.stringify(data));
        // console.log(kec)
        $.each(kec, function(i , row){
          $('#kec').append('<option value='+row.kode_wilayah+'>'+row.nama+'</option>')
        })
      }  
  })
})

 $('#bentuk').on('change', function(){
   let kode_wilayah = $('#kec').val()
   let bentuk = $(this).val()
  //  console.log(kode_wilayah)
   $('#sp').html('')

      $.ajax({
      url : 'ajax.php',
      method : 'get',
      data: {id:3, kode: kode_wilayah, bentuk:bentuk},
      dataType: 'json',
      success: function(data){
        var  sp = JSON.parse(JSON.stringify(data));
        // console.log(sp)
        $.each(sp, function(i , row){
          $('#sp').append('<option value='+row.kode_wilayah+'>'+row.nama+'</option>')
        })
      }  
  })
})

$('#sp').on('change', function(){
  let kode_sp=$(this).val()
  
  $('#sp option[value='+kode_sp+']').attr("selected", true)
  var hasil = {
    'prov':$('#provinsi option[selected]').text(),
    'kab':$('#wilayah option[selected]').text(),
    'kec':$('#kec option[selected]').text(),
    'sp':$('#sp option[selected]').text(),
  }
  console.log(hasil)
})

})
</script>
</body>
</html>
