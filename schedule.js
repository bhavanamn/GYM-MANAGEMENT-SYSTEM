// Get the modal element
const modal = document.getElementById('add-event-modal');

// Get the button that opens the modal
const btn = document.getElementById('add-event-button');

// Get the <span> element that closes the modal
const span = document.getElementsByClassName('close')[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = 'block';
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = 'none';
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
};

// Add event to the calendar
function addEvent() {
  const date = document.getElementById('event-date').value;
  const time = document.getElementById('event-time').value;
  const description = document.getElementById('event-description').value;

  // Find the day element in the calendar grid
  const dayElement = document.querySelector(`[data-date="${date}"]`);

  // Create the event element and add it to the day element
  const eventElement = document.createElement('div');
  eventElement.classList.add('event');
  eventElement.textContent = `${time}: ${description}`;
  dayElement.appendChild(eventElement);

  // Close the modal
  modal.style.display = 'none';
}

// Reset the form fields when the modal is closed
function resetForm() {
  document.getElementById('event-date').value = '';
  document.getElementById('event-time').value = '';
  document.getElementById('event-description').value = '';
}

// Listen for the form submit event and add the event to the calendar
const form = document.getElementById('add-event-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  addEvent();
  resetForm();
});
