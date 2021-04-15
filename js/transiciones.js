window.onload = () => {
    const transition_el = document.querySelector('.transition');
    setTimeout(() => {
        transition_el.classList.remove('is-active');    
    }, 100);
}