<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> 
    
</head>
<body>

    <div class="container py-5">
        
        <div class="card">
            <div class="card-header">
                <button type="button" onclick="tampil()" class="btn btn-info btn-small"> ADD </button>
            </div>

            <div class="card-body">
                <div id="isi">

                </div>
            </div>
        </div>
    </div>

    <div id="addmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Belajar CRUD</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="iduser">
                <div class="form-group">
                    <div class="label">Nama</div>
                    <input type="text" class="form-control" placeholder="Nama" id="nama">
                </div>
                <div class="form-group">
                    <div class="label">Username</div>
                    <input type="text" class="form-control" placeholder="Username" id="username">
                </div>
                <div class="form-group">
                    <div class="label">Password</div>
                    <input type="password" class="form-control" placeholder="Password" id="password">
                </div>
                <div class="form-group">
                    <div class="label">Alamat</div>
                    <textarea class="form-control" id="alamat"></textarea> 
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-success">Simpan</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="boostrap/js/bootstrap.bundle.min.js"></script>

    <script>
        function tampil()
        {
            $('#addmodal').modal();
        }

        function simpan()
        {
            var id = $('#iduser').val()
            var nama = $('#nama').val()
            var username = $('#username').val()
            var password = $('#password').val()
            var alamat = $('#alamat').val()

            $.ajax({
                url: 'simpan.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'iduser' : id,
                    'nama' : nama,
                    'username' : username,
                    'password' : password,
                    'alamat' : alamat,
                },
                success: function(data){
                    if(data.pesan == 'Success')
                    {
                        kosongdata()
                    }
                }
            })
        }

        function kosongdata()
        {
            autoload()
            $('#nama').val('')
            $('#username').val('')
            $('#password').val('')
            $('#alamat').val('')
            $('#addmodal').modal('hide')
        }

        $(document).ready(function(){
            autoload()
        })

        function autoload()
        {
            $('#isi').load('data.php')
        }

        function hapus(id)
        {
            $.ajax({
                url : 'hapus.php',
                type : 'GET',
                dataType : 'JSON',
                data : {'id':id},
                success : function(data){
                    autoload()
                }
                 
            })
        }

        function edit(id,nama,usename,password,alamat)
        {
            $('#iduser').val(id)
            $('#nama').val(nama)
            $('#username').val(usename)
            $('#password').val(password)
            $('#alamat').val(alamat)
            $('#addmodal').modal();
        }
    </script>

    
</body>
</html>