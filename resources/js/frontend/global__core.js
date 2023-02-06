let class_has_child = document.querySelectorAll('.has__child');

class_has_child.forEach((e) => {
    e.firstChild.setAttribute('has__child', '');
});

let getAnchorChild = document.querySelectorAll('[has__child]');

getAnchorChild.forEach((e) => {
    e.addEventListener('click', (event) => {
        event.preventDefault();
    })
});


let layer__2 = document.querySelectorAll('.layer__2');


if (window.outerWidth > 990) {
    layer__2.forEach((e) => {
        e.classList.contains('open') ? e.classList.remove('open') : '';
        e.getAttribute('style') ? e.removeAttribute('style') : '';
    });
}

window.addEventListener('resize', () => {
    location.reload();
    //     check window width
    if (window.outerWidth > 990) {
        layer__2.forEach((e) => {
            e.classList.contains('open') ? e.classList.remove('open') : '';
            e.getAttribute('style') ? e.removeAttribute('style') : '';
        });
    }
}, true);

