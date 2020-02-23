<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <canvas id="graf"></canvas>
</body>

<script>

  let canvas = document.querySelector('#graf');
  let ctx = canvas.getContext('2d');

  canvas.width = 900;
  canvas.height = 700;
  ctx.font = "18px Calibri";
  ctx.color = '#0000c0';

  let img = new Image();
  let x = 12;
  let y = 12;
  const numOfCols = 4;

  let sources = [
    'portada-4.jpeg',
    'portada-3.png',
    'portada-4.jpeg',
    'portada-3.png',
    'portada-3.png',
    'portada-4.jpeg',
    'portada-3.png',
    'portada-4.jpeg',
    'portada-4.jpeg',
    'portada-3.png',
  ];

  let i = 0;
  img.addEventListener('load', paintMe)
  img.src = 'img/' + sources[i];

  // este el el callback del event Load
  // del objeto Image, se usa para dibujar
  // la imagen cargada
  function paintMe()
  {
    textWidth = ctx.measureText(sources[i]).width;
    ctx.drawImage(img, x, y, 180, 180);
    ctx.fillText(sources[i], x + (180 - textWidth) / 2, y + 196);
    // console.log(`${i}: ${x}`);
    // console.log(textWidth);
    
    i++;
    
    if (i % 4 == 0) {
      x = 12;
      y += 210;
    }
    else {
      x += 200;
    }
    
    if (i < sources.length) {
      img.src = 'img/' + sources[i];
    }
  }

</script>

</html>