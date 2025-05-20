##  Sujet d’exercice – Formulaire de Réservation avec Vérifications Avancées

### **Objectif :**
Créer un **formulaire de réservation de rendez-vous** en HTML/CSS/JS avec plusieurs **contraintes de validation**.

---

### **Contenu du formulaire :**

- **Nom du client** (`input type="text"`)
- **Date du rendez-vous** (`input type="date"`)
- **Heure du rendez-vous** (`input type="time"`)
- **Nombre de participants** (`input type="number"`, entre 0 et 10)
- **Bouton Réserver**

---

### Règles de validation :

#### 1. **Nom du client** :
- Doit contenir **au moins 3 caractères**.
- Ne doit contenir que des **lettres (a-z, A-Z)** (pas de chiffres, symboles ou espaces).
- Sinon, afficher : ⚠️ “Le nom doit contenir au moins 3 lettres et uniquement des lettres.”

#### 2. **Heure du rendez-vous** :
- Doit être **entre 09:00 et 18:00 inclus**.
- Sinon, afficher : ⚠️ “Les rendez-vous sont disponibles uniquement entre 9h00 et 18h00.”

#### 3. **Vérification de créneau** :
- Si un rendez-vous est déjà pris à cette **date + heure**, afficher : ⚠️ “Ce créneau est déjà réservé.”

#### 4. **Nombre de participants** :
- Doit être un nombre compris **entre 0 et 10 inclus**.
- Sinon, afficher : ⚠️ “Le nombre de participants doit être entre 0 et 10.”

---

### Enregistrement :
- Si **toutes les conditions sont remplies**, ajouter le rendez-vous dans un **tableau JavaScript** de cette forme :

```js
[
  {
    name: "Alice Dupont",
    date: "2025-04-17",
    time: "14:00",
    participants: 4
  },
  ...
]
```
---

### Mise en forme :
- Affichage des **erreurs en rouge**, clair et immédiat.
- Bouton de soumission bien visible.

---

### Bonus (facultatif) :
- Enregistrer les rendez-vous dans un fichier JSON pour ajouter une persistance
- Empêcher les dates **antérieures à aujourd’hui**.
- ajouter un tableau sous le formulaire qui affiche toutes le réservation
- Ajouter dans le tableau **fonction de suppression de rendez-vous**.

>- si tu as tout fini tu peux :
    >>- essayer d'ajouter d'un champ date personaliser avec les date deja reserver en rouge 

