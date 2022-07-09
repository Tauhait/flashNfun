<!DOCTYPE HTML>
<html lang=en>
<head>
<meta name=viewport content="width=device-width, 
    user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0" />
<meta name=apple-mobile-web-app-capable content=yes />
<meta name=apple-mobile-web-app-status-bar-style content=black-translucent />
<style type=text/css>body{margin:0;padding:0;background:#000}canvas{display:block;margin:0 auto;background:#fff}</style>
</head>
<body>
<canvas></canvas>
<script>window.requestAnimFrame=(function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a){window.setTimeout(a,1000/60)}})();var POP={WIDTH:320,HEIGHT:480,scale:1,offset:{top:0,left:0},entities:[],nextBubble:100,score:{taps:0,hit:0,escaped:0,accuracy:0},RATIO:null,currentWidth:null,currentHeight:null,canvas:null,ctx:null,ua:null,android:null,ios:null,init:function(){POP.RATIO=POP.WIDTH/POP.HEIGHT;POP.currentWidth=POP.WIDTH;POP.currentHeight=POP.HEIGHT;POP.canvas=document.getElementsByTagName("canvas")[0];POP.canvas.width=POP.WIDTH;POP.canvas.height=POP.HEIGHT;POP.ctx=POP.canvas.getContext("2d");POP.ua=navigator.userAgent.toLowerCase();POP.android=POP.ua.indexOf("android")>-1?true:false;POP.ios=(POP.ua.indexOf("iphone")>-1||POP.ua.indexOf("ipad")>-1)?true:false;POP.wave={x:-25,y:-40,r:50,time:0,offset:0};POP.wave.total=Math.ceil(POP.WIDTH/POP.wave.r)+1;window.addEventListener("click",function(a){a.preventDefault();POP.Input.set(a)},false);window.addEventListener("touchstart",function(a){a.preventDefault();POP.Input.set(a.touches[0])},false);window.addEventListener("touchmove",function(a){a.preventDefault()},false);window.addEventListener("touchend",function(a){a.preventDefault()},false);POP.resize();POP.loop()},resize:function(){POP.currentHeight=window.innerHeight;POP.currentWidth=POP.currentHeight*POP.RATIO;if(POP.android||POP.ios){document.body.style.height=(window.innerHeight+50)+"px"}POP.canvas.style.width=POP.currentWidth+"px";POP.canvas.style.height=POP.currentHeight+"px";POP.scale=POP.currentWidth/POP.WIDTH;POP.offset.top=POP.canvas.offsetTop;POP.offset.left=POP.canvas.offsetLeft;window.setTimeout(function(){window.scrollTo(0,1)},1)},update:function(){var b,a=false;POP.nextBubble-=1;if(POP.nextBubble<0){POP.entities.push(new POP.Bubble());POP.nextBubble=(Math.random()*100)+100}if(POP.Input.tapped){POP.score.taps+=1;POP.entities.push(new POP.Touch(POP.Input.x,POP.Input.y));POP.Input.tapped=false;a=true}for(b=0;b<POP.entities.length;b+=1){POP.entities[b].update();if(POP.entities[b].type==="bubble"&&a){hit=POP.collides(POP.entities[b],{x:POP.Input.x,y:POP.Input.y,r:7});if(hit){for(var c=0;c<5;c+=1){POP.entities.push(new POP.Particle(POP.entities[b].x,POP.entities[b].y,2,"rgba(255,255,255,"+Math.random()*1+")"))}POP.score.hit+=1}POP.entities[b].remove=hit}if(POP.entities[b].remove){POP.entities.splice(b,1)}}POP.wave.time=new Date().getTime()*0.002;POP.wave.offset=Math.sin(POP.wave.time*0.8)*5;POP.score.accuracy=(POP.score.hit/POP.score.taps)*100;POP.score.accuracy=isNaN(POP.score.accuracy)?0:~~(POP.score.accuracy)},render:function(){var a;POP.Draw.rect(0,0,POP.WIDTH,POP.HEIGHT,"#036");for(a=0;a<POP.wave.total;a++){POP.Draw.circle(POP.wave.x+POP.wave.offset+(a*POP.wave.r),POP.wave.y,POP.wave.r,"#fff")}for(a=0;a<POP.entities.length;a+=1){POP.entities[a].render()}POP.Draw.text("Hit: "+POP.score.hit,20,30,14,"#fff");POP.Draw.text("Escaped: "+POP.score.escaped,20,50,14,"#fff");POP.Draw.text("Accuracy: "+POP.score.accuracy+"%",20,70,14,"#fff")},loop:function(){requestAnimFrame(POP.loop);POP.update();POP.render()}};POP.collides=function(d,c){var e=(((d.x-c.x)*(d.x-c.x))+((d.y-c.y)*(d.y-c.y)));var f=(d.r+c.r)*(d.r+c.r);if(e<f){return true}else{return false}};POP.Draw={clear:function(){POP.ctx.clearRect(0,0,POP.WIDTH,POP.HEIGHT)},rect:function(a,e,b,d,c){POP.ctx.fillStyle=c;POP.ctx.fillRect(a,e,b,d)},circle:function(a,d,c,b){POP.ctx.fillStyle=b;POP.ctx.beginPath();POP.ctx.arc(a+5,d+5,c,0,Math.PI*2,true);POP.ctx.closePath();POP.ctx.fill()},text:function(c,a,e,d,b){POP.ctx.font="bold "+d+"px Monospace";POP.ctx.fillStyle=b;POP.ctx.fillText(c,a,e)}};POP.Input={x:0,y:0,tapped:false,set:function(a){this.x=(a.pageX-POP.offset.left)/POP.scale;this.y=(a.pageY-POP.offset.top)/POP.scale;this.tapped=true}};POP.Touch=function(a,b){this.type="touch";this.x=a;this.y=b;this.r=5;this.opacity=1;this.fade=0.05;this.update=function(){this.opacity-=this.fade;this.remove=(this.opacity<0)?true:false};this.render=function(){POP.Draw.circle(this.x,this.y,this.r,"rgba(255,0,0,"+this.opacity+")")}};POP.Bubble=function(){this.type="bubble";this.r=(Math.random()*20)+10;this.speed=(Math.random()*3)+1;this.x=(Math.random()*(POP.WIDTH)-this.r);this.y=POP.HEIGHT+(Math.random()*100)+100;this.waveSize=5+this.r;this.xConstant=this.x;this.remove=false;this.update=function(){var a=new Date().getTime()*0.002;this.y-=this.speed;this.x=this.waveSize*Math.sin(a)+this.xConstant;if(this.y<-10){POP.score.escaped+=1;this.remove=true}};this.render=function(){POP.Draw.circle(this.x,this.y,this.r,"rgba(255,255,255,1)")}};POP.Particle=function(a,d,c,b){this.x=a;this.y=d;this.r=c;this.col=b;this.dir=(Math.random()*2>1)?1:-1;this.vx=~~(Math.random()*4)*this.dir;this.vy=~~(Math.random()*7);this.remove=false;this.update=function(){this.x+=this.vx;this.y+=this.vy;this.vx*=0.99;this.vy*=0.99;this.vy-=0.25;if(this.y<0){this.remove=true}};this.render=function(){POP.Draw.circle(this.x,this.y,this.r,this.col)}};window.addEventListener("load",POP.init,false);window.addEventListener("resize",POP.resize,false);</script>
</body>
</html>
