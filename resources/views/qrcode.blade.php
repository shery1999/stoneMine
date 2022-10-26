 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>

 <body>
     <h2>QR CODE </h2>
     <div class="visible-print text-center">
         {{-- {!! QrCode::size(100)->generate(Request::url()); !!} --}}
         {{-- <p>Scan me to return to the original page.</p> --}}
         {{-- {!! QrCode::generate('Make me into a QrCode!') !!} --}}
         {{-- {!! QrCode::generate('Make me into a QrCode!', '../public/qrcode.png'); !!} --}}
         {!! QrCode::generate('tel:555-555-5555') !!}



     </div>
 </body>

 </html>
