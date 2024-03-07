<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
        $website_title = 'MainPage';
        require "blocks/head.php" ;
     ?>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="/css/master.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" stroke="#fff">
  <defs>
    <path d="m212.5.52 118 66v219l-205 28-125-66 1-216 211-31ZM1.32 31.07 126.5 94.52m0 0 203.82-28.45"/>
    <path d="m178.72.73 112 291-66 38-224-131 114-161 64-37Zm-111 160 223 131m-223-131L178.32 1.06"/>
    <path d="m210.56.52 54 28 70 119-65 145-146 24-58-30-65-120 68-144 142-22Zm-88.5 50.5-67 144M264.32 28.07 122.06 51.02m1.26 265.05L55.06 195.02"/>
  </defs>
</svg>

  <script>
      const svg = document.querySelector('svg')
    const paths = document.querySelectorAll('defs path')
    const shapes = []

    for (let i=0; i<20; i++){
    const shape = paths[gsap.utils.random(0,2,1)].cloneNode()
    shapes.push(shape)
    svg.append(shape)
    }

    function draw(){
    shapes.forEach((shape,i)=>{
    gsap.timeline({defaults:{overwrite:'auto'}})
        .fromTo(shape, {
          attr:{ 'vector-effect':'non-scaling-stroke' },
          drawSVG:0
        },{
          duration:3,
          ease:'sine.inOut',
          drawSVG:'0 100%'
        }, i/10)
        .fromTo(shape, {
          transformOrigin:'50%',
          scale:'random(0.2,0.6)',
          rotate:'random(0,360)',
          x:()=>(innerWidth+300)*Math.random()-300,
          y:()=>innerHeight*Math.random()-300
        },{
          duration:'random(5,10)',
          ease:'bounce',
          y:'+='+'random(250,500)',
          rotate:'random(-180,180)'
        }, i/10)
        .fromTo(shape, {
          attr:{fill:'rgba(0,0,0,0)'}
        },{
          duration:1,
          ease:'power1.inOut',
          attr:{fill:'rgba(0,0,0,1)'}
        }, i/10+1)
    })

    gsap.delayedCall(9,draw)
    }

    // window.onclick = window.onresize = draw
    draw()


  </script>
  </body>
</html>
