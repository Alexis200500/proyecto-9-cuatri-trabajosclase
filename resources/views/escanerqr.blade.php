@extends('plantilla')
@section('css')
    
@endsection

@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>Prueba de Cámara</h1>
        <video id="preview"></video> <br>
        {{-- <a href="{{route('menu')}}">
        REGRESAR A MENU
        </a> --}}
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
    </div>
</div>
@endsection