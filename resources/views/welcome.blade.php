<?php

use Spatie\SslCertificate\SslCertificate;
use Spatie\SslCertificate\Exceptions\CouldNotDownloadCertificate;

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SSL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content" style="width: 980px !important">
                <div class="title m-b-md">
                    Certificados SSL
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Dominio</th>
                      <th scope="col">Certificado</th>
                      <th scope="col">Fecha Expiración</th>
                      <th scope="col">Dias Faltantes</th>
                      <th scope="col">Algoritmo</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($url_array as $key => $val)

 
                      @if($val['error'] === true)

                          <?php
                                $certi = SslCertificate::createForHostName($val['url']);
                          ?>

                          @if ($certi->isValid())
                              <?php echo "<tr class='table-success'>"; ?>
                          @else
                              <?php echo "<tr class='table-danger'>"; ?>
                          @endif

                            <td>#</td>
                            <td scope="col"><a href="<?php echo $val['url'] ?>" target="_blank"><?php echo $val['url'] ?></a></td>
                            <td>{{ $certi->getIssuer() }}</td>
                            <td>{{ $certi->expirationDate() }}</td>
                            <td>{{ $certi->expirationDate()->diffInDays() }}</td>
                            <td>{{ $certi->getSignatureAlgorithm() }}</td>
                          </tr>

                      @else

                          <tr class='table-danger'>
                            <td>#</td>
                            <td><a href="<?php echo $val['url'] ?>" target="_blank"><?php echo $val['url']; ?></a></td>
                            <td colspan="4"><?php echo $val['error'] ?></td>
                          </tr>

                      @endif

                    @endforeach

                  </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
