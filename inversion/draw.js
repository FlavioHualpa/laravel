window.onload = function ()
{
   let body = document.querySelector('body');
   let main = document.querySelector('main');
   let container = document.querySelector('canvas');
   let canvas = container.getContext('2d');

   body.style.backgroundColor = '#f0f0f0';
   main.style.width = '100%';
   main.style.height = '100vh';

   container.width = 800;
   container.height = 800;
   container.style.margin = '50px auto 0';
   container.style.border = '1px solid #d0d0d0';
   container.style.display = 'block';
   container.style.backgroundColor = 'white';

   let pi = Math.PI;
   let cx = 400;
   let cy = 400;
   let r = 200;

   let p1 = { x: 0, y: 0 };
   let p2 = { x: -45, y: 132 };
   let circle = { center: p1, radius: r };
   let otherPoints = calcOtherPoints(p1, p2, r);
   let p3 = otherPoints.p3;
   let p4 = otherPoints.p4;

   canvas.beginPath();
   canvas.arc(cx + circle.center.x, cy - circle.center.y, circle.radius, 0, 2 * pi);
   canvas.stroke();

   // canvas.beginPath();
   // canvas.moveTo(p1.x, p1.y);
   // canvas.lineTo(p2.x, p2.y);
   // canvas.strokeStyle = "#a0a0a0";
   // canvas.stroke();

   // canvas.beginPath();
   // canvas.moveTo(cx - r, otherPoints.l2.func(cx - r));
   // canvas.lineTo(cx + 100, otherPoints.l2.func(cx + 100));
   // canvas.strokeStyle = "#a0a0a0";
   // canvas.stroke();

   canvas.fillStyle = 'blue';
   drawPoint(p1);

   canvas.fillStyle = 'orange';
   drawPoint(p2);

   canvas.fillStyle = 'orange';
   drawPoint(p3);

   canvas.fillStyle = 'red';
   drawPoint(p4);

   function drawPoint(p)
   {
      canvas.beginPath();
      canvas.arc(cx + p.x, cy - p.y, 2, 0, 2 * pi);
      canvas.fill();
   }
}

function calcOtherPoints(p1, p2, r)
{
   let line1 = makeLine(p1, p2);
   let line2 = makePerpendicular(line1, p2);
   let p3 = calcTangentPoint(line2, r);
   let p4 = calcInvertedPoint(line1, p3, r);

   return { p3: p3, p4: p4 };
}

function makeLine(p1, p2)
{
   let m = (p2.y - p1.y) / (p2.x - p1.x);
   
   return {
      m: m,
      dx: p1.x,
      dy: p1.y,
      func: function (x) { return this.m * (x - this.dx) + this.dy }
   };
}

function makePerpendicular(line, p)
{
   let m = -1 / line.m;

   return {
      m: m,
      dx: p.x,
      dy: p.y,
      func: function (x) { return this.m * (x - this.dx) + this.dy }
   };
}

function calcTangentPoint(line, r)
{
   let m = line.m;
   let x = line.dx;
   let y = line.dy;
   let a = m * m + 1;
   let b = 2 * m * y - 2 * m * m * x;
   let c = m * m * x * x - 2 * m * x * y + y * y - r * r;

   // formula cuadrática
   x = (-b + Math.sqrt(b * b - 4 * a * c)) / (2 * a);
   y = line.func(x);

   return { x: x, y: y };
}

function calcInvertedPoint(line, p, r)
{
   let m3 = -p.x / (Math.sqrt(r * r - p.x * p.x));
   let a = -line.m;
   let b = 1;
   let c = line.dy;
   let d = -m3;
   let e = 1;
   let f = p.y - m3 * p.x;

   let x = (c * e - b * f) / (a * e - b * d);
   let y = (c * d - a * f) / (b * d - a * e);

   return { x: x, y: y };
}
