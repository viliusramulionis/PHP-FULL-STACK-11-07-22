window.addEventListener('scroll', (event) => {
    if(window.pageYOffset > 0) {
        document.querySelector('header').classList.add('scrolling');
    } else {
        document.querySelector('header').classList.remove('scrolling');
    }
});

document.querySelectorAll('.tabs-nav li').forEach(el => {
    const target = el.dataset.target;

    el.addEventListener('click', () => {
        document.querySelectorAll('.tabs .content').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(target).style.display = 'flex';
    });
});

// document.querySelectorAll('.tabs-nav li').addEventListener('click', () => {
//     console.log('Veikia');
// })

document.querySelectorAll('section.pricing .pricing-buttons button').forEach(el => {
    el.addEventListener('click', (event) => {
        document.querySelector('section.pricing [data-plan="basic"] .amount').textContent = el.dataset.basic;
        document.querySelector('section.pricing [data-plan="standard"] .amount').textContent = el.dataset.standard;

        document.querySelectorAll('section.pricing .pricing-buttons button').forEach(button => {
            button.classList.remove('active');
        });

        event.target.classList.add('active');
    });
});

