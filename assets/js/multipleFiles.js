class DawFileUploader {
	constructor(maxSize, name) {
		var cards = document.querySelectorAll(".worker-container .card");
		// console.log('cards', cards);
		for (var i = 0; i < cards.length; i++) {
			// Current card & issue id
			const card = cards[i];
			const issueId = card.dataset.issueId;

			// Edit modal
			const editModalElem = card.querySelector(".card-modals .modal-edit");

			// Get canvas container & form
			const inputContainer = editModalElem.querySelector(".input-container");
			const formElem = editModalElem.querySelector("form");
			// console.log(formElem);

			// Create canvas
			const input = document.createElement("input");
			input.setAttribute("class", "m-5");
            input.maxSize = maxSize;
            input.name = name;
            input.numberOfFiles = 0;
            input.currentFileSize = 0;

			this.newFile = this.newFile.bind(this);

			var file = document.createElement("input");
			file.setAttribute("type", "file");
			file.addEventListener("change", this.newFile);
			file.setAttribute("name", this.name + numberOfFiles);
			file.setAttribute("id", this.name + numberOfFiles);
			numberOfFiles++;

			container.appendChild(file);
	}

	}

	newFile() {
		this.currentFileSize = 0;

		for (var i = 0; i < this.numberOfFiles; i++) {
			this.currentFileSize += document.getElementById(
				this.name + i
			).files[0].size;
		}

		if (this.currentFileSize > this.maxSize) {
			var generateErrorSize = document.createElement("div");
			generateErrorSize.setAttribute("class", "alert alert-danger mt-5");
			generateErrorSize.setAttribute("role", "alert");
			generateErrorSize.setAttribute("id", "errorSizeAlert");
			generateErrorSize.appendChild(
				document.createTextNode(
					"Has pasado el límite de " + this.maxSize + " bytes"
				)
			);

			document.getElementById(
				this.name + parseInt(this.numberOfFiles - 1)
			).value = "";
			this.container.appendChild(generateErrorSize);

			setTimeout(function () {
				var alert = document.getElementById("errorSizeAlert");
				alert.setAttribute("style", "display:none");
			}, 3000);
		} else {
			var currentFileSizeText = document.createElement("p");
			currentFileSizeText.setAttribute("role", "alert");
			currentFileSizeText.appendChild(
				document.createTextNode(this.currentFileSize + "/" + this.maxSize)
			);
			this.container.appendChild(currentFileSizeText);

			document.getElementById(
				this.name + parseInt(this.numberOfFiles - 1)
			).disabled = true;

			var newFile = document.createElement("input");
			newFile.setAttribute("type", "file");
			newFile.addEventListener("change", this.newFile);
			newFile.setAttribute("name", this.name + this.numberOfFiles);
			newFile.setAttribute("id", this.name + this.numberOfFiles);

			this.numberOfFiles++;
			this.container.appendChild(newFile);
		}
	}
}
