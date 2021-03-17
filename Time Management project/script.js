//animation movement
const cont=document.querySelector('.container');
const card=document.querySelector('.card');
const circle=document.querySelector('.circle');
const text=document.querySelector('.title');

//event
cont.addEventListener('mousemove',(e)=>{
    //defining axises 
    let xAxis=(window.innerWidth/2-e.pageX)/45;//window.inner width is the width of it.
    let yAxis=(window.innerHeight/2-e.pageY)/45;//devided it by 25 to reduce animation strength.

    //animating the circle and text invertedly 
    card.style.transform=`rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    
    circle.style.transform=`rotateY(${yAxis}deg) rotateX(${xAxis}deg)`;
    
    console.log(e.pageX, e.pageY);
});
//when stopping animation
cont.addEventListener('mouseleave', (e)=>{
    card.style.transform=`rotateY(0deg) rotateX(0deg)`;
    circle.style.transform=`rotateY(0deg) rotateX(0deg)`;
    card.style.transition='all 0.6s ease';

});
//when starting animation
cont.addEventListener('mouseenter',(e)=>{
    card.style.transition='none';
});
