const description = document.getElementById('description');
const maxCharacters = 200;

description.addEventListener('input', function() {
    const descriptionLength = this.value.length;
    const charactersRemaining = maxCharacters - descriptionLength;

    document.getElementById('character-count').textContent = `${descriptionLength}/${maxCharacters}`;

    if (charactersRemaining < 0) {
        document.getElementById('character-count').classList.add('text-danger');
        document.getElementById('character-count').innerText = `Text sa presiahol o ${Math.abs(charactersRemaining)} znakov!`;
    } else {
        document.getElementById('character-count').classList.remove('text-danger');
    }
});
