<!DOCTYPE html>
<html>
    <head>
        <title>IDGS 93</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    </head>
    <body>
        <h1>Prueba de Cámara</h1>
        <video id="preview"></video> <br>
        <a href="{{route('menu')}}">
        REGRESAR A MENU
        </a>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                    console.log(content);
                    alert(content);
                });
            Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length >0) { scanner.start(cameras[0]); }
                    else { console.error('No se pueden ver las camaras'); }
            }).catch(function (e) {
                console.error(e);
            });
        </script>
    </body>
</html>