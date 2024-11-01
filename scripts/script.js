// script.js
function updatePackage() {
  const durasi = parseInt(document.getElementById("durasi").value);
  const programSelect = document.getElementById("program");

  // Clear existing selections
  programSelect.selectedIndex = 0;

  // Set the program based on the duration
  switch (durasi) {
    case 4:
      programSelect.selectedIndex = 0; // Paket 1
      break;
    case 7:
      programSelect.selectedIndex = 1; // Paket 2
      break;
    case 10:
      programSelect.selectedIndex = 2; // Paket 3
      break;
    default:
      programSelect.selectedIndex = 3; // Harian, no discount
  }
}
