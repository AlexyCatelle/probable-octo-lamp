const form = document.getElementById('bookingForm');
const reservations = [];

form.addEventListener('submit', function(e) {
  e.preventDefault();

  // Récupération valeurs
  const name = document.getElementById('name').value.trim();
  const date = document.getElementById('date').value;
  const time = document.getElementById('time').value;
  const participants = parseInt(document.getElementById('participants').value);

  // Réinitialisation messages d'erreur
  clearErrors();

  let valid = true;

  //VERIFICATION START

  // Verif critères nom
  if (!/^[a-zA-Z]{3,}$/.test(name)) {
    showError('nameError', 'Le nom doit contenir au moins 3 lettres et uniquement des lettres.');
    valid = false;
  }

  // Verif date valide
  const today = new Date().toISOString().split('T')[0];
  if (date < today) {
    showError('dateError', 'La date ne peut pas être antérieure à aujourd’hui.');
    valid = false;
  }

  // Verif creneau valide
  if (time < '09:00' || time > '18:00') {
    showError('timeError', 'Les rendez-vous sont disponibles uniquement entre 9h00 et 18h00.');
    valid = false;
  }

  // Verif nombre participants
  if (isNaN(participants) || participants < 0 || participants > 10) {
    showError('participantsError', 'Le nombre de participants doit être entre 0 et 10.');
    valid = false;
  }

  // Verif dispo creneau
  if (reservations.some(r => r.date === date && r.time === time)) {
    showError('timeError', 'Ce créneau est déjà réservé.');
    valid = false;
  }

  if (!valid) return;

  // VERFICATION END

  // Ajout au tableau
  reservations.push({ name, date, time, participants });
  updateTable();
  // nettoyage formulaire
  form.reset();
});

// Affichage erreur
function showError(id, message) {
  document.getElementById(id).textContent = message;
}

// Nettoyage erreur
function clearErrors() {
  ['nameError', 'dateError', 'timeError', 'participantsError'].forEach(id => {
    document.getElementById(id).textContent = '';
  });
}

// Update tableau reservation
function updateTable() {
  const tbody = document.querySelector('#reservationsTable tbody');
  tbody.innerHTML = '';

  reservations.forEach((res, index) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${res.name}</td>
      <td>${res.date}</td>
      <td>${res.time}</td>
      <td>${res.participants}</td>
      <td><button onclick="deleteReservation(${index})">Supprimer</button></td>
    `;
    tbody.appendChild(row);
  });
}

// Suppression Reservation
function deleteReservation(index) {
  reservations.splice(index, 1);
  updateTable();
}
