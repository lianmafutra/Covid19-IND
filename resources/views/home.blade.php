<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid-19 IND</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
      <div class="row" style="padding-top: 20px">
            <div class="col-md-12">
                <h3>Jumlah Kasus di Indonesia Saat Ini</h3>
            </div>
      </div>
      <div class="row" style="margin-top: 20px">

        @foreach ($data_ind as $value ) 
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Positif : <a style="color:blue">{{$value['positif']}}</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-body">
                            <h3>Sembuh : <a style="color: green">{{$value['sembuh']}}</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Meninggal : <a style="color: red">{{$value['meninggal']}}</a></h3>
                        </div>
                    </div>
                </div>
        @endforeach
      
  </div>
  <div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <h6>Jumlah Kasus tiap provinsi</h6>

            <input class="form-control" id="myInput" type="text" placeholder="Cari Berdasarkan Provinsi...">
        <br>
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Positif</th>
                <th scope="col">Sembuh</th>
                <th scope="col">Meninggal</th>
              </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($data_prov as $value_prov) 
              <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$value_prov['attributes']['Provinsi']}}</td>
                    <td>{{$value_prov['attributes']['Kasus_Posi']}}</td>
                    <td>{{$value_prov['attributes']['Kasus_Semb']}}</td>
                    <td>{{$value_prov['attributes']['Kasus_Meni']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
  </div>
</body>

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>



</html>