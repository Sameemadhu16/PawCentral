// animalBreeds.js
const animalBreeds = {
    dog: ["Labrador Retriever", "German Shepherd", "Golden Retriever", "Bulldog", "Beagle"],
    cat: ["Siamese", "Persian", "Maine Coon", "Bengal", "Ragdoll"],
    bird: ["Parrot", "Canary", "Cockatiel", "Finch", "Budgerigar"],
    // Add more animals and breeds as needed
  };

<body>
    
  <!-- ANIMAL INFO -->
  <label for="type">Animal Type:</label>
  <select id="type" name="type" onchange="updateBreedOptions()" required>
      <option value="Other">Other</option>
      <option value="Dog">Dog</option>
      <option value="Cat">Cat</option>
  </select>

  <!-- Pet's Breed -->
  <label for="breed">Breed:</label>
  <select id="breed" name="breed" required>
      <option value="Other">Other</option>
  </select>

  <script>
      // Define breed options for each animal type
      const breedOptions = {
          Dog: [
          { value: "Pomeranian", text: "Pomeranian" },
          { value: "German Shepherd", text: "German Shepherd" },
          { value: "Labrador", text: "Labrador" },
          { value: "Bulldog", text: "Bulldog" },
          { value: "Beagle", text: "Beagle" },
          ],
          Cat: [
          { value: "Persian", text: "Persian" },
          { value: "Siamese", text: "Siamese" },
          { value: "Maine Coon", text: "Maine Coon" },
          { value: "Bengal", text: "Bengal" },
          { value: "Sphynx", text: "Sphynx" },
          ],
          Other: [],
      };

      function updateBreedOptions() {
          const typeSelect = document.getElementById("type");
          const breedSelect = document.getElementById("breed");

          // Clear existing breed options
          breedSelect.innerHTML = '<option value="Other">Other</option>';

          // Get the selected animal type
          const selectedType = typeSelect.value;

          // Populate breed options based on the selected animal type
          if (breedOptions[selectedType]) {
          breedOptions[selectedType].forEach((breed) => {
              const option = document.createElement("option");
              option.value = breed.value;
              option.textContent = breed.text;
              breedSelect.appendChild(option);
          });
          }
      }
  </script>

  </body>
