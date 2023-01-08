

window.addEventListener('load',()=>{

const preloader = document.getElementById('preloader')
const content = document.getElementById('content')
const clients = document.getElementById('clients')
const team = document.getElementById('team')
const projects = document.getElementById('projects')
const welcome = document.querySelector('.welcome')

  setTimeout(() => {
    preloader.classList.add("d-none")
    content.classList.remove("d-none")
}, 1500);

window.addEventListener('scroll',()=>{

  if(scrollY > 30 ){

    welcome.style.display = 'none'

  }

  if(scrollY < 30 && window.innerWidth > 800 ){
    welcome.style.display = 'block'
    console.log(window.innerWidth)
  }

})

function counter(element){

  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      console.log('Element is in view');
  
      let element = entries[0].target
  
      let start = 0
  
      let end = Number(element.innerText.replace(/\+/g, ''));
  
      let startCounting = setInterval(() => {
        element.innerText = start
        // console.log(start)
        if(start==end){
          let small = document.createElement('small')
          small.innerText = '+'
          element.append(small)
          clearInterval(startCounting)
        }
        else start++
      }, 2);
  
  
    } else {
      console.log('Element is off view');
    }
  });

  observer.observe(element);

  // console.log(element)

}

counter(clients);
counter(team);
counter(projects);

const scrollContainer = document.getElementById('container')
const iconsNav = document.querySelector('.icons-nav')

const buttonRight = document.getElementById('slideRight');
    const buttonLeft = document.getElementById('slideLeft');

    let left = 0


    buttonRight.onclick = function () {
      scrollContainer.scrollBy(200,0);
      left+=33.4
      iconsNav.style.left = left+'%'
    };
    buttonLeft.onclick = function () {
      scrollContainer.scrollBy(-200,0);
      left-=33.4
      iconsNav.style.left = '-'+left+'%'
    };

    // scrollContainer.addEventListener('pointerover',()=>{
    //   iconsNav.classList.remove('d-none')
    // })

    // scrollContainer.addEventListener('pointerout',()=>{
    //   iconsNav.classList.add('d-none')
    // })

})
  
  
/*

fetch('http://localhost:3000/register')
  .then(response => response.json())
  .then(data => {
    // Get a reference to the element where you want to render the data
    const container = document.querySelector('.container .row');

    data.data.forEach(data => {

        // Create an HTML element to hold the data
    const div = document.createElement('div');
    div.innerHTML = "<h6> Name:"+data.userName+"</h6><h6>Age: "+data.Age+"</h6>"
    div.className = "col-md-3"

    // Add the HTML element to the page
    container.appendChild(div)
        
    });
    

    console.log(data);
  });

  */
