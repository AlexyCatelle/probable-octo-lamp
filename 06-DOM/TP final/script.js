// TESTS START

//alert("hello world !");

// TESTS END

// START KEYBOARD
const AZERTY_KEYS = [
    ['A', 'Z', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
    ['Q', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M'],
    ['Enter', 'W', 'X', 'C', 'V', 'B', 'N', '⌫']
];

// Création du clavier
const keyboardContainer = document.getElementById('virtual-keyboard');

AZERTY_KEYS.forEach(row => {
    const rowDiv = document.createElement('div');
    rowDiv.classList.add('keyboard-row');

    row.forEach(key => {
        const keyButton = document.createElement('button');
        keyButton.textContent = key;
        keyButton.classList.add('key');
        keyButton.setAttribute('data-key', key);
        rowDiv.appendChild(keyButton);
    });

    keyboardContainer.appendChild(rowDiv);
});


// END KEYBOARD
// START GAME

const dictionary = [
    'eddie',
    'blaze',
    'crash',
    'avion',
    'panic',
    'alert',
    'bobby',
    'chris',
    'grant',
    'harry',
    'karen',
    'susan',
    'linda',
    'quiet',
    'alarm',
    'moira'
];

const state = {
    secret: dictionary[Math.floor(Math.random() * dictionary.length)],
    grid: Array(6).fill().map(() => Array(5).fill('')),
    currentRow: 0,
    currentCol: 0,
};

function updateGrid() {
    for (let i = 0; i < state.grid.length; i++) {
        for (let j = 0; j < state.grid[i].length; j++) {
            const box = document.getElementById(`box${i}${j}`);
            box.textContent = state.grid[i][j];
        };
    };
};

function drawBox(container, row, col, letter = '') {
    const box = document.createElement('div');
    box.className = 'box';
    box.id = `box${row}${col}`;
    box.textContent = letter;

    container.appendChild(box);
    return box;

};

function drawGrid(container) {
    const grid = document.createElement('div');
    grid.className = 'grid';

    // boucle pour les lignes
    for (let i = 0; i < 6; i++) {
        // boucle pour les colonnes
        for (let j = 0; j < 5; j++) {
            drawBox(grid, i, j);
        }
    }
    container.appendChild(grid);
};

function keyResponds(key) {
    if (key === 'Enter' || key === 'enter') {
        if (state.currentCol === 5) {
            const word = getCurrentWord();
            if (isWordValid(word)) {
                revealWord(word);
                state.currentRow++;
                state.currentCol = 0;
            }
            else {
                alert('Mot non valide.');
            }
        }
    };

    if (key === 'Backspace' || key === '⌫') {
        removeLetter();
    };

    if (isLetter(key)) {
        addLetter(key);
    };

};

// Ecouteur d'évenement sur le clavier physique.
function registerKeyboardEvents() {
    document.body.onkeydown = (e) => {
        keyResponds(e.key);
        updateGrid();
    };
};

// Ecouteur d'évenement sur le clavier virtuel.
function registerVirtualKeyboardEvents() {
    keyboardContainer.addEventListener('click', (e) => {
        if (e.target.matches('button.key')) {
            const key = e.target.getAttribute('data-key').toLowerCase();
            keyResponds(key);
            updateGrid();
        }
    });
};

function getCurrentWord() {
    return state.grid[state.currentRow].reduce((prev, curr) => prev + curr);
};

// Vérifie que le mot est présent dans le dictionnaire.
function isWordValid(word) {
    return dictionary.includes(word);
};

function revealWord(guess) {
    const row = state.currentRow;

    for (let i = 0; i < 5; i++) {
        const box = document.getElementById(`box${row}${i}`);
        const letter = box.textContent;

        // Si la lettre est correcte et bien placée.
        if (letter === state.secret[i]) {
            box.classList.add('box__right');
        }
        // Si la lettre est correcte et malplacée.
        else if (state.secret.includes(letter)) {
            box.classList.add('box__wrong');
        }

        //Si la lettre est incorrecte.
        else {
            box.classList.add('box__empty');
        }
    }
    const isWinner = state.secret === guess;
    const isGameOver = state.currentRow === 5;

    if (isWinner) {
        alert('Félicitations !');
        location.reload();
    }
    else if (isGameOver) {
        alert(`Défaite ! le mot était ${state.secret}.`);
        location.reload();
    }

};

// Vérifie que la touche préssée est une lettre.
function isLetter(key) {
    return key.length === 1 && key.match(/[a-z]/i);
};

// Ajoute la lettre
function addLetter(letter) {
    // Si il ne reste plus de la place dans la ligne.
    if (state.currentCol === 5) return;

    // Si il reste de la place dans la ligne.
    state.grid[state.currentRow][state.currentCol] = letter;
    state.currentCol++;
};

// Retire une lettre
function removeLetter() {
    if (state.currentCol === 0) return;

    // supprime la lettre de la case précédente.
    state.grid[state.currentRow][state.currentCol - 1] = '';

    // recule sur la case vide
    state.currentCol--;
};

function startup() {
    const game = document.getElementById('game');
    drawGrid(game);

    registerKeyboardEvents();
    registerVirtualKeyboardEvents();

    //console.log(state.secret);

};

startup();

// END GAME