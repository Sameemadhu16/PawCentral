// animalBreeds.js
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



//   Pet's Color 
    <label for="color">Color:</label>
    <select id="color" name="color" required>
        <option value="Other">Other</option>
        <option value="Black">Black</option>
        <option value="White">White</option>
        <option value="Brown">Brown</option>
        <option value="Black and White">Black and White</option>
        <option value="Brown and White">Brown and White</option>
        <option value="Yellow">Yellow</option>
        <option value="Golden">Golden</option>
        <option value="Spotted">Spotted</option>
        <option value="Patched">Patched</option>
        <option value="Gray">Gray</option>
        <option value="Cream">Cream</option>
        <option value="Orange">Orange</option>
        <option value="Tabby">Tabby</option>
        <option value="Calico">Calico</option>
        <option value="Tortoiseshell">Tortoiseshell</option>
        <option value="Brindle">Brindle</option>
        <option value="Tan">Tan</option>
        <option value="Red">Red</option>
        <option value="Blue">Blue (grayish tone)</option>
        <option value="Merle">Merle</option>
        <option value="Sable">Sable</option>
        <option value="Tricolor">Tricolor</option>
        <option value="Bicolor">Bicolor</option>
    </select>


       // Define breed options for each animal type
    //    Pet's Breed 
        <label for="breed">Breed:</label>
        <select id="breed" name="breed" required>
            <option value="Other">Other</option>
        </select>

      <script>
        const breedOptions = {
            Dog: [
                { value: "Pomeranian", text: "Pomeranian" },
                { value: "German Shepherd", text: "German Shepherd" },
                { value: "Labrador", text: "Labrador" },
                { value: "Bulldog", text: "Bulldog" },
                { value: "Beagle", text: "Beagle" },
                { value: "Golden Retriever", text: "Golden Retriever" },
                { value: "Poodle", text: "Poodle" },
                { value: "Rottweiler", text: "Rottweiler" },
                { value: "Dachshund", text: "Dachshund" },
                { value: "Siberian Husky", text: "Siberian Husky" },
                { value: "Boxer", text: "Boxer" },
                { value: "Shih Tzu", text: "Shih Tzu" },
                { value: "Chihuahua", text: "Chihuahua" },
                { value: "Doberman", text: "Doberman" },
                { value: "Great Dane", text: "Great Dane" },
                { value: "Corgi", text: "Corgi" },
                { value: "Australian Shepherd", text: "Australian Shepherd" },
                { value: "Border Collie", text: "Border Collie" },
                { value: "Pug", text: "Pug" },
                { value: "French Bulldog", text: "French Bulldog" },
            ],
            Cat: [
                { value: "Persian", text: "Persian" },
                { value: "Siamese", text: "Siamese" },
                { value: "Maine Coon", text: "Maine Coon" },
                { value: "Bengal", text: "Bengal" },
                { value: "Sphynx", text: "Sphynx" },
                { value: "Ragdoll", text: "Ragdoll" },
                { value: "British Shorthair", text: "British Shorthair" },
                { value: "Scottish Fold", text: "Scottish Fold" },
                { value: "Russian Blue", text: "Russian Blue" },
                { value: "American Shorthair", text: "American Shorthair" },
                { value: "Norwegian Forest", text: "Norwegian Forest" },
                { value: "Abyssinian", text: "Abyssinian" },
                { value: "Birman", text: "Birman" },
                { value: "Oriental Shorthair", text: "Oriental Shorthair" },
                { value: "Devon Rex", text: "Devon Rex" },
                { value: "Cornish Rex", text: "Cornish Rex" },
                { value: "Burmese", text: "Burmese" },
                { value: "Tonkinese", text: "Tonkinese" },
                { value: "Savannah", text: "Savannah" },
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
