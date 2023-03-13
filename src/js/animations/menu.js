let menuButton = document.querySelector('.menu__burger-button');

if(menuButton) {
    menuButton.addEventListener('click', (e) => {
        if(menuButton.classList.contains('menu__burger-button--active')) {
            menuButton.setAttribute('href', '#hero');
        } else {
            menuButton.setAttribute('href', '#menu');
        }
        menuButton.classList.add('menu__burger-button--active');
        
    })
}

let target = document.querySelector('#menu');

let options = {
    rootMargin: '0px',
    threshold: [0.5, 1]
}

let callback = function(entries, observer) {
    entries.forEach(entry => {
        console.log(entry.isIntersecting)
        if (entry.isIntersecting) {
            menuButton.classList.add('menu__burger-button--active');
          } else {
            menuButton.classList.remove('menu__burger-button--active');
          }
    });
};

let observer = new IntersectionObserver(callback, options);

observer.observe(target);