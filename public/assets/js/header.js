document.addEventListener('DOMContentLoaded', () => {
    // if screen size is less than 768px
    if (window.innerWidth < 768) {
        // hide the parallax
        document.querySelector('.parallax').style.display = 'none';
        // hide the hero date
        document.querySelector('.hero-date').style.display = 'none';
    } else {
        window.scrollTo(0, 0);
        const header = document.querySelector('header');
        const parallax = document.querySelector('.parallax');
    
        window.addEventListener('scroll', () => {
            let blurValue = Math.min(4 * window.scrollY / window.innerHeight, 4);
            header.style.backdropFilter = `blur(${blurValue}px)`;
    
            // parallax effect
            // parallax.style.backgroundPositionY = `${-window.scrollY / 2}px`;
            1 - window.scrollY / window.innerHeight < 0 ? parallax.style.opacity = '0' : parallax.style.opacity = `${1 - window.scrollY / window.innerHeight}`;
            parallax.style.opacity == '0' ? parallax.style.backgroundPositionY = 0 : parallax.style.backgroundPositionY = `${-window.scrollY / 2}px`;
            
            // opacity of the parallax at 1 when #cta is on the screen
            const cta = document.getElementById('cta');
    
            // if the cta is on the screen
            if (cta.getBoundingClientRect().top <= window.innerHeight / 2) {
                // display the parallax with fluid animation
                parallax.style.opacity = `${((window.innerHeight / 2 - cta.getBoundingClientRect().top) / window.innerHeight) * 2}`;
                parallax.style.backgroundPositionY = 0;
            }
        });
    
        const heroDate = document.querySelector('.hero-date');
    
        // Créer l'élément de fond
        const background = document.createElement('div');
        background.classList.add('hero-date-background');
        heroDate.appendChild(background);
    
        heroDate.addEventListener('mouseenter', () => {
            background.style.display = 'block';
            setTimeout(() => {
                background.style.width = '110%';
                background.style.height = '45%';
            }, 200);
        });
    
        heroDate.addEventListener('mouseleave', () => {
            background.style.width = '0';
            background.style.height = '0';
            setTimeout(() => {
                background.style.display = 'none';
            }, 200);
        });
    }
});
