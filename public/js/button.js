
const button = document.querySelector(".pushable");

document.addEventListener('mousemove', mouse_position);

function mouse_position(event) {
    const mouseX = document.getElementById("XC").textContent = event.clientX;
    const mouseY = document.getElementById("YC").textContent  = event.clientY;

    const buttonOffset = getOffset(button);
    const buttonX = buttonOffset.left + (button.offsetWidth /2);
    const buttonY = buttonOffset.top ;


    const distance = document.getElementById("DIS").textContent = calculateDistance(mouseX, mouseY, buttonX, buttonY);
    const name = document.getElementById("name")
    const description = document.getElementById("description")
    const picture = document.getElementById("picture")
    const price = document.getElementById("price")

    if ( name.value === '' || description.value === '' || price.value === '') {
        if (distance < 100) {
            const displacementFactor = (100 - distance) * 0.5;

            const perspectiveFactor = calculatePerspectiveFactor(buttonX, buttonY);
            button.style.transform = `translate(${-(mouseX - buttonX) * displacementFactor * perspectiveFactor}px, ${-(mouseY - buttonY) * displacementFactor * perspectiveFactor}px)`;

            button.textContent = ':c';
            button.classList.add('btn-danger');
            button.classList.remove('btn-primary');
            button.style.perspective = `${9 - (10 - 4) * perspectiveFactor}cm`;
            button.style.transform += ` rotateX(${-25 * perspectiveFactor}deg) rotateY(${10 * perspectiveFactor}deg) rotateZ(${-5 * perspectiveFactor}deg)`;
        } else {
            button.textContent = 'Vytvoriť položku';
            button.classList.add('btn-primary');
            button.classList.remove('btn-danger');
            button.style.transform = 'none';
            button.style.perspective = 'none';
            button.style.transformStyle = 'flat';
        }
    }
}



function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

function calculateDistance(X, Y, x, y) {
    const dist = Math.sqrt((X - x) ** 2 + (Y - y) ** 2);
    return Math.ceil(dist);
}

function calculatePerspectiveFactor(x, y) {
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    const distanceFromCenter = Math.sqrt((x - screenWidth / 2) ** 2 + (y - screenHeight / 2) ** 2);

    const perspectiveFactor = 1 - distanceFromCenter / (Math.sqrt(screenWidth ** 2 + screenHeight ** 2) / 2);

    return perspectiveFactor;
}

